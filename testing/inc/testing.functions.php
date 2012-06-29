<?php
/**
 * Auxilliary testing functions
 *
 * @package testing
 * @author Vladimir Sibirov
 * @copyright Copyright (c) Cotonti Team 2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

require_once cot_langfile('testing', 'module');

/**
 * Searches for test files in a given folder
 * @param string $folder Target path
 * @param bool $recursively Search also in all subfolders
 * @return array Paths to test files
 */
function testing_find_files($folder, $recursively = false)
{
	$files = array();
	$dp = opendir($folder);
	while ($f = readdir($dp))
	{
		if ($f[0] != '.')
		{
			if (is_dir($folder . DIRECTORY_SEPARATOR . $f)
				&& ($f == 'test' || $recursively))
			{
				$files = array_merge($files, testing_find_files($folder . DIRECTORY_SEPARATOR . $f, $recursively));
			}
			elseif (preg_match('#\.test\.php$#i', $f) && is_file($folder . DIRECTORY_SEPARATOR . $f))
			{
				$files[] = $folder . DIRECTORY_SEPARATOR . $f;
			}
		}
	}
	closedir($dp);
	return $files;
}

/**
 * Searches for test functions within a given test file
 * @param string $file File path
 * @param string $setup_func Fill this var with setup func name if found
 * @param string $teardown_func Fill this var with teardown func name if found
 * @return array Function names
 */
function testing_find_funcs($file, &$setup_func = '', &$teardown_func = '')
{
	$funcs = array();

	$def_funcs = testing_get_defined_functions_in_file($file);

	foreach ($def_funcs as $func)
	{
		if (preg_match('#^test_#', $func))
		{
			$funcs[] = $func;
		}
		elseif (preg_match('#^setup_#', $func))
		{
			$setup_func = $func;
		}
		elseif (preg_match('#^teardown_#', $func))
		{
			$teardown_func = $func;
		}
	}
	return $funcs;
}

/**
 * Returns all functions defined in a specific file
 * @param string $file File path
 * @return array
 * @author Andrew Moore
 * @link http://stackoverflow.com/a/2197870
 */
function testing_get_defined_functions_in_file($file)
{
	$source = file_get_contents($file);
	$tokens = token_get_all($source);

	$functions = array();
	$nextStringIsFunc = false;
	$inClass = false;
	$bracesCount = 0;

	foreach ($tokens as $token)
	{
		switch ($token[0])
		{
			case T_CLASS:
				$inClass = true;
				break;
			case T_FUNCTION:
				if (!$inClass)
					$nextStringIsFunc = true;
				break;

			case T_STRING:
				if ($nextStringIsFunc)
				{
					$nextStringIsFunc = false;
					$functions[] = $token[1];
				}
				break;

			// Anonymous functions
			case '(':
			case ';':
				$nextStringIsFunc = false;
				break;

			// Exclude Classes
			case '{':
				if ($inClass)
					$bracesCount++;
				break;

			case '}':
				if ($inClass)
				{
					$bracesCount--;
					if ($bracesCount === 0)
						$inClass = false;
				}
				break;
		}
	}

	return $functions;
}

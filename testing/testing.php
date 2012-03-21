<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=module
[END_COT_EXT]
==================== */

/**
 * Testing module main
 *
 * @package testing
 * @author Vladimir Sibirov
 * @copyright Copyright (c) Cotonti Team 2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

// Environment setup
define('COT_TESTING', TRUE);
$env['location'] = 'testing';

// Requirements
require_once cot_incfile('testing', 'module');
require_once cot_langfile('admin', 'core');

// Switch mode
if ($m == 'full')
{
	$files = testing_find_files('.', true);
}
elseif ($m == 'system')
{
	$files = testing_find_files('.');
}
elseif (!empty($m))
{
	if (file_exists($cfg['modules_dir'] . '/' . $m) && is_dir($cfg['modules_dir'] . '/' . $m))
	{
		$files = testing_find_files($cfg['modules_dir'] . '/' . $m);
	}
	elseif (file_exists($cfg['plugins_dir'] . '/' . $m) && is_dir($cfg['plugins_dir'] . '/' . $m))
	{
		$files = testing_find_files($cfg['plugins_dir'] . '/' . $m);
	}
}

$out['subtitle'] = $L['testing_title'];
$out['head'] .= $R['code_noindex'];

require_once $cfg['system_dir'].'/header.php';

$t = new XTemplate(cot_tplfile('testing', 'module'));

if (!empty($m) && count($files) > 0)
{
	// Run tests
	$i = explode(' ', microtime());
	$starttime = $i[1] + $i[0];
	$tests_count = 0;
	
	foreach ($files as $file)
	{
		$funcs = testing_find_funcs($file);
		if (count($funcs) > 0)
		{
			require_once $file;
			$file_pass = true;
			foreach ($funcs as $func)
			{
				$pass = $func();
				$file_pass &= $pass;
				$t->assign(array(
					'TESTING_RUN_FILE_FUNC_NAME' => $func,
					'TESTING_RUN_FILE_FUNC_PASS' => $pass,
					'TESTING_RUN_FILE_FUNC_STATUS' => $pass ? $L['testing_pass'] : $L['testing_fail']
				));
				$t->parse('MAIN.TESTING_RUN.TESTING_RUN_FILE.TESTING_RUN_FILE_FUNC');
				$tests_count++;
			}
			$t->assign(array(
				'TESTING_RUN_FILE_PATH' => $file,
				'TESTING_RUN_FILE_PASS' => $file_pass,
				'TESTING_RUN_FILE_STATUS' => $file_pass ? $L['testing_pass'] : $L['testing_fail']
			));
			$t->parse('MAIN.TESTING_RUN.TESTING_RUN_FILE');
		}
	}
	
	$i = explode(' ', microtime());
	$endtime = $i[1] + $i[0];
	$seconds = round(($endtime - $starttime), 3);

	$t->assign(array(
		'TESTING_RUN_COUNT' => $tests_count,
		'TESTING_RUN_SECONDS' => $seconds
	));
	
	// Display messages if any
	cot_display_messages($t, 'MAIN.TESTING_RUN');
	
	$t->parse('MAIN.TESTING_RUN');
}
elseif (!empty($m))
{
	$t->parse('MAIN.TESTING_NOTESTS');
}
else
{
	$t->assign('TESTING_INTRO_EXAMPLE', highlight_file($cfg['modules_dir'] . '/testing/test/testing_example.test.php', true));
	$t->parse('MAIN.TESTING_INTRO');
}

// List extensions with tests
$modules = glob($cfg['modules_dir'] . '/*', GLOB_ONLYDIR);
foreach ($modules as $mod)
{
	$tests = testing_find_files($mod);
	if (count($tests) > 0)
	{
		$t->assign(array(
			'TESTING_EXT_NAME' => basename($mod),
			'TESTING_EXT_URL' => cot_url('testing', 'm='.basename($mod))
		));
		$t->parse('MAIN.TESTING_EXT');
	}
}

$plugins = glob($cfg['plugins_dir'] . '/*', GLOB_ONLYDIR);
foreach ($plugins as $plug)
{
	$tests = testing_find_files($plug);
	if (count($tests) > 0)
	{
		$t->assign(array(
			'TESTING_EXT_NAME' => basename($plug),
			'TESTING_EXT_URL' => cot_url('testing', 'm='.basename($plug))
		));
		$t->parse('MAIN.TESTING_EXT');
	}
}

$t->assign(array(
	'TESTING_FULL_URL' => cot_url('testing', 'm=full'),
	'TESTING_SYSTEM_URL' => cot_url('testing', 'm=system')
));

$t->parse();
$t->out();

require_once $cfg['system_dir'].'/footer.php';

?>

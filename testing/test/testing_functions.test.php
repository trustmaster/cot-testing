<?php
/**
 * Test file for testing functions
 *
 * @package testing
 * @author Vladimir Sibirov
 * @copyright Copyright (c) Cotonti Team 2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

require_once cot_incfile('testing', 'module');

// Test for testing_find_files()
function test_testing_find_files()
{
	global $cfg;
	$correct = array(
		$cfg['modules_dir'] . '/testing/test/testing_example.test.php',
		$cfg['modules_dir'] . '/testing/test/testing_functions.test.php'
	);
	sort($correct);

	$got = testing_find_files($cfg['modules_dir'] . '/testing');
	sort($got);

	$diff1 = array_diff($correct, $got);
	$diff2 = array_diff($got, $correct);

	if (count($diff1) > 0)
	{
		return 'Missing items: ' . print_r($diff1, true);
	}
	elseif (count($diff2) > 0)
	{
		return 'Got extra items: ' . print_r($diff2, true);
	}
	else
	{
		return true;
	}
}

// Test for testing_find_funcs()
function test_testing_find_funcs()
{
	global $cfg;
	$correct = array(
		'test_testing_find_files',
		'test_testing_find_funcs'
	);

	$got = testing_find_funcs($cfg['modules_dir'] . '/testing/test/testing_functions.test.php');
	sort($got);

	$diff1 = array_diff($correct, $got);
	$diff2 = array_diff($got, $correct);

	if (count($diff1) > 0)
	{
		return 'Missing items: ' . print_r($diff1, true);
	}
	elseif (count($diff2) > 0)
	{
		return 'Got extra items: ' . print_r($diff2, true);
	}
	else
	{
		return true;
	}
}

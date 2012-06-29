<?php
/**
 * Test file example
 *
 * @package testing
 * @author Vladimir Sibirov
 * @copyright Copyright (c) Cotonti Team 2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

// Some example environment
global $test_env;
$test_env = '';

// Example environment setup for a test
function setup_test()
{
	global $test_env;
	$test_env = 'foo';
}

// Example environment cleanup for a test
function teardown_test()
{
	global $test_env;
	unset($test_env);
}

// The most simple test example
function test_example1()
{
	if (1 === 1)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

// Simple test emitting a message on error
function test_example2()
{
	if ('foo' > 'bar')
	{
		return TRUE;
	}
	else
	{
		return 'foo > bar is not true';
	}
}

// Test based on setup/teardown
function test_example3()
{
	global $test_env;
	return $test_env === 'foo';
}

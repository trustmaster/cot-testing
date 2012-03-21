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

function test_example1()
{
	if (1 === 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function test_example2()
{
	if ('foo' > 'bar')
	{
		return true;
	}
	else
	{
		cot_error('test_example2(): foo > bar is not true');
		return false;
	}
}

?>

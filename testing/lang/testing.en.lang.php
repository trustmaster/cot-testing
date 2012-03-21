<?php
/**
 * English Language File for the Testing Module
 *
 * @package testing
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

$L['testing_fail'] = 'FAIL';
$L['testing_filefunc'] = 'File / Function';
$L['testing_full'] = 'Full';
$L['testing_full_hint'] = 'Runs tests for system and all modules and plugins';
$L['testing_intro'] = 'This module can run unit tests bundled with this Cotonti instance. Please choose testing mode to run the tests.';
$L['testing_intro_part2'] = 'Tests are simple functions named <em>&quot;test_XXXX&quot;</em> in files which have <em>&quot;.test.php&quot;</em> postfix located in <em>&quot;test&quot;</em> subfolders of your Cotonti site or its extensions.';
$L['testing_intro_part3'] = 'Test functions take no arguments. They must return TRUE on success or FALSE on error. Error messages should be emitted using standard <a href="http://www.cotonti.com/reference/cotonti/package-functions.html#cot_error()">cot_error()</a> function.';
$L['testing_intro_sample'] = 'Example test file source code from <em>&quot;modules/testing/test&quot;</em> folder';
$L['testing_log'] = 'Testing log';
$L['testing_modes'] = 'Modes';
$L['testing_notfound'] = 'No tests found matching the criteria';
$L['testing_pass'] = 'PASS';
$L['testing_seconds'] = 'seconds';
$L['testing_system'] = 'System';
$L['testing_system_hint'] = 'Runs tests from the &quot;test&quot; subfolder in site root';
$L['testing_tests_run_in'] = 'tests performed in ';
$L['testing_title'] = 'Unit Testing';

?>

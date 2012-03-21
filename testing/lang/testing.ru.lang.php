<?php
/**
 * Russian Language File for the Testing Module
 *
 * @package testing
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2012
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

$L['testing_fail'] = 'Ошибка';
$L['testing_filefunc'] = 'Файл / Функция';
$L['testing_full'] = 'Полный';
$L['testing_full_hint'] = 'Запускает системные тесты, а также тесты для всех модулей и плагинов';
$L['testing_intro'] = 'Этот модуль может запускать тесты, поставляемые с данной установкой Cotonti. Для запуска тестов выберите режим тестирования.';
$L['testing_intro_part2'] = 'Тесты - это простые функции, именуемые <em>&quot;test_XXXX&quot;</em>, находящиеся в файлах с постфиксом <em>&quot;.test.php&quot;</em> в подпапках <em>&quot;test&quot;</em> вашего сайта или его расширений.';
$L['testing_intro_part3'] = 'Тестовые функции не принимают аргументов. Они должны возвращать TRUE при успешном прохождении теста или FALSE в случае ошибки. Сообщения об ошибках следует выдавать с помощью стандартной функции <a href="http://www.cotonti.com/reference/cotonti/package-functions.html#cot_error()">cot_error()</a>.';
$L['testing_intro_sample'] = 'Пример исходного кода файла, содержащего тесты, взятый из папки <em>&quot;modules/testing/test&quot;</em>';
$L['testing_log'] = 'Протокол тестирования';
$L['testing_modes'] = 'Режимы';
$L['testing_notfound'] = 'По данному критерию тесты не найдены';
$L['testing_pass'] = 'ОК';
$L['testing_seconds'] = 'секунд';
$L['testing_system'] = 'Системный';
$L['testing_system_hint'] = 'Запускает тесты из папки &quot;test&quot; в корне сайта';
$L['testing_tests_run_in'] = 'тестов выполнено за ';
$L['testing_title'] = 'Модульное тестирование';

?>

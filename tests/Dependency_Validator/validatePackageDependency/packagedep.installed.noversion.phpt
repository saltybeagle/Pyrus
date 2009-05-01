--TEST--
Dependency_Validator: package dependency, no version, installed
--FILE--
<?php
require __DIR__ . '/../setup.registry.php.inc';

$fake = new PEAR2_Pyrus_PackageFile_v2;
$foo = $fake->dependencies['required']->package['pear2.php.net/foo'];
$fake->name = 'foo';
$fake->channel = 'pear2.php.net';
$fake->version['release'] = '1.2.3';
$fake->files['foo'] = array('role' => 'php');
$fake->notes = 'hi';
$fake->summary = 'hi';
$fake->description = 'hi';
PEAR2_Pyrus_Config::current()->registry->install($fake);

$test->assertEquals(true, $validator->validatePackageDependency($foo, array()), 'foo');
$test->assertEquals(0, count($errs), 'foo count');
?>
===DONE===
--EXPECT--
===DONE===
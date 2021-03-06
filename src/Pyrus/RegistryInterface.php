<?php
/**
 * \Pyrus\RegistryInterface
 *
 * PHP version 5
 *
 * @category  Pyrus
 * @package   Pyrus
 * @author    Greg Beaver <cellog@php.net>
 * @copyright 2010 The PEAR Group
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @link      https://github.com/pyrus/Pyrus
 */

/**
 * Interface for a PEAR2 Pyrus managed installation registry
 *
 * @category  Pyrus
 * @package   Pyrus
 * @author    Greg Beaver <cellog@php.net>
 * @copyright 2010 The PEAR Group
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @link      https://github.com/pyrus/Pyrus
 */
namespace Pyrus;
interface RegistryInterface
{
    public function install(PackageFileInterface $info, $replace = false);
    /**
     * Used by the registry package classes to update info in an installed package
     */
    public function replace(PackageFileInterface $info);
    public function uninstall($name, $channel);
    public function exists($package, $channel);
    public function info($package, $channel, $field);
    public function listPackages($channel);
    public function __get($var);
    /**
     * @return \Pyrus\PackageFileInterface
     */
    public function toPackageFile($package, $channel);
    /**
     * Retrieve a list of package objects that depend on this package
     * @param \Pyrus\PackageFileInterface package that is depended on
     * @param bool if true, a lean package with only name and dependencies is returned
     */
    public function getDependentPackages(PackageFileInterface $package, $minimal = true);

    /**
     * Detect any files already installed that would be overwritten by
     * files inside the package represented by $package
     */
    public function detectFileConflicts(PackageFileInterface $package);
    /**
     * Returns a list of registries present in the PEAR installation at $path
     * @param string
     * @return array
     */
    static public function detectRegistries($path);
    /**
     * Completely remove all traces of a registry
     */
    static public function removeRegistry($path);
    public function begin();
    public function rollback();
    public function commit();
}

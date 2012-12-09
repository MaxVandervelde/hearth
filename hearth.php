<?php
/**
 * hearth.php
 *
 * Core of application
 * 
 * @category Hearth
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 * @author Douglas Linsmeyer <douglas.linsmeyer@nerdery.com>
 * @version 0.0.0
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode
 *          Attribution-NonCommercial-ShareAlike 3.0 Unported
 *          Some Rights Reserved
 */

define('HEARTH_DS', '/');

require dirname(__FILE__) . HEARTH_DS . 'Hearth' . HEARTH_DS . 'Autoload.php';

$autoloader = new \Hearth\Autoload();

$autoloader->setDs(HEARTH_DS)
           ->setBasePath(dirname(__FILE__));

spl_autoload_register(array($autoloader, 'load'));

// Autoload Composer libraries
if (file_exists('vendor/autoload.php')) {
	require 'vendor/autoload.php';
}

$core = new \Hearth\Core();

$core->main();

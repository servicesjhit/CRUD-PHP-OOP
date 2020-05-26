<?php namespace Classes;
 /**
  *  Version 1.0 MyApp
  *  Php version 5.6.0
  *
  * @category Autoloader_For_The_Classes
  * @package  No_Package
  * @author   Sagar <virfrmtelaiya@gmail.com>
  * @license  Licenced Under ....
  * @link     https://www.jhit.in
  **/

spl_autoload_register(
    function ($classname) {
        require_once"$classname.php";
    }
);

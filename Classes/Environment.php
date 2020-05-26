<?php  namespace Classes;

 /**
  *  Version 1.0 MyApp
  *  Php version 5.6.0
  *
  * @category Test_App
  * @package  No_Package
  * @author   Sagar <virfrmtelaiya@gmail.com>
  * @license  Licenced Under ....
  * @link     https://www.jhit.in
  */
class Environment
{
    public $env;

    function __construct()
    {
        $env = ($_SERVER["HTTP_HOST"]) ;
        if ($env="localhost") {
            $this->env = "development";
        } elseif ($env="testing.jhit.in") {
            $this->env = "testing";
        } elseif ($env="jhit.in") {
                                     $this->env = "production";
        } else {
            echo "Unknown  Host / Environment Named : ".$env;
        }
    }
}

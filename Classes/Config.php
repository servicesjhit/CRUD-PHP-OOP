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

 class Config
{
    public $config;


    public function __construct($env)
    {
        // $this->config = $config;
      
        switch ($env) :
            case 'development':
                $config = [ '$dsn' => 'mysql:host=localhost;dbname=jhitdev',
                 '$dbuser' =>'root',
                 '$dbpassword' => ''];
                break;

            case 'testing':
                $config = [ '$dsn' => 'mysql:host=localhost;dbname=jhittest',
                 '$dbuser' =>'root',
                 '$dbpassword' => 'testing@123'];

                break;

            case 'production':
                $config = ['$dsn' => 'mysql:host=localhost;dbname=jhitprod',
                '$dbuser' =>'root',
                 '$dbpassword' => 'prod@123'];

                break;

            default:
                $config =['$dsn' =>'mysql:host=localhost;dbname=jhit',
                 '$dbuser' =>'root',
                 '$dbpassword' => ''];

                break;
        endswitch;
        return $this->config = $config;

    }
}


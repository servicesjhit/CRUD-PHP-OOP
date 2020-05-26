<?php  namespace Classes;

use PDO;

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
 /**
  * Database Class Declaration
  *
  * @category Test_App
  * @package  No_Package
  * @author   Sagar <virfrmtelaiya@gmail.com>
  * @license  Licenced Under ....
  * @link     https://www.jhit.in
  */

class Database
{
    private $conn;
    private $config;
    private $connected = false;
    private $stmt;
    private $error;
    private $dsn;
    private $dbuser;
    private $dbpassword;
 
    public function __construct($config)
    {
        
        $conn = $this->conn;
        $this->config = $config->config;
        $this->dsn = $this->config['$dsn'];
        $this->dbuser = $this->config['$dbuser'];
         $this->dbpassword = $this->config['$dbpassword'];
        $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {

            $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpassword, $options);

            if ($this->conn) {
             $this->connected =true;
            } else {
                echo "Not Connected to DB";
                $this->connected =false;
            }
        } catch (PDOException $e) {
            $this->error = $e->getMessage().PHP_EOL;
            echo $this->error;
        }
    }


    // Get Error

    public function getError()
    {
        return $this->error;
    }

    // Check connection
    public function isConnected()
    {
        return $this->connected;
    }

    // Prepare statement with query.

    public function query($query)
    {
        $this->stmt = $this->conn->prepare($query);
    }
    //Execute the statement
    public function execute()
    {
        return $this->stmt->execute();
    }
    // Get Resultset as Object
    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Get record row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // Bind values
    public function bind($param, $value, $type=null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
}

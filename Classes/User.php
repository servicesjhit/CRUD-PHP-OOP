<?php namespace Classes;

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
* User class declaratinon
* @category Test_App
 * @package  No_Package
 * @author   Sagar <virfrmtelaiya@gmail.com>
 * @license  Licenced Under ....
 * @link     https://www.jhit.in
*/
class User
{



    private $config;
    private $db;


    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->db = new Database($config);
    }
    public function craeteUser($data)
    {
             $result = [];
        if (isset($_POST['submit'])) {
            mb_parse_str($data, $result);

            $this->db->query('INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)');

             $this->db->bind(':firstname', $result['firstname']);
              $this->db->bind(':lastname', $result['lastname']);

            if ($this->db->execute()) {
                mysqli_close();

                header('Location:   http://localhost/project/register.php');
                $result = null;
            } else {
                return false;
            }
        }
    }


    public function getUsers()
    {
      
        $this->db->query('SELECT * from users');
        $results = $this->db->resultset();
        return $results;
    }

    public function getUser($id)
    {
        $this->db->query('SELECT * from users WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function deleteUser($id)
    {
        $this->db->query("DELETE from users WHERE id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            mysqli_close();

            header('Location:   http://localhost/project/users.php');
        } else {
            return false;
        }
    }

    public function updateUser($data)
    {

        $result = [];
        mb_parse_str($data, $result);

        $this->db->query("UPDATE users SET firstname = :firstname, lastname = :lastname WHERE id = :id");
        $this->db->bind(':id', $result['id']);
        $this->db->bind(':firstname', $result['firstname']);
        $this->db->bind(':lastname', $result['lastname']);

        if ($this->db->execute()) {
       
            mysqli_close();
            header('Location:   http://localhost/project/users.php');
        } else {
            return false;
        }
    }
}

<?php

namespace model;

use PDO;


/**
 * Created by PhpStorm.
 * User: Stefano Zizza
 * Date: 30.03.17
 * Time: 00:35
 */
class DBAccess
{
    /**
     * @var null
     */
    private $db = null;

    function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=cms';
        $user = 'root';
        $password = 'root';

        $this->db = new PDO($dsn, $user, $password);
//        $this->test();
    }

    public function beginnTransaction()
    {
        $this->db->beginTransaction();
    }

    public function commitChanges()
    {
        $this->db->commit();
    }

    public function rollBack()
    {
        $this->db->rollBack();
    }

    public function getUsers()
    {
        $result = $this->db->prepare('SELECT * FROM cms.login');
        $result->execute();
        return $result->fetchAll();
    }

    public function getUserDetail($username, $password)
    {
        $query = $this->db->prepare('SELECT * FROM cms.login t1 WHERE t1.username = :username AND t1.password = :password');
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();
        return $query->fetchAll();
    }

    public function checkUsernameAvailability($username)
    {
        $query = $this->db->prepare('SELECT * FROM cms.login WHERE username = :username');
        $query->bindParam(':username', $username);
        $query->execute();
        if ($query->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function insertNewUser($username, $vorname, $nachname, $password, $view, $create, $delete)
    {
        $query = $this->db->prepare('INSERT INTO login (username, vorname, nachname, password, view, `create`, `delete`) 
                                              VALUES (:username, :vorname,:nachname,:password,:view,:create,:delete);');
        $query->bindParam(':username', $username);
        $query->bindParam(':vorname', $vorname);
        $query->bindParam(':nachname', $nachname);
        $password = md5($password);
        $query->bindParam(':password', $password);
        $query->bindParam(':view', $view);
        $query->bindParam(':create', $create);
        $query->bindParam(':delete', $delete);
        $query->execute();
    }

    public function removeUser($id)
    {
        $query = $this->db->prepare('DELETE FROM cms.login WHERE uid=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function loginUser($username, $password)
    {
        $query = $this->db->prepare('SELECT * FROM cms.login WHERE username = :username AND password = :password');
        $query->bindParam(':username', $username);
        $password = md5($password);
        $query->bindParam(':password', $password);
        $result = $query->execute();
        if ($result > 0){
            return true;
        }else{
            return false;
        }
    }

}
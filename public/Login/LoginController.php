<?php
use model\DBAccess;
include __DIR__ . '/../model/DBAccess.php';

/**
 * Created by PhpStorm.
 * User: Stefano Zizza
 * Date: 31.03.17
 * Time: 01:50
 */
class LoginController
{
    private $db = '';


    function __construct()
    {
        $this->db = new DBAccess();
    }

    public function loginUser($username, $password)
    {
        if ($this->db->loginUser($username, $password)){
            $_SESSION['admin'] = true;
        };
    }

}
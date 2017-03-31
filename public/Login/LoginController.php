<?php

/**
 * Created by PhpStorm.
 * User: Stefano Zizza
 * Date: 31.03.17
 * Time: 01:50
 */
class LoginController
{
    private $db;


    function __construct()
    {
        $this->db = new DBAccess();
    }

    private function loginUser($username, $password)
    {

    }

}
<?php

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

        $this->db = new PDO($dsn,$user,$password);
//        $this->test();
    }

    private function test()
    {
        $result = $this->db->prepare('SELECT * FROM cms.login');
        $result->execute();
    }

    public function getUsers()
    {
        $result = $this->db->prepare('SELECT * FROM cms.login');
        $result->execute();
        return $result->fetchAll();
    }



}
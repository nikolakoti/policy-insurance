<?php


class DB {

    protected $name = 'paragraf_lex';
    protected $host = 'localhost';
    protected $username = 'paragraf_lex';
    protected $password = 'paragraf@lex';
    protected $port = 3306;
    protected static $instance;

    /**
     * @return object
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {

            self::$instance = new DB();
        }

        return self::$instance;
    }

    public function getName() {
        return $this->name;
    }

    public function getHost() {
        return $this->host;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setHost($host) {
        $this->host = $host;
        return $this;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function getPort() {
        return $this->port;
    }

    public function setPort($port) {
        $this->port = $port;
        return $this;
    }

    /**
     * @return resource
     */
    public function connect() {

        $link = new \mysqli($this->getHost(), $this->getUsername(), $this->getPassword(), $this->getName(), $this->getPort());


        if ($link->connect_error) {

            die('Connection to db failed: ' . $link->connect_error);
        }


        return $link;
    }

}

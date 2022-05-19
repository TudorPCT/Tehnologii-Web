<?php

abstract class Model{
    protected $conn;
    protected $querry;

    public function __construct()
    {
        $this->conn = BD::obtine_conexiune();
    }

    protected function setSql($querry)
    {
        $this->querry = $querry;
    }

    public function getAll($data = null)
    {
        if (!$this->querry)
        {
            throw new Exception("No SQL query!");
        }

        $sth = $this->conn->prepare($this->querry);
        $sth->execute($data);
        return $sth->fetchAll();
    }

    public function getRow($data = null)
    {
        if (!$this->querry)
        {
            throw new Exception("No SQL query!");
        }

        $sth = $this->conn->prepare($this->querry);
        $sth->execute($data);
        return $sth->fetch();
    }
}
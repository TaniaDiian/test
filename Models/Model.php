<?php

class Model
{
    private $host;
    private $database;
    private $user;
    private $password;

    function __construct($host, $user, $password, $database)
    {
        $this->password = $password;
        $this->host = $host;
        $this->database = $database;
        $this->user = $user;
    }

    private function connect()
    {
        return mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }

    private function close()
    {
        return mysqli_close($this->connect());
    }

    protected function fetch($query)
    {
        $result = mysqli_query($this->connect(), $query);
        $this->close();
        if (is_bool($result)) {
            return $result;
        } else {
            return $this->toArray($result);
        }
    }

    private function toArray($mysqli_result)
    {
        $arrayResult = array();

        while ($row = $mysqli_result->fetch_assoc()) {
            array_push($arrayResult, $row);
        }

        return $arrayResult;
    }
}
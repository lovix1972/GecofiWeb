<?php
namespace Pasquale\GecofiOffice;

class DBConfig{

public string $host;

public string $dbname;

public string $port;

public string $username;

public string $password;


public function __construct($host, $dbname, $port, $username, $password){

                $this->host = $host;
                $this->dbname = $dbname;
                $this->port = $port;
                $this->username = $username;
                $this->password = $password;


                }

}
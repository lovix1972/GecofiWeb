<?php
namespace Pasquale\Gecofi_Office;

class MyPDO extends \PDO implements DatabaseContract{
    public function __construct(DBConfig $DBConfig )    {

        $dsn =$this->getDsn($DBConfig->host, $DBConfig->port,$DBConfig->dbname );
       
        $username = $DBConfig->username;
        $password = $DBConfig->password;
             
        $options    =   [];

        parent::__construct($dsn, $username, $password, $options);

    }


    private function getDsn(string $host, string $port, string $dbname){

       
        return "mysql:"  . 
        "host={$host};" . 
        "port={$port};" . 
        "dbname={$dbname}";
    }
}







?>

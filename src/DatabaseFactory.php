<?php


namespace Pasquale\GecofiOffice;

use Pasquale\GecofiOffice\DatabaseContract;
use Exception;
use PDO;
use PDOException;

class DatabaseFactory{

    const TYPE_PDO ="pdo";
    const TYPE_MySQLi ="mysqli";


   
    
    
    public static function Create(DBConfig $DBConfig, string $type=DatabaseContract::TYPE_PDO):DatabaseContract | null {

    
        if($type== DatabaseContract::TYPE_PDO)

        return self::CreateWithPDO($DBConfig);


        throw new Exception("Not Implemented");
}

    private static function CreateWithPDO(DBConfig $DBConfig){

    
        try{
      
        
        $pdo= new MyPDO($DBConfig);
        
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $pdo;
    
         }catch(PDOException $e){
       
        return new Exception("database connect fail: {$e->getMessage()}");
    }
}
}
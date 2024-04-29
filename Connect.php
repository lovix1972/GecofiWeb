<?php


$type="mysql";
$servername = "localhost";
$usernamedb = "dbadmin";
$passworddb = "Misery12";
$dbname = "Gecofi";
$charset="utf8mb4";
$port="3306";


$options    =   [        PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
                         PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
                         PDO::ATTR_EMULATE_PREPARES      => false,
                ];

    $dsn="$type:host=$servername;dbname=$dbname;charset=$charset;port=$port";

try {

    $pdo = new PDO($dsn, $usernamedb, $passworddb, $options);
   
    
}   catch(PDOException $e)  {
    
    throw new PDOException($e->getMessage(), $e->getCode());
 
}
?>

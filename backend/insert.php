<?php
header("Access-Control-Allow-Origin:*");
$dns = "mysql:dbname=todo;host=localhost";
$username = "root";
$password = "123456";


try{
    $connection = new PDO($dns,$username,$password);
}catch(Exception $exception){
    print_r($exception);
}

$content = file_get_contents("php://input");
$task = json_decode($content);

$name = $task->name;
$description = $task->description;
$date = $task->date;

$slqQuery = "INSERT INTO tasks (name, description, date)
VALUES ('$name', '$description', '$date')";

$result = $connection->query($slqQuery);

if($result){
    echo "El registro se guardo correctamente";
}else{
    echo "Error, no se registro correctamente";
}


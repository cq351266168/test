<?php
/*
function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    else return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
	var_dump($e);
}

// Continue execution
echo 'Hello World';

*/


$dsn = 'mysql:host=localhost;dbname=test';
$user = 'root';
$password = '3';

try{
	$db = new PDO($dsn,$user,$password);
	//$dbR = $db->beginTransaction();
	/*
	$dbPrepare = $db->prepare("insert into test (name) values (:name)");
	$dbPrepare->bindParam(":name",$name);
	
	$name = "cq6";
	$dbPrepare->execute();

	$name = "cq7";
	$dbPrepare->execute();
	*/
	//$num = $db->exec('insert into test (name) values ("ddd")');
	//echo $num;
	$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_UPPER);
	$pdoS = $db->prepare("select * from test");
	$pdoS->setFetchMode(PDO::FETCH_ASSOC);
	
	$pdoS->execute();
	$result = $pdoS->rowCount();

	var_dump($result);
	var_dump($db->getAttribute(PDO::ATTR_CLIENT_VERSION));
if ($db->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
  echo "Running on mysql; doing something mysql specific here\n";
}
}catch(PDOException $e){
	
	echo "Expection Information:".$e->getMessage();
}



?>
<?php
$host = "localhost";
$username = "root";
$password = "";
try 
{
    $conn = new PDO("mysql:host=$host;dbname=spizarnia", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$response = array('success' => false);

if(isset($_POST['nazwa']) && $_POST['nazwa']!='' && isset($_POST['zdjecieProduktu']) && $_POST['zdjecieProduktu']!='' && isset($_POST['dataPrzydatnosci']) && $_POST['dataPrzydatnosci']!='' && isset($_POST['lokalizacjaProduktu']) && $_POST['lokalizacjaProduktu']!='' && isset($_POST['kodKreskowy']) && $_POST['kodKreskowy']!='')
{
	$sql = "INSERT INTO produkty(name, photo, expiration_date, product_location, bar_code) VALUES('".$_POST['nazwa']."', '".$_POST['zdjecieProduktu']."', '".$_POST['dataPrzydatnosci']."','".$_POST['lokalizacjaProduktu']."', '".$_POST['kodKreskowy']."')";
	if($conn->query($sql))
	{
		$response['success'] = true;
	}
	else
	{
		$response['success'] = false;
	}
}

echo json_encode($response);


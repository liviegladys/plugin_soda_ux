<?php
// Open the connection to the Database
// Function to connect to the DB with the database name option
function ConnectToMySql( $dbName="sodadecsimplon" ) {
    // These parameters must be set based on your MySQL settings
    $hostdb = 'sodadecsimplon.mysql.db';   // MySQl host
    $userdb = 'sodadecsimplon';    // MySQL username
    $passdb = 'Passsimplon12';    // MySQL password
    $namedb =  $dbName ? $dbName : 'jscharting'; // MySQL database name

  	
    $link = mysqli_connect($hostdb, $userdb, $passdb,$namedb);
	
    if(mysqli_connect_errno()){
            die('Could not connect: ' . mysqli_connect_error());
    }
   
    return $link;
}
?>
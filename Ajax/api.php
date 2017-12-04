<?php



function getDatabaseConnection() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bfeaad637110cb";
    $password = "c0419d9c";
    $dbname = "heroku_303da836d19345a"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}



function getUsersThatMatchUserName() {
    
    $username = $_GET['username']; 

    
     $dbConn = getDatabaseConnection(); 

     $sql = "SELECT * from user WHERE username='$username'"; 
     
     $statement = $dbConn->prepare($sql); 
    
     $statement->execute(); 
     $records = $statement->fetchAll(); 
     echo json_encode($records); 
}

function validatePassword() {
    $username = $_GET['username']; 
    $password = $_GET['password'];
    
    //database logic to confirm that the password matches the stored password in the DB
    
    echo sha1($password); 
}

if ($_GET['action'] == 'validate-username' ) {
    getUsersThatMatchUserName(); 
} else if ($_GET['action'] == 'validate-password') {
    
}
 

?>

<?php
session_start();   //starts or resumes a session

function loginProcess() {

    if (isset($_POST['loginForm'])) {  //checks if form has been submitted
    
        include 'dbconnect.php';
        $conn = getDatabaseConnection();
      
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            
            $sql = "SELECT *
                    FROM Admin
                    WHERE username = :username 
                    AND   password = :password ";
            
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;

            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetch();
            
            if (empty($record)) {
                
                echo "Wrong Username or password";
                
            } else {
                
               $_SESSION['username'] = $record['username'];
               $_SESSION['adminName'] = $record['firstName'] . "  " . $record['lastName'];
               //echo $record['firstName'];
               header("Location: Athletes.php"); //redirecting to admin.php
                
            }
           // print_r($record);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login  </title>
        <style>
        @import url("css/styles.css");
        </style>
    </head>
    <body>


            <h1> Admin Login </h1>
            
            <form method="post">
                <div id="usernameField">
                Username: <input type="text" name="username"/> <br />
                </div>
                
                <div id="passwordField">
                Password: <input type="password" name="password" /> <br />
                </div>
                
                <input type="submit" name="loginForm" value="Login!"/>
                
                <a class="button" href="/finalCST336Project/homepage.php">Home</a>
            </form>

            <br />
            
            <?=loginProcess()?>
    </body>
</html>
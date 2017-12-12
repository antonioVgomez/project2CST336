<?php
session_start();
    if (!isset($_SESSION['username'])) {
        
        header("Location: login.php");
        
    }
    include 'dbconnect.php';
    $conn = getDatabaseConnection();
  
function getUserInfo() {
    global $conn;
    
    $sql = "SELECT * 
            FROM athlete
            WHERE id = " . $_GET['userId']; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
    
    return $record;
}
 if (isset($_GET['updateUser'])) { //checks whether admin has submitted form.
     
     //echo "Form has been submitted!";
     
     $sql = "UPDATE athlete
             SET name = :fName,
                 dob  = :dOB,
                 age = :years,
                 born = :bornIn,
                 sport = :sports,
             WHERE id = :id";
     $np = array();
     
    $np['fName'] = $_GET['name'];
    $np[':dOB'] = $_GET['dob'];
    $np[':years'] = $_GET['age'];
    $np[':bornIn'] = $_GET['born'];
    $np[':sports'] = $_GET['sports'];
    $np[':id'] = $_GET['userId'];  
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
     
     echo "<div id='box'> Record has been updated! </div>";
     
 }
 if (isset($_GET['userId'])) {
     
    $userInfo = getUserInfo(); 
     
     
 }
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Athlete </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>

        <h1> Adding a New Athlete </h1>
            <br>
            <div id="box">
            <form method="GET">
               ID:<input type="number" name="id" />
                <br />
                Full name:<input type="text" name="name"/>
                <br/>
                DOB: <input type= "text" name ="dOB"/>
                <br/>
                AGE: <input type ="number" name= "years"/>
                <br />
                BORN IN: <input type ="text" name= "bornIn"/>
                <br />
                SPORT: <input type ="text" name= "sports"/>
                <br />
               
                <input type="submit" value="Add User" name="addUser">
            </form>
            <br>
            <form action="adminOnly.php">
            <input type="submit" value="Update User" name="updateUser">
        </form>
        <br>
        <form action="homepage.php">
                
                <input type="submit" value="Home" />
                
            </form>
        </div>
    </body>
</html>

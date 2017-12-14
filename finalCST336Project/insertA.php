<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: adminOnly.php");
}

include 'dbconnect.php';
$conn = getDatabaseConnection();

function getAthleteInfo() {
    global $conn;
    $sql = "SELECT * FROM athletes WHERE id=".$_GET['id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    return $record;
}

if(isset($_GET['updateAthlete'])) {
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
    $np[':id'] = $_GET['id'];  
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
     
     echo " Record has been updated!";
}

 if (isset($_GET['id'])) {
     
    $athleteInfo = getAthleteInfo(); 
     
     
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

        <h1> Update Athlete </h1>
            <br>
            <div id="box">
            <form method="GET">
               ID:<input type="number" name="id" value="<?= $athleteInfo ['id']?>" />
                <br />
                Full name:<input type="text" name="fname" value="<?= $athleteInfo ['name']?>"/>
                <br/>
                DOB: <input type= "text" name ="dOB" value="<?= $athleteInfo ['dob']?>"/>
                <br/>
                AGE: <input type ="number" name= "years" value="<?= $athleteInfo ['age']?>"/>
                <br />
                BORN IN: <input type ="text" name= "bornIn" value="<?= $athleteInfo ['born']?>"/>
                <br />
                SPORT: <input type ="text" name= "sports" value="<?= $athleteInfo ['sport']?>"/>
                <br />
               
                <input type="submit" value="update athlete" name="updateAthlete">
            </form>
            <br>
            <form action="adminOnly.php">
            <input type="submit" value="back" name="updateUser">
        </form>
        <br>
        
        </div>
    </body>
</html>

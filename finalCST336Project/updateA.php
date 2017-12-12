<?php
include 'dbconnect.php';
$conn = getDatabaseConnection();
if (isset($_GET['addUser'])) {  //the add form has been submitted
    $sql = "INSERT INTO athlete
             (id, name, dob, age, born, sports) 
             VALUES
             (:athleteID, :fName, :dOB,:years, :bornIn, :sports)";
    $np = array();
    
    //echo "$sql";
    
    $np[':athleteID'] = $_GET['id'];
    $np['fName'] = $_GET['name'];
    $np[':dOB'] = $_GET['dob'];
    $np[':years'] = $_GET['age'];
    $np[':bornIn'] = $_GET['born'];
    $np[':sports'] = $_GET['sports'];
    
    $stmt=$conn->prepare($sql);
    $stmt->execute($np);
    
    echo "<div id='box'> User was added! </div>";
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Update Athlete</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>

            <h1> Update Athlete </h1>
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
               
                <input type="submit" value="Update Athlete" name="addUser">
            </form>
            <br>
            <form action="adminOnly.php">
                
                <input type="submit" value="Home" />
                
            </form>
        </div>
    </body>
</html

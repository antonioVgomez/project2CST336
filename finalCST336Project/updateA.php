<?php
include 'dbconnect.php';
$conn = getDatabaseConnection();
if (isset($_GET['addUser'])) {  //the add form has been submitted
    $sql = "INSERT INTO athlete (`id`, `name`, `dob`, `age`, `born`, `sport`,)
             (:id, :fname, dOB, :Ages, :borns, :sports)";
    $np = array();
    
    //echo "$sql";
    
    $np[':id'] = $_GET['id'];
    $np[':fname'] = $_GET['name'];
    $np[':dOB'] = $_GET['dob'];
    $np[':Ages'] = $_GET['age'];
    $np[':borns'] = $_GET['born'];
    $np[':sports'] = $_GET['sport'];
    
    $stmt=$conn->prepare($sql);
    $stmt->execute($np);
    
    echo "<div id='box'> User was added! </div>";
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Add new user</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>

            <h1> Tech Checkout System: Adding a New User </h1>
            <br>
            <div id="box">
            <form method="GET">
                ID:<input type="text" name="id" />
                <br />
                Full name:<input type="text" name="fullname"/>
                <br/>
                DOB: <input type= "text" name ="dob"/>
                <br/>
                AGE: <input type ="text" name= "age"/>
                <br />
                BORN: <input type ="text" name= "born"/>
                <br />
                SPORT: <input type ="text" name= "sports"/>
                <br />
              
                <input type="submit" value="Add User" name="addUser">
            </form>
            <br>
            <form action="adminOnly.php">
                
                <input type="submit" value="Home" />
                
            </form>
        </div>
    </body>
</html>
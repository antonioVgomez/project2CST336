<?php


include 'dbconnect.php';
$conn = getDatabaseConnection();


function departmentList() {
    global $conn;
    $sql = "SELECT * FROM athlete ORDER BY id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

if(isset($_GET['addUser'])) { //the add form has been sunbmitted
    $sql = "INSERT INTO athlete (id,name, dob, age, sport) VALUES (:aID,:fName, :dOB, :Age, :sports,)";
    $np = array();
    $np[':aID']=$_GET['id'];
    $np[':fName'] = $_GET['name']; //full name
    $np[':dOB'] = $_GET['dob'];
    $np[':Age'] = $_GET['age'];
    $np[':sports'] = $_GET['sport'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    echo "User was added successfully!";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Add New athlete</title>
    </head>
    <body>
        <h1>Adding</h1>
        <h1> UPDATE: Adding a New athlete </h1>
        <form method="GET">
            JERSEY OR TEAM NUMBER:<input type="text" name="aID" />
            <br />
            Full Name:<input type="text" name="fnam" />
            <br />
            DOB:<input type="text" name="dOB"/>
            <br/>
            AGE: <input type= "age" name ="age"/>
            <br/>
            SPORT: <input type ="text" name= "sport"/>
            <br />

            <input type="submit" value="Add User" name="addUser">
        </form>
    </body>
</html>
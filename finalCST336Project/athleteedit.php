<?php

    include 'dbconnect.php';
    $conn = getDatabaseConnection(); 

function getUserInfo()
{
    global $conn;
     
    $sql = "SELECT *
            FROM athlete
            WHERE id = ".$_GET['id'];;
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($record);
            
            return $record;
    
}

function listAthletes()
{
      
        global $conn;
        
        $sql = "SELECT * FROM athletes ORDER BY name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }


if(isset($_GET['updateUser']))
{
    //echo "Form has been submitted";
    
    $sql="UPDATE accolaids 
        SET name = :fName,
        SET sport = :lName
        WHERE id = :userId";
        
    $np = array();
        
    $np[':fName'] = $_GET['name'];
    $np[':lName'] = $_GET['sport'];
    $np[':userId'] = $_GET['id'];
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np); //finish
    
    echo "Record has been updated.";
}



if(isset($_GET['id']))
{
    $userInfo = getUserInfo();
}

?>



<!DOCTYPE html>

<head>
    
    <title>Update</title>
    <style>
        @import url("css/styles.css");
        </style>
    
</head>
<body>
    <h1>Update User</h1>
    
      <h1> Tech Checkout System: Updating User's Info </h1>
        <form method="GET">
             <input type="hidden" name="userId" value="<?=$userInfo['id']?>" />
            <br />
            First Name:<input type="text" name="firstName" value="<?=$userInfo['name']?>" />
            <br />
            Last Name:<input type="text" name="sport" value="<?=$userInfo['sport']?>"/>
            <br/>
            Email: <input type= "email" name ="email" value="<?=$userInfo['email']?>"/>
            <br/>
            Phone Number: <input type ="text" name= "phone" value="<?=$userInfo['phone']?>"/>
            <br />
           
            <input type="submit" value="Update User" name="updateUser">
        </form>
</body>

</html>
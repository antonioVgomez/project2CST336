<?php  
//fetch.php  
if(isset($_POST["id"]))
{
 $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "bfeaad637110cb", "c0419d9c", "heroku_303da836d19345a");
 $output = '';
 $query = "SELECT * FROM athlete WHERE id='".$_POST["id"]."'";  
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $output = '
  <p><img src="images/'.$row["image"].'" class="img-responsive img-thumbnail" /></p>
  <p><img src="images/'.$row["nationality"].'" class="img-responsive img-thumbnail" /></p>
  <p><label>Name : '.$row['name'].'</label></p>
  <p><label>Born : </label><br />'.$row['born'].'</p>
  <p><label>DOB : </label>'.$row['dob'].'</p>
  <p><label>Age : </label>'.$row['age'].'</p>
  <p><label>Sport : </label>'.$row['sport'].'</p>
  ';
 }
 echo $output;
}

?>
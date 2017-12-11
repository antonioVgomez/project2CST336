<?php
//fetch.php
 $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "bfeaad637110cb", "c0419d9c", "heroku_303da836d19345a");
 $output = ''; 
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM accolaids
  WHERE name LIKE '%".$search."%'
  OR sport LIKE '%".$search."%' 
  OR Championships LIKE '%".$search."%' 
  OR status LIKE '%".$search."%' 

 ";
}
else
{
 $query = "
  SELECT * FROM accolaids ORDER BY name
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name</th>
     <th>Sport</th>
     <th>Championships</th>
     <th>Status</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["sport"].'</td>
    <td>'.$row["Championships"].'</td>
    <td>'.$row["status"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
<?php
session_start();


if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: login.php");
}
?>

<?php
 $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "bfeaad637110cb", "c0419d9c", "heroku_303da836d19345a");
 $query = "SELECT * FROM athlete ORDER BY id desc";
 $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/finalCST336Project/style.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>athletes</title>
    <!-- Bootstrap core CSS -->
    <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->


  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">NA</a>
      </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/finalCST336Project/homepage.php">Home</a></li>
          <li><a href="adminOnly.php">EDIT DB</a></li>
        </ul>
      </div>
    </div>
    
  </nav>

  <br/>

</br/>
  <!-- youtube api -->
      <header>
           <h1 class="w100 text-center"><a href="item.html">Lookup a athlete in action</a></h1>
       </header>
       <div class="row">
           <div class="col-md-6 col-md-offset-3">
               <form action="#">
                   <p><input type="text" id="search" placeholder="Type something..." autocomplete="off" class="form-control" /></p>
                   <p><input type="submit" value="Search" class="form-control btn btn-primary w100"></p>
               </form>
               <div id="results"></div>
           </div>
       </div>
  <!-- youtube api -->
           <div class="container" style="width:800px;">  
                <h2 align="center">Bootstrap Popover</h2>  
                <h3 align="center">Athletes</h3>                 
                <br /><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="20%">Athlete Id</th>  
                               <th width="80%">Name</th> 
                               <!--<th width="10%">Delete</th> -->
          
                          </tr> 
                         
                          <?php 
                          
                            while($row = mysqli_fetch_array($result))  
                            {  
                            ?>  
                            <tr>  
                                 <td><?php echo $row["id"]; ?></td>  
                                 
                                 <td><a href="#" data-toggle="tooltip" class="hover" id="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></a></td>
                                
                                 <!--<td><button type="button" class="btn btn-xs btn-danger btn_delete" name="delete_btn" data-id3="<?php echo $row["id"]; ?>">x</button></td>  -->
                     
                            </tr> 
                         
                          <?php
                          }  
                          ?>
                          
                     </table>  
                     <p>Key:Athletes with * deceased</p>
                </div>  
           </div>  
   
  
        <!--<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>-->
        <!--conflicting javascript was causing the error I will leave this out.-->
        <script src="/finalCST336Project/js/app.js"></script>
        <script src="https://apis.google.com/js/client.js?onload=init"></script>




  </body>
<!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; CST336 FinalProject Website 2017</p>
    </div>
    <!-- /.container -->
  </footer>

</html>




<script>
   $(document).ready(function(){
  
    $('.hover').tooltip({
     title: fetchData,
     html: true,
     placement: 'right'
    });
  
    function fetchData()
    {
     var fetch_data = '';
     var element = $(this);
     var id = element.attr("id");
     $.ajax({
      url:"fetch.php",
      method:"POST",
      async: false,
      data:{id:id},
      success:function(data)
      {
       fetch_data = data;
      }
     });   
     return fetch_data;
    }
   });


</script>

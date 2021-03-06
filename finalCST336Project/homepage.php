
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/finalCST336Project/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <!--NAV-->
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/finalCST336Project/login.php">Athletes</a></li>
      </ul>
    
        
    </div>
  </div>
</nav>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="/finalCST336Project/images/realmadrid3.jpg" alt="bernabeu" width="1200" height="700">
          <div class="carousel-caption">
            <h3>Bernabeu Stadium</h3>
            <p>Home of Real Madrid F.C.</p>
          </div>
        </div>

        <div class="item">
          <img src="/finalCST336Project/images/Aryton1.jpg" alt="raceday" width="1200" height="700">
          <div class="carousel-caption">
            <h3>Aryton Senna</h3>
            <p>3X Formula 1 Champ.</p>
          </div>
        </div>

        <div class="item">
          <img src="/finalCST336Project/images/womens-world-cup.jpg" alt="wwcchamps" width="1200" height="700">
          <div class="carousel-caption">
            <h3>US Womans Soccer Team 2015</h3>
            <p>Womens World Cup Champions</p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>

<div class="container text-center">
  <h3>Tony's Sportspedia</h3>
  <p>Champions keep playing until they get it right.-Billie Jean King</p>
  <p>Welcome to my wiki page on some of my favorite athletes. This site will display and show ...</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p><strong>The Athelete</strong></p><br>
      <img src="/finalCST336Project/images/mj.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
    </div>
    <div class="col-sm-4">
      <p><strong>Their Sport</strong></p><br>
      <img src="/finalCST336Project/images/formula1.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
    </div>
    <div class="col-sm-4">
      <p><strong>Their Achievements</strong></p><br>
      <img src="/finalCST336Project/images/messiT.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
    </div>
  </div>
</div>

<!-- Information on what I used in this site-->
<br>
  <h3 class="text-center">Tech and Languages Used</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">The Look</a></li>
    <li><a data-toggle="tab" href="#menu1">The Feel</a></li>
    <li><a data-toggle="tab" href="#menu2">The Help</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Style</h2>
      <p>I used a mix of bootstrap and CSS to design my pages</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2>Tech used </h2>
      <p>The Site was made up with various languages all working together to provide a responsive and cool site</p>
      <p>PHP, AJAX, Javascript, Bootstrap, HTML and SQL</p>
    </div>
 
    
    
    <div id="menu2" class="tab-pane fade">
      <h2>References</h2>
      <p>W3schools</p>
      <p>http://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html</p>
      <p>Lab 6 and some other assignmens</p>
    </div>
  </div>
</div>
     <div class="container">
   <br />
   <h2 align="center">look up an athlete</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by " class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
</body>


<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; CST336 FinalProject Website 2017</p>
  </div>
  <!-- /.container -->
</footer>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
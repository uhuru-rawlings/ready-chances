<?php
  if(isset($_COOKIE["useremail"])){

  }else{
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="images/icon.png" id="icon" type="image/png" /> 
  <title>ready-chances</title>
</head>
<body>
  <nav>
    <div class="logo">
      <img src="images/icon.png"width="100px" height="50px" alt="">
    </div>
    <div class="menu">
      <ul>
        <li class="active"><a href="default.php"><img src="images/home.png" width="20px" heigh="20px" alt=""> Home</a></li>
        <li><a href="user.php"><img src="images/user.png" width="20px" heigh="20px" alt=""> Clients</a></li>
        <li><a href="posts.php"><img src="images/post.png" width="20px" heigh="20px" alt=""> Posts</a></li>
        <li><a href="messages.php"><img src="images/message.png" width="20px" heigh="20px" alt=""> Messages</a></li>
        <li><a href="logout.php"><img src="images/logout.png"  width="20px" heigh="20px" alt=""> Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- --------------------------------------------body------------------------------- -->
  <div class="body">
    <p>Dashboard</hp>
    <div class="coll">
      <div class="rows">
        <!-- image -->
        <div class="img">
          <img src="images/users.png" width="100px" height="100px" alt="">
        </div>
        <!-- text -->
        <div class="img">
          <a href="user.php">
          <?php
           $connection = mysqli_connect("127.0.0.1","root","","joblister");
           if($connection){
                $sql = "SELECT * FROM users";
                $query = mysqli_query($connection, $sql);
                $rows = mysqli_num_rows($query);
                echo($rows);
           }else{
             echo("<script>alert('Error connecting to the server')</script>");
           }
        ?>
        <br>
            Users</a>
        </div>
      </div>
      <div class="rows">
      <div class="img">
          <img src="images/jobs.png" width="100px" height="100px" alt="">
        </div>
        <!-- text -->
        <div class="img">
        <a href="jobs.php">
        <?php
           $connection = mysqli_connect("127.0.0.1","root","","joblister");
           if($connection){
                $sql = "SELECT * FROM postedjobs";
                $query = mysqli_query($connection, $sql);
                $rows = mysqli_num_rows($query);
                echo($rows);
           }else{
             echo("<script>alert('Error connecting to the server')</script>");
           }
        ?>
          <br>
          Jobs</a>
        </div>
      </div>
      <div class="rows">
      <div class="img">
          <img src="images/sponsorship.png" width="100px" height="100px" alt="">
        </div>
        <!-- text -->
        <div class="img">
        <a href="sponsorship.png">
        <?php
           $connection = mysqli_connect("127.0.0.1","root","","joblister");
           if($connection){
                $sql = "SELECT * FROM sponsorship";
                $query = mysqli_query($connection, $sql);
                $rows = mysqli_num_rows($query);
                echo($rows);
           }else{
             echo("<script>alert('Error connecting to the server')</script>");
           }
        ?>
         <br>  
        Sponsorship</a>
        </div>
      </div>
    </div>
  </div>
  <div class="notices">
    <div class="notice">
        <div class="text">Notices</div>
        <?php
           $connection = mysqli_connect("127.0.0.1","root","","joblister");
           if($connection){
                $sql = "SELECT * FROM notices LIMIT 4";
                $query = mysqli_query($connection, $sql);
                $rows = mysqli_num_rows($query);
                if($rows > 0){
                    while($results = mysqli_fetch_assoc($query)){
                      echo("<p>");
                      echo($results["content"]);
                      echo("</p>");
                    }
                }else{
                  echo("<p>No notice posted</p>");
                }
           }else{
             echo("<script>alert('Error connecting to the server')</script>");
           }
                ?>
            </div>
            <div class="date" id="chartContainer" style="height: 230px; width: 380px">
              <!-- php -->
              <?php
                $connection = mysqli_connect("127.0.0.1","root","","joblister");
                // fist data
                $sql = "SELECT * FROM postedjobs";
                $query = mysqli_query($connection, $sql);
                $rows = mysqli_num_rows($query);
                //  second data
                $sql1 = "SELECT * FROM users";
                $query1 = mysqli_query($connection, $sql1);
                $rows1 = mysqli_num_rows($query1);
                //  normal userreg
                $sql2 = "SELECT * FROM userreg";
                $query2 = mysqli_query($connection, $sql2);
                $rows2 = mysqli_num_rows($query2);
                //  sponsorships
                $sql3 = "SELECT * FROM sponsorship";
                $query3 = mysqli_query($connection, $sql3);
                $rows3 = mysqli_num_rows($query3);
                $dataPoints = array( 
                  array("y" => $rows, "label" => "Postedjobs" ),
                  array("y" => $rows1, "label" => "Special-Users" ),
                  array("y" => $rows2, "label" => "Normal-users" )
        );
        
        ?>
      <!-- script -->
    <script>
              window.onload = function() {
 
              var chart = new CanvasJS.Chart("chartContainer", {
              	animationEnabled: true,
              	theme: "light2",
              	title:{
              		text: "Registration and Post data"
              	},
              	axisY: {
              		title: "Number of posts"
              	},
              	data: [{
              		type: "column",
              		yValueFormatString: "#,##0.## ",
              		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
              	}]
              });
              chart.render();
               
              }
              </script>
    <!-- <div id="chartContainer" style="height: 200px; width: 98%"></div> -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
  </div>
  <!----------------------------------------------------- footer----------------------------- -->
  <footer>
    <!-- contact -->
    <div class="contact">
      <h5>Contact</h5>
      <p>
        +254 77110907 <br>
        +254 10000001 <br>
        readychances@gmail.com
      </p>
    </div>
    <!-- lovation -->
    <div class="location">
      <h5>Location</h5>
      <p><a href="www.googlemaps.com"><img src="images/location.png" width="20px" heigth="20px" alt=""> Location</a>
       <br> Oginga Odinga street (jobs Plaza 3<sup>rd</sup> floor ).
    </p>
    </div>
    <!-- services -->
    <div class="services">
      <h5>Services</h5>
      <p>
        <a href="#">Web Design </a> <br>
        <a href="#">Web Hosting  </a><br>
        <a href="#">Web Developement </a>
      </p>
    </div>
    <div class="sociallinks">
      <h5>Social Links</h5>
      <p>
        <a href="#"> <img src="images/facebook.png" height="15px" width="15px" alt=""> Facebook</a>
        <br>
        <a href="#"> <img src="images/linkdn.png" height="15px" width="15px" alt=""> Linkedln</a>
        <br>
        <a href="#"> <img src="images/instagram.png" height="15px" width="15px" alt=""> Instagram</a>
      </p>
    </div>
  </footer>
</body>
</html>
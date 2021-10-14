<?php
  if(isset($_COOKIE["useremail"])){

  }else{
    header("location: login.php");
  }
?>
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
        <li><a href="default.php"><img src="images/home.png" width="20px" heigh="20px" alt=""> Home</a></li>
        <li><a href="user.php"><img src="images/user.png" width="20px" heigh="20px" alt=""> Clients</a></li>
        <li><a href="posts.php"><img src="images/post.png" width="20px" heigh="20px" alt=""> Posts</a></li>
        <li class="active"><a href="messages.php"><img src="images/message.png" width="20px" heigh="20px" alt=""> Messages</a></li>
        <li><a href="logout.php"><img src="images/logout.png"  width="20px" heigh="20px" alt=""> Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- -----------------------------------------content-------------------------------- -->
  <div class="messages">
    <h3>Messages</h3>
    <?php
       $connect = mysqli_connect("127.0.0.1","root","","joblister");
       if($connect){
        //  useremail,contact,	messages;
         $sql = "SELECT * FROM messages";
         $query = mysqli_query($connect, $sql);
         if($rows= mysqli_num_rows($query) > 0){
           echo("<div class='coll'>");
             while($results = mysqli_fetch_array($query)){
               $useremail = $results['useremails'];
               $contact = $results['contact'];
               $messages = $results['messagecontent'];
               $timeposted = $results['timeposted'];
               echo("<div class='success'>");
               echo("<p>".$useremail."</p>");
               echo("</p>".$contact."</p>");
               echo("<p>".$messages."</p>");
               echo("<p>Posted.".$timeposted."</p>");
               echo("</div>");
             }
             echo("</div>");
         }else{
           echo("No data to display");
         }
       }else{
         echo("<script>alert('Cannot connect to the server')</script>");
       }
    ?>
  </div>
  <!-- -------------------------------------------footer---------------------------------- -->
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
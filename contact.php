<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
</head>
<body class="bg">
      <nav>
        <ul>
          <li><a href="home.php"><img src="./images/home.png" height="20px" width="20px" alt="">Home</a></li>
          <li><a href="about.php"><img src="./images/about.png" height="20px" width="20px" alt="">About</a></li>
          <li><a href="contact.php"><img src="././images/call.png" height="20px" width="20px" alt="">Contact</a></li>
          <li><a href="comment.php"><img src="./images/message.png" height="20px" width="20px" alt="">Comment</a></li>
        </ul>
      </nav>
     <div class="form">
          <form action="#" class="userinput" method="post">
            <label for="">Email
              <br>
              <input type="email" id="email" name="email" placeholder="Enter email" required>
            </label>
            <br>
             <label for="">Contact
               <br>
               <input type="number" id="Contact" name="Contact" placeholder="enter contact" required>
             </label>
            <br>
            <label for="">message
              <br>
              <textarea id="messagecontent" name="messagecontent" placeholder="Type your message" required></textarea>
            </label>
            <br>
            <input type="submit" name="message" value="send message">
         </form>
         <?php
           if(isset($_POST['message'])){
            $connect = mysqli_connect("127.0.0.1","root","","joblister");
            if($connect){
               $email = $_POST['email'];
               $Contact = $_POST['Contact'];
               $messagecontent = $_POST['messagecontent'];

               $sql = "INSERT INTO messages(useremails,contact,messagecontent)
                    VALUES('$email','$Contact','$messagecontent')";
               $query = mysqli_query($connect, $sql);
               if($query){
                 echo("<script>alert('Thank you,your message is submited')</script>");
               }else{
                 echo("<script>alert('Error submiting your request, please reload and try again')</script>");
               }
            }else{
              echo("<script>alert('Cannot connect to the server, please reload and try again')</script>");
            }
           }
         
         ?>
     </div>
     <style>
    footer{
      margin-top:200px;
    }
  </style>
      <!-- footer -->
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
        <!-- location -->
        <div class="location">
          <h5>Location</h5>
          <p><a href="www.googlemaps.com"><img src="./images/location.png" width="15px" heigth="15px" alt=""> Location</a>
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
            <a href="#"> <img src="./images/facebook.png" height="15px" width="15px" alt=""> Facebook</a>
            <br>
            <a href="#"> <img src="./images/linkdn.png" height="15px" width="15px" alt=""> Linkedln</a>
            <br>
            <a href="#"> <img src="./images/instagram.png" height="15px" width="15px" alt=""> Instagram</a>
          </p>
        </div>
      </footer>
    
</body>
</html>
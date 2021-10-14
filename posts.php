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
    <link rel="icon" href="images/icon.png" id="icon" type="image/png" /> 
    <link rel="stylesheet" href="style.css">
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
        <li class="active"><a href="posts.php"><img src="images/post.png" width="20px" heigh="20px" alt=""> Posts</a></li>
        <li><a href="messages.php"><img src="images/message.png" width="20px" heigh="20px" alt=""> Messages</a></li>
        <li><a href="logout.php"><img src="images/logout.png"  width="20px" heigh="20px" alt=""> Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- -----------------------------------------content-------------------------------- -->
  <div class="coll">
    <div class="jobs">
      <fieldset>
        <legend>Post Jobs</legend>
        <form action="#" method="post">
            <label for="">CompanyName:
              <br>
              <input type="text" name="companyname" id="companyname" placeholder="Enter companyName" required>
            </label>
            <br>
            <label for="">Position:
              <br>
              <input type="text" name="jobposition" id="jobposition" placeholder="Enter job position" required>
            </label>
            <br>
            <label for="">ApplicationLink
              <br>
              <input type="url" name="applicationlink" id="applicationlink" placeholder="Enter link ( https://www.google.com )" required>
            </label>
            <br>
            <label for="">Requirements:
              <br>
              <textarea placeholder="Enter rquirements" name="requirement" required></textarea>
            </label>
            <br>
              <br>
              <label for="">Other Details:
                <br>
                <textarea placeholder="Enter other important details" name="otherdescription"></textarea>
              </label>
              <br>
              <br>
              <input type="submit" value="Post-Job" name="job">
              <!-- -------------------------------------------php--------------------- -->
              <?php
                $connect = mysqli_connect("127.0.0.1","root","","joblister");
                if($connect){
                  if(isset($_POST['job'])){
                    $companyname = mysqli_real_escape_string($connect, $_POST['companyname']);
                    $jobposition = mysqli_real_escape_string($connect, $_POST['jobposition']);
                    $applicationlink = mysqli_real_escape_string($connect, $_POST['applicationlink']);
                    $requirement = mysqli_real_escape_string($connect, $_POST['requirement']);
                    $otherdescription = mysqli_real_escape_string($connect ,$_POST['otherdescription']);
                    $jobids = "JOB".rand(10000,10000000);
                    $sql = "INSERT INTO postedjobs(company,positions,requirements,descriptions,jobid,urllinks)
                            VALUES('$companyname','$jobposition','$requirement','$otherdescription','$jobids','$applicationlink')";

                      $query = mysqli_query($connect, $sql);
                      if($query){
                        echo("<script>alert('Succesfully posted one opportunity')</script>");
                      }
                  }
                }
              ?>
        </form>
      </fieldset>
    </div>
    <!-- ------------------------------------sponsorships-------------------------- -->
    <div class="sponsorships">
    <fieldset>
        <legend>Post sponsorships</legend>
        <form action="#" method="post">
        <label for="">CompanyName:
              <br>
              <input type="text" name="companyname" id="companyname" placeholder="Enter companyName" required>
            </label>
            <br>
            <label for="">ApplicationLink
              <br>
              <input type="url" name="applicationlink" id="applicationlink" placeholder="Enter link ( https://www.google.com )" required>
            </label>
            <br>
            <label for="">Requirements:
              <br>
              <textarea placeholder="Enter rquirements" name="requirement" required></textarea>
            </label>
            <br>
            <br>
              <label for="">Other Details:
                <br>
                <textarea placeholder="Enter other important details" name="otherdescription"></textarea>
              </label>
              <br>
              <br>
              <input type="submit" value="Post-Sponsorship" name="sponsorships">
            </label>
        </form>
        <!-- -----------------------------------------php----------------------------------- -->
        <?php
           $connect = mysqli_connect("127.0.0.1","root","","joblister");
           if($connect){
             if(isset($_POST['sponsorships'])){
               $companyname = mysqli_real_escape_string($connect, $_POST['companyname']);
               $applicationlink = mysqli_real_escape_string($connect, $_POST['applicationlink']);
               $requirement = mysqli_real_escape_string($connect, $_POST['requirement']);
               $otherdescription = mysqli_real_escape_string($connect ,$_POST['otherdescription']);

               $sql2 = "INSERT INTO sponsorship(companyname,nameofprograme,urlliks,descriptions)
                       VALUES('$companyname','$applicationlink','$requirement','$otherdescription')";

                $query2 = mysqli_query($connect, $sql2);
                if($query2){
                  echo("<script>alert('Succesfully posted one opportunity')</script>");
                }
             }
           }
        ?>
      </fieldset>
    </div>
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
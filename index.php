<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>Joblister login system</title>
</head>
<body>
     <div class="signup" id="signup">
         <form action="#" method="post">
           <?php
             if(isset($_POST['signup'])){
              $connect = mysqli_connect("127.0.0.1","root","","joblister");
              if($connect){
                   $fname = mysqli_real_escape_string($connect, $_POST['fname']);
                   $sname = mysqli_real_escape_string($connect, $_POST['sname']);
                   $uemail = mysqli_real_escape_string($connect, $_POST['uemail']);
                   $passwords = mysqli_real_escape_string($connect, $_POST['passwords']);
                    // hashing password
                    $passhash = password_hash($passwords, PASSWORD_DEFAULT);
                  //  check if the same user already exist
                  $sql = "SELECT * FROM userreg WHERE uemails ='".$uemail."' LIMIT 1";
                  $query = mysqli_query($connect,$sql);
                  $rows = mysqli_num_rows($query);
                  if($rows < 1){
                    $sql1 = "INSERT INTO userreg(fname,sname,uemails,passwords)
                           VALUES('$fname','$sname','$uemail','$passhash')";
                    $query1 = mysqli_query($connect,$sql1);
                    if($query1){
                      // echo("<script>alert('user succesfully added')</script>");
                      header("location: login.php");
                    }else{
                      echo("<script>alert('Error adding user, reload and try again')</script>");
                    }
                  }else{
                    echo("<script>alert('User with same user email already exist')</script>");
                  }
              }else{
                echo("<script>alert('Error connecting to the database, contact system admin')</script>");
              }
             }
           ?>
           <label for="">firstName
             <br>
             <input type="text" name="fname" id="fname" placeholder="Enter firstName">
           </label>
           <br>
           <label for="">secondName
             <br>
             <input type="text" name="sname" id="sname" placeholder="Enter secondName">
           </label>
           <br>
           <label for="">userEmail
             <br>
             <input type="email" name="uemail" id="uemail" placeholder="Enter userEmail">
           </label>
           <br>
           <label for="">Password
             <br>
             <input type="password" name="passwords" id="passwords" placeholder="Enter password">
           </label>
           <br>
           <label for="">confirmPassword
             <br>
             <input type="password" name="cpasswords" id="cpasswords" placeholder="confirm Password">
           </label>
           <br>
           <p>By signing-up you agree to our terms and conditions</p>
           <input type="submit" value="Sign-up" name="signup" onclick="return validate()">
         </form>
     </div>
     <script>
       function validate(){
         let data = {
              fname : document.getElementById("fname").value,
              sname : document.getElementById("sname").value,
              uemail : document.getElementById("uemail").value,
              passwords : document.getElementById("passwords").value,
              cpasswords : document.getElementById("cpasswords").value
         }
         if(data.fname === ""){
            alert("first name is empty");
            return false;
         }else if(data.sname === ""){
            alert("second name is empty");
            return false;
         }else if(data.uemail === ""){
          alert("user email  is empty");
            return false;
         }else if(data.passwords === ""){
             alert("password is empty");
             return false;
         }else if(data.cpasswords === ""){
             alert("Please fill the confirm password field");
            return false;
         }else{
           if(data.passwords === data.cpasswords){

           }else{
             alert("Password dont match");
             return false;
           }
         }
       }
     </script>
</body>
</html>
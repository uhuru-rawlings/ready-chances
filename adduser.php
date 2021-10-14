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
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <title>user add form</title>
</head>
<body>
    <div class="coll">
        <div class="rows">
            <fieldset>
                <legend>Add user</legend>
                <form action="#" method="post" enctype="multipart/form-data">
                     <label for="">Fullname: 
                         <br>
                         <input type="text" name="fullname" id="fullname" placeholder="Enter fullname" required>
                     </label>
                     <br>
                     <label for="">Photo: 
                         <br>
                         <input type="file" name="file" id="file" placeholder="Choose an image" required>
                     </label>
                     <br>
                     <label for="">Gender: 
                         <br>
                         <select name="gender" id="gender">
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                             <option value="Other">Other</option>
                         </select>
                     </label>
                     <br>
                     <label for="">Idnumber: 
                         <br>
                         <input type="number" name="nationalid" id="nationalid" placeholder="Enter National Id" required>
                     </label>
                     <br>
                     <label for="">Nationality: 
                         <br>
                         <input type="text" name="nationality" id="nationality" placeholder="Enter Nationality" required>
                     </label>
                     <br>
                     <label for="">Organisation: 
                         <br>
                         <input type="text" name="organisation" id="organisation" placeholder="Enter organisation (Work place)" required>
                     </label>
                     <br>
                     <br>
                     <input type="submit" value="Register" name="register">
                </form>
            </fieldset>
        </div>
        <?php
          $connect = mysqli_connect("127.0.0.1","root","","joblister");
          if($connect){
            if(isset($_POST["register"])){
                $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
                $photo = $_FILES['file'];
                $gender = mysqli_real_escape_string($connect, $_POST['gender']);
                $nationalid = mysqli_real_escape_string($connect, $_POST['nationalid']);
                $nationality = mysqli_real_escape_string($connect, $_POST['nationality']);
                $organisation = mysqli_real_escape_string($connect, $_POST['organisation']);

                $sql = "SELECT * FROM users WHERE userid = '".$nationalid."'";
                $query = mysqli_query($connect, $sql);
                $rows = mysqli_num_rows($query);
                if($rows === 0){

                $filename = $_FILES["file"]["name"];
                $filetmpname = $_FILES["file"]["tmp_name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];
                $fileerror = $_FILES["file"]["error"];

                if($filesize <= 5000000){
                    if($fileerror === 0){
                    //   check extension
                    $Extensions = explode(".",$filename);
                    $Actualextension = strtolower(end($Extensions));
                    // print_r($Actualextension);
                    $Allowed = array("jpg","png","jpeg");
                    // check accepeted extension
                    if(in_array($Actualextension, $Allowed)){
                    //   echo("file type accepeted");
                    //file location
                    $newname = rand(10000, 10000000000);
                    //   print_r($newname);
                    $Actualname = "IMG".$newname.".".$Actualextension;
                    // print_r($Actualname);
                    $finallocation = "uploaded/".$Actualname;
                    // print_r($finallocation);
                    $movetolocation = move_uploaded_file($filetmpname, $finallocation);
                    if($movetolocation){
                        //move to database
                        $userid = "ID".rand(1000, 10000000); 
                       $sql2 = "INSERT INTO users(userid,fullname,userphoto,genders,Nationalid,Nationality,organisation)
                               VALUES('$userid','$fullname','$Actualname','$gender','$nationalid','$nationality','$organisation')";

                            //    $query2 = mysqli_query($connect,$sql2);
                                if($connect->query($sql2) === TRUE){
                                    header("location: user.php");
                                }else{
                                    echo("<script>alert('Error submitting your request')</script>");
                                }
                    }else{
                        echo("<script>alert('Error moving the file')</script>");
                    }
                    }else{
                        echo("<script>alert('File type not allowed check('jpg','jpeg' or 'png')')</script>");
                    }
                    }else{
                        echo("<script>alert('File_Error uploading your file')</script>");
                    }
                }else{
                    echo("<script>alert('file size too lerge')</script>");
                }
                        }else{
                            echo("<script>alert('user with same ID NUMBER already exist')</script>");
                        }
                    }
                }else{
                    echo("<script>alert('cannot connect tot the server')</script>");
                }
        ?>
    </div>
</body>
</html>
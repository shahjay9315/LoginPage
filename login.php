<?php

session_start();
 

 if(isset($_SESSION['loggedin']) == true){

    header("location: welcome.php");

    exit;

}


define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', 'mysql');

define('DB_NAME', 'jay');


/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

if (mysqli_connect_errno())

  {

  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {

       // Fetching variables of the form front end which travels in URL

$name = $_POST['username'];

$password = $_POST['password'];

if($name !=''){

//Insert Query of SQL

$sql="select * from Sample where username = '$name'";

 
// result below
$result=mysqli_query($link,$sql);

        if (mysqli_num_rows($result) > 0) {

        // output data of each row

        $row = mysqli_fetch_assoc($result);
//verifying the table coloumn names from mysql
        $uname = $row['username'];
        $pass = $row['password'];

        if ($uname == $name && $password == $pass ){

         echo "<script type='text/javascript'>alert('User Logged In Sucessfully ');</script>";
      
//for welcome page to open / redirect upon sucessfull login
         session_start();
          $_SESSION['user'] = $uname;
         $_SESSION['loggedin'] == true; //main

         header("location: welcome.php");
         exit;

        }     else{


             echo "<script type='text/javascript'>alert('Data mismatch ');</script>";

        }

 
}



}

else{

   echo "<script type='text/javascript'>alert('Data not found ');</script>";

}

}

    mysqli_close($link);

?>



<html>

  

   <head>

      <title>Login Page</title>

     

      <style type = "text/css">

      cls{
      
    color: #9e9c9c;

  font-size: 20px;

  padding: 75px 2px;

  position: relative;

  top:70px;

  width: 100%;

  text-align: center;

    

}

         body {

            font-family:Arial, Helvetica, sans-serif;

            font-size:14px;

         }

         label {

            font-weight:bold;

            width:100px;

            font-size:14px;

         }

         .box {

            border:#666666 solid 1px;

         }

      </style>

     

   </head>

  

   <body bgcolor = "#FFFFFF">

      

               

      <div align = "center">

         

          <div class = "cls" >

    <img src="dallas.jpeg" margin="20px" width="50%" height="250"></br>

                       <br><p class="faded"><b></b>Welcome To LOGIN PORTAL</b></p></br>

 

   

   </div>

         

          

         <div style = "width:300px; border: solid 1px #333333; " align = "left">

            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>LOGIN PORTAL</b></div>

                                                               

            <div style = "margin:30px">

 

               <form action = "" method = "post">

                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />

                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />

                  <input type = "submit" value = " Submit "/><br />

               </form>

              

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                                                                               

            </div>

                                                               

         </div>

                                               

      </div>

 

   </body>

</html>


<?php

//Initalize and end the session page 


 // session_destroy();
session_start();

if(!isset($_SESSION['loggedin']) !== true)

{

    header("location: login.php");

    exit;

}
 
?>


<html>

    <head>

               <title>Welcome Jay </title>


    </head>

<style>
 
.mytheme{

    color: #3d3b3b;

  font-size: 25px;

  padding: 50px 2px;

  position: relative;

  top:70px;

  width: 100%;

  text-align: center;


}

</style>

<body>

    <div class = "mytheme" >

    <img src="dallas.jpeg" width="450" height="100">


       <p class="faded"><b>Welcome <?php echo htmlspecialchars($_SESSION['user']); ?></b></p>

 
</div>

</body>

</html>

 

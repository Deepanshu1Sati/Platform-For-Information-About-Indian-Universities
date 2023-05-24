<?php

session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "signupdata";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
   die("Connection Failed:" . mysqli_connect_error());
}
if (isset($_POST['login'])) {
   $username = filter_input(INPUT_POST, 'username');
   $password = filter_input(INPUT_POST, 'password');
 //read from database
   $query = "SELECT * FROM signupdatatable WHERE  username = '$username' AND password = '$password' ";
   $result = mysqli_query($conn, $query);
   $user_data = mysqli_fetch_assoc($result);

   if (is_array($user_data)) {
      $_SESSION['username'] = $user_data['username'];
   } else {
      echo ' <script type = "text/javascript">';
      echo 'alert ("Invalid Username or Password")';

      echo ' </script>';
   }
   if (isset($_SESSION["username"])) {
      header("Location: userinterfacephp.php");
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

   <title>Login Page</title>
   <link rel="stylesheet" href="signupcss.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <style>
      .button {
         padding: 3px 25px;
         font-size: 16px;
         text-align: center;
         cursor: pointer;
         outline: none;
         color: #000000;
         background-color: #47b1ea;
         border: none;
         border-radius: 15px;
         box-shadow: 0 3px #999;
      }

      .button:hover {
         background-color: #ffffff
      }

      .button:active {
         background-color: #3e8e41;
         box-shadow: 0 5px #666;
         transform: translateY(4px);
      }

      #logo img {
         margin: 10px;
         width: 50px;
         height: 47px;
      }

      .sign-up-form {

         width: 350px;


         box-shadow: -3px -2px 6px #6c6565, 7px 9px 25px #0b0b0b;

         background: rgb(121, 209, 219);

         padding: 5px;

         margin: 8% auto 0;

         text-align: center;

      }

      table {
         width: 100%;
         border-collapse: collapse;
         background-color: #e5ebf27d;
      }

      th,
      td {
         padding: 8px;
         border: 1px solid #dee2e6;
         border-color: rgb(18, 7, 115);
      }

      th {
         text-align: left;
      }

      #home {
         display: flex;
         flex-direction: column;
         padding: 3px 200px;
         justify-content: center;
         align-items: center;
         height: 510px;
      }

      #home::before {
         content: " ";
         position: absolute;
         top: 0px;
         left: 0px;
         background: url("uni.jpg") no-repeat center center/cover;
         height: 80%;
         width: 100%;
         opacity: 0.90;
         z-index: -1;
      }

      #home h1 {
         color: #212529;
         text-align: center;
         font-size: 40px;
         padding: 40px 20px;
      }

      #home p {
         color: beige;
         text-align: center;
         font-size: 20px;
      }

      .ful {
         display: inline-grid;
         grid-auto-flow: column;
         grid-gap: 24px;
         justify-items: center;
         margin: auto;
      }

      .footer {
         height: 30px;
         position: fixed;
         left: 0;
         bottom: 0;
         width: 100%;
         background-color: #000000a6;
         color: white;
         text-align: center;
      }

      @media (min-width: 500px) {
         ul {
            grid-auto-flow: column;
         }
      }

      .ff {
         color: white;
         text-decoration: none;
         box-shadow: inset 0 -1px 0 hsla(0, 0%, 100%, 0.4);
      }

      .ff:hover {
         box-shadow: inset 0 -1.2em 0 hsla(0, 0%, 100%, 0.4);
      }

      li:last-child {
         grid-column: 1 / 2;
         grid-row: 1 / 2;
      }

      li:hover~li p {
         animation: wave-animation 0.3s infinite;
      }
   </style>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-darkt">
      <div id="logo">
         <img src="icon.png" alt=" ">
      </div>
      <a class="navbar-brand" href="#">Grubbing Uni</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="#">Top Courses <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Study Abroad</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Admission 2023</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  More
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Education Loan</a>
                  <a class="dropdown-item" href="#">Q&A</a>
                  <a class="dropdown-item" href="#">Scholarship</a>
               </div>
            </li>
         </ul>
      </div>
   </nav>
   <div class="sign-up-form">
      <img src="icon.png">

      <form action="login.php" method="Post">

         <h1> Login</h1>

         <input type="text" name="username" class="input-box" placeholder="Username" required>

         <input type="password" name="password" class="input-box" placeholder="Password" required>

         <button type="submit" name="login" class="button">Click to Login</button>



         <p><b> New user to this website?</b> <a href="signupphp.php">Sign Up Now</a></p>


      </form>

   </div>
   <footer>
      <div class="footer">
         <ul class="ful">
            <li class="ll"><a href="#" class="ff">Twitter</a></li>
            <li class="ll"><a href="#" class="ff">Codepen</a></li>
            <li class="ll"><a href="#" class="ff">Email</a></li>
            <li class="ll"><a href="#" class="ff">Dribbble</a></li>
            <li class="ll"><a href="#" class="ff">Github</a></li>
            <li>
               <p>👋</p>
            </li>
         </ul>
      </div>
   </footer>




</body>

</html>
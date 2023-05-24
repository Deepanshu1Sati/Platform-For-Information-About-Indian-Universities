<?php
  $server_name = "localhost";
  $username = "root";
  $password = "";
  $database_name = "signupdata";

  $conn = mysqli_connect($server_name, $username, $password, $database_name);

  // if error occurs 
  if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
  }
  //$sql = "select * from C";
  //$result = ($conn->query($sql));
  //$result = mysqli_query($conn,"SELECT * FROM b.tech(cse)");
  $query = "SELECT * FROM `b.tech(cse)`;";
  
  // FETCHING DATA FROM DATABASE
  $result = $conn->query($query);
  //declare array to store the data of database
  $row = [];

  if ($result->num_rows > 0) {
    // fetch all data from db into array 
    $row = $result->fetch_all(MYSQLI_ASSOC);
  }
  ?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    #logo img {
      margin: 10px;
      width: 50px;
      height: 47px;
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
    .ful{
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

  <section id="home">
    <div id="h1">
      <h1 class="h-primary">List of Top Engineering Colleges in India Based On 2023 Rankings </h1>
    </div>
    <!--<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis dolorum numquam minus. </p>-->
    <!--<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>-->
    <!--<button class="btn">Order Now</button>-->
    <table>
      <thead>
        <tr>
          <th>GD Rank</th>
          <th>Colleges</th>
          <th>Course Fees</th>
          <th>User Reviews</th>
          <th>NIRF Ranking</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($row))
          foreach ($row as $rows) {
        ?>
          <tr>

            <td><?php echo $rows['CD Rank']; ?></td>
            <td><?php echo $rows['Colleges']; ?></td>
            <td><?php echo $rows['Course Fees']; ?></td>
            <td><?php echo $rows['User Reviews']; ?></td>
            <td><?php echo $rows['Ranking']; ?></td>

          </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>
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

  <!--<div class="card">
    <div class="card-header">
      About us: 
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>College is a very important part of our life. The best Time of our life usually comes during college life. Applying for colleges can be overwhelming task. So here we are providing a platform which contains information about different colleges. We are providing most accurate and up to-date information about various colleges, including their programs, courses, faculty, facilities, and admission requirements. </p>
        <--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
    </div>
  </div>-->

</body>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
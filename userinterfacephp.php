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
if (isset($_POST['savedata'])) {
    $username = filter_input(INPUT_POST, 'username');
    $course = filter_input(INPUT_POST, 'course');
    $sql_query = "INSERT INTO course (username,course)
        VALUES ('$username','$course')";
    if (mysqli_query($conn, $sql_query)) {
        $savedata = $_POST['course'];
        if (strcmp($savedata, "B.TECH(CSE)") == 0) {
            header("Location: ./B.TECH(CSE).php");
        } elseif (strcmp($savedata, "B.A(ENGLISH)") == 0) {
            header("Location: ./B.A(ENGLISH).php");
        }
        echo ' <script type = "text/javascript">';
        echo 'alert ("Your Data has been Saved Successfully!")';
        echo ' </script>';
    } else {
        echo "Error:" . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Interface</title>
    <link rel="stylesheet" href="userinterfacecss.css">
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
    <div class="user_interface">
        <img src="icon.png">

        <form action="userinterfacephp.php" method="Post">

            <input type="text" name="username" class="input-box" placeholder=" Enter Username" required>
            <h1> Kindly Select the Course </h1>

            <p>Course Name</p>

            <select name="course" class="input-box">

                <OPTION>B.A(ENGLISH)</OPTION>
                <OPTION>B.A(ECONOMICS)</OPTION>
                <OPTION>B.A(HISTORY)</OPTION>
                <OPTION>B.A(GEOGRAPHY)</OPTION>
                <OPTION>B.A(POLITY)</OPTION>
                <OPTION>B.ARCH</OPTION>
                <OPTION>B.COM</OPTION>
                <OPTION>B.B.A</OPTION>
                <OPTION>B.Sc(AGRICULTURE)</OPTION>
                <OPTION>B.Sc(MATHEMATICS)</OPTION>
                <OPTION>B.Sc(CHEMISTRY)</OPTION>
                <OPTION>B.Sc(PHYSICS)</OPTION>
                <OPTION>B.Sc(INFORMATION TECHNOLOGY)</OPTION>
                <OPTION>B.Sc(BIOTECHNOLOGY)</OPTION>
                <OPTION>B.Sc(BIOCHEMISTRY)</OPTION>
                <OPTION>B.SC(PHYSICAL EDUCATION)</OPTION>
                <OPTION>B.B.A</OPTION>
                <OPTION>B.C.A</OPTION>
                <OPTION>B.C.A(HONS.)</OPTION>
                <OPTION>B.C.A + MCA (DUAL DEGREE)</OPTION>
                <OPTION>B.TECH(CSE)</OPTION>
                <OPTION>B.TECH(CIVIL)</OPTION>
                <OPTION>B.TECH(MECH)</OPTION>
                <OPTION>B.TECH(CHEMICAL)</OPTION>
                <OPTION>B.TECH(ELECTRICAL)</OPTION>
                <OPTION>B.TECH(MECHATRONICS)</OPTION>
                <OPTION>B.TECH(INFORMATION TECHNOLOGY)</OPTION>
                <OPTION>B.TECH(BIOTECHNOLOGY)</OPTION>
                <OPTION>B.Ed</OPTION>
                <OPTION>B.PHARM</OPTION>
                <OPTION>L.L.B.</OPTION>
                <OPTION>M.A(HISTORY)</OPTION>
                <OPTION>M.A(GEOGRAPHY)</OPTION>
                <OPTION>M.A(ECONOMICS)</OPTION>
                <OPTION>M.A(POLITY)</OPTION>
                <OPTION>M.A(ENGLISH)</OPTION>
                <OPTION>M.TECH(CSE)</OPTION>
                <OPTION>M.TECH(CIVIL)</OPTION>
                <OPTION>M.TECH(ELECTRICAL)</OPTION>
                <OPTION>M.TECH(MECHATRONICS)</OPTION>
                <OPTION>M.TECH(INFORMATION TCHNOLOGY)</OPTION>
                <OPTION>M.B.A</OPTION>
                <OPTION>MCA</OPTION>
                <OPTION>M.PHARM</OPTION>
                <OPTION>M.COM</OPTION>
                <OPTION>PHD</OPTION>

            </select>
            <button type="submit" name="savedata" class="button"> Save your Course </button>

            <p><b> Need to Logout?</b><a href="logoutphp.php"> Click here for Logout</a></p>



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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
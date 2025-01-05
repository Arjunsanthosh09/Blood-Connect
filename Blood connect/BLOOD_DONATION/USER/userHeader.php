
<?php
session_start();
include("../DBConnection/dbConnection.php");

?>

<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Medick Responsive web template, Bootstrap Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <title>Medick Medical Category Bootstrap Responsive Web Template | About :: W3Layouts </title>
    <link href="//fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style-starter.css">

    <link rel="stylesheet" href="../login/css/style.css" type="text/css" media="all" />

    <style>
        body {
            background-color: white;
        }

        .container-rqst{
            display: flex;
            justify-content: center;
            margin: 100px auto;
            
        }

        .view-content table {
            border: 1px solid black;
            margin: 120px auto 180px;
            width: 80%;
            text-align: center;

        }

        .view-content th {
            color: white;
            background-color: #030f27;
            padding: 20px 0;
        }

        .view-content td {
            color: #030f27;
        }

        .view-content th,
        td {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 15px 25px;
        }

        .approve-btn {
            padding: 6px 10px;
            background-color: #030f27;
            border-radius: 4px;
            color: white;
        }

        .approve-btn:hover {
            color: white;
            background-color: #2caee2;
        }

        .reject-btn {
            padding: 6px 10px;
            background-color: #030f27;
            border-radius: 4px;
            color: white;
        }

        .reject-btn:hover {
            color: white;
            background-color: #2caee2;
        }

        .login {
            border: 1px solid #ffc107;
            padding: 8px 10px;
            border-radius: 3px;
            font-weight: bold;
        }

        .login:hover {
            background-color: #ffc107;
            color: black;
            font-weight: bold;
        }

        .category-div {
            width: 40%;
            text-align: center;
            margin: 60px auto 170px;
        }

        .category-div h1 {
            font-weight: bold;
            color: black;
            text-shadow: 1px 1px 2px #ffc107;
            margin-bottom: 55px;
        }

        .no-data {
            width: 350px;
            margin: 30px auto;
            text-align: center;
        }

        .cat-btn {
            border: 1px solid #ffc107;
            background-color: black;
            color: white;
            padding: 10px 30px;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
        }

        .cat-btn:hover {
            background-color: #ffc107;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header-w3l">
        <header id="site-header" class="fixed-top">
            <div class="container">
                <nav class="navbar navbar-expand-lg stroke">
                    <a class="navbar-brand" href="userHome.php">
                        Bl<span class="sub-logo">oo</span>d Donation</span>
                    </a>
                   
                    <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mx-lg-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="userHome.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="userBloodBook.php">Add Req</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="searchBlood.php">Search Blood</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="userRequest.php">User Req</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="requestHistory.php">History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="userprofile.php">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Log Out</a>
                            </li>

                        </ul>

                    </div>
                    <div class="mobile-position">
                        <nav class="navigation">
                            <div class="theme-switch-wrapper">
                                <label class="theme-switch" for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    <div class="mode-container">
                                        <i class="gg-sun"></i>
                                        <i class="gg-moon"></i>
                                    </div>
                                </label>
                            </div>
                        </nav>
                    </div>
                 
                </nav>
            </div>
        </header>
    </div>
    
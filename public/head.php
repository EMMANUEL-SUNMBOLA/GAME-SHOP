<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dist/style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="index.php" title="GAME SHOP" style="color: #<?php if($_SERVER["PHP_SELF"] == "/index.php"){echo "f8ce03";}?>;">GAME SHOP</a>
        <ul>
            <li><a href="ff.php" title="FREE FIRE" style="color: #<?php if($_SERVER["PHP_SELF"] == "/ff.php"){echo "f8ce03";}?>;">FREE FIRE</a></li>
            <li><a href="#" title="CODM" style="color: #<?php if($_SERVER["PHP_SELF"] == "/cod.php"){echo "f8ce03";}?>;">CODM</a></li>
            <li><a href="#" title="PUBG" style="color: #<?php if($_SERVER["PHP_SELF"] == "/pubg.php"){echo "f8ce03";}?>;">PUBG</a></li>
        </ul>
    </nav>
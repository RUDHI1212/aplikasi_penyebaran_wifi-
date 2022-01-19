<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CaGOn | SMKN 11 Bandung</title>
    <link href="<?php echo base_url()?>assets/user/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>assets/user/asie/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/user/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/user/jquery/jquery-ui.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url()?>assets/user/asie/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
<header>
        <div class="menu-toggle" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="overlay"></div>
        <div class="container">
            <nav class="navbar navbar-default navbar-custom navbar-fixed-top" style="border-color: #800000; padding: 0; background-color: #800000">
    <div class="container">
        <div class="navbar-header">
        <h1 class="brand"><a href="index.html">CAGON</a></h1>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="#"><img src="<?php echo base_url()?>assets/user/logos.png"></a>-->
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-right">
                <li><a href="<?php echo base_url()?>USER/home">Halaman Awal</a></li>

                <li><a href="<?php echo base_url()?>USER/home/keresek"><i class="glyphicon glyphicon-shopping-cart"></i>  Kantong Kresek</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('name'); ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a>Rp. <?php echo number_format($this->session->userdata('dompet'),0,",",".");?></a></li>
                        <li><a href="<?php echo base_url()?>USER/home/profil">Profil</a></li>
                        <li><a href="<?php echo base_url()?>USER/home/belanja"">Info Pemesanan</a></li>
                        <li><a href="<?php echo base_url() ?>auth/logout">Keluar</a></li>
                    </ul>
                </li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
        </div>
</header>
</head>

<style>
body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url('<?php echo base_url() ?>assets/img/bg_hd.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
       }

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html{
    font-size: 10px;
    font-family: "Nunito", sans-serif;
}

a{
    text-decoration: none;
}

header{
    width: 100%;
    height: 20;
    background: linear-gradient(to bottom, rgba(0,0,0,.8), rgba(1,0,0,.5)), url('<?php echo base_url() ?>assets/img/bglogin.jpg') center no-repeat;
    position: relative;
  overflow: hidden;
}

.container{
    max-width: 120rem;
    width: 90%;
    margin: 0 auto;
}

.menu-toggle{
    position: fixed;
    top: 2.5rem;
    right: 2.5rem;
    color: #eeeeee;
    font-size: 3rem;
    cursor: pointer;
    z-index: 1000;
    display: none;
}

nav a{
    color: #eee;
}

nav{
    padding-top: 5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-transform: uppercase;
}

.brand{
    padding-bottom: 5px;
    font-size: 3rem;
    font-weight: 300;
    transform: translateX(-100rem);
    animation: slideIn .5s forwards;
}

.brand span{
    color: crimson;
}

nav ul{
    display: flex;
}

nav ul li{
    padding-top: 15px;
    list-style: none;
    transform: translateX(100rem);
    animation: slideIn .5s forwards;
}

nav ul li:nth-child(1){
    animation-delay: 0s;
}

nav ul li:nth-child(2){
    animation-delay: .5s;
}

nav ul li:nth-child(3){
    animation-delay: 1s;
}

nav ul li:nth-child(4){
    animation-delay: 1.5s;
}

nav ul li a{
    padding: 1rem 0;
    margin: 0 3rem;
    position: relative;
    letter-spacing: 2px;
}

nav ul li a:last-child{
    margin-right: 0;
}

nav ul li a::before,
nav ul li a::after{
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    background-color: crimson;
    left: 0;
    transform: scaleX(0);
    transition: all .5s;
}

nav ul li a::before{
    top: 0;
    transform-origin: left;
}

nav ul li a::after{
    bottom: 0;
    transform-origin: right;
}

.overlay{
    background-color: rgba(0,0,0,.95);
    position: fixed;
    right: 0;
    left: 0;
    top: 0;
    bottom: 0;
    transition: opacity 650ms;
    transform: scale(0);
    opacity: 0;
  display: none;
}

nav ul li a:hover::before,
nav ul li a:hover::after{
    transform: scaleX(1);
}

@keyframes slideIn {
    from{

    }
    to{
        transform: translateX(0);
    }
}

@media screen and (max-width: 700px){

    .menu-toggle{
        display: block;
    }

    nav{
        padding-top: 0;
        display: none;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

    nav ul{
        flex-direction: column;
    }

    nav ul li{
        margin-top: 5rem;
    }

    nav ul li a{
        margin: 0;
        font-size: 2.5rem;
    }

    .brand{
        font-size: 5rem;
    }
  
  .overlay.menu-open,
  nav.menu-open{
      display: flex;
      transform: scale(1);
      opacity: 1;
  }
}
 /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #990000;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: maroon;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: maroon;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.tabcontent {
  animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
</style>

<body style="background-color: #f4f4f4">

<!-- Fixed navbar -->


<!-- Begin page content -->
<br>
<div class="container">
    <br><br>
    <div class="row">

        <div class="col-lg-3"> 

            <div class="list-group">
                <a href="#" class="list-group-item active" style="text-align: center;background-color: #990000;border-color: #990000">
                List Stand
                </a>
                <a href="<?php echo base_url()?>USER/home/lapak/" class="list-group-item">Semua</a>
                <?php
                foreach ($kategori as $row)
                {
                    ?>
                    <a href="<?php echo base_url()?>USER/home/lapak/<?php echo $row['id_user'];?>" class="list-group-item"><?php echo $row['name'];?></a>
                    <?php
                }
                ?>
            </div><br>

            <div class="list-group">
                <a href="<?php echo base_url()?>USER/home/keresek" class="list-group-item active" style="text-align: center;background-color: #990000;border-color: #990000">
                <i class="glyphicon glyphicon-shopping-cart"></i> Kantong Kresek
                </a>
                <?php

                $cart= $this->cart->contents();

                // If cart is empty, this will show below message.
                if(empty($cart)) {
                    ?>
                    <a class="list-group-item"><i>Keranjang Belanja Kosong..</i></a>
                    <?php
                }
                else
                {
                    $grand_total = 0;
                    foreach ($cart as $item)
                    {
                        $grand_total+=$item['subtotal'];
                        ?>
                        <a class="list-group-item"><?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x <?php echo number_format($item['price'],0,",","."); ?>)=<?php echo number_format($item['subtotal'],0,",","."); ?></a>
                        <?php
                    }
                    ?>

                    <?php
                }
                ?>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div class="row">
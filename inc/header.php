<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if ($section == "index") { echo "Happy Fish is a web design company. We specialize in modern, responsive designs. We've done work for the awesome people of Northwest Arkansas."; } ?><?php if ($section == "about") { echo "Happy Fish designs simple and effective websites. All our designs are responsive, compatible and attractive."; } ?><?php if ($section == "portfolio") { echo "Happy Fish is a brand new web design company and we are currently building up our portfolio. While this is happening, we are offering great deals on websites."; } ?><?php if ($section == "services") { echo "Happy Fish currently offers three different website packages: Basic, Select and Premium. All websites are responsive, compatible and attractive."; } ?><?php if ($section == "contact") { echo "Happy Fish is brand new. We are two people with a passion for coding. Connect with us via email at connect@happyfish.technology."; } ?>">
    <title><?php echo $pageTitle ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/happy_fish_logo_black_favicon.ico" >

    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,700,300' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php include_once("analyticstracking.php") ?>
    <!-- start nav -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="img/happy_fish_logo_white.png" alt="Happy Fish Logo" class="img-responsive"><h2>Happy Fish</h2></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li <?php if ($section == "index") { echo "class=\"active\""; } ?>><a href="index.php">Home</a></li>
            <li <?php if ($section == "about") { echo "class=\"active\""; } ?>><a href="about.php">About</a></li>
            <li <?php if ($section == "portfolio") { echo "class=\"active\""; } ?>><a href="portfolio.php">Portfolio</a></li>
            <li <?php if ($section == "services") { echo "class=\"active\""; } ?>><a href="services.php">Services</a></li>
            <li <?php if ($section == "contact") { echo "class=\"active\""; } ?>><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!-- end nav -->
    <!-- start circles -->
    <div class="circle hidden-xs"></div>
    <div class="circle2 hidden-xs hidden-sm"></div>
    <div class="circle3 hidden-xs"></div>
    <div class="circle4 hidden-xs hidden-sm"></div>
    <div class="circle5 hidden-xs"></div>
    <div class="circle6 hidden-xs"></div>
    <!-- end circles -->
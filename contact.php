<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST ["name"]);
  $email = trim($_POST ["email"]);
  $company = trim($_POST ["company"]);
  $message = trim($_POST ["message"]);

  if($name == "" OR $email == "") {
    header("location: contact.php?status=error");
    exit;
  }

  foreach( $_POST as $value){
    if( stripos($value, 'Content-Type:') !== FALSE ) {
      echo "Sorry, there was a problem processing your form.";
      exit;
    }
  }

  if ( preg_match( "/[\r\n]/", $name ) || preg_match( "/[\r\n]/", $email ) ) {
    echo "Sorry, there was a problem processing your form.";
    exit;
  }

  if (eregi("(\r|\n)", $email)) {
     echo "Sorry, there was a problem processing your form.";
     exit;
   }

  if ($POST["address" != ""]) {
    echo "Sorry, there was a problem processing your form.";
    exit;

  }

  require_once("inc/phpmailer/class.phpmailer.php");
  $mail = new PHPMailer();


  if (!$mail->ValidateAddress($email)) {
    header("location: contact.php?status=error");
    exit;
  }


  $emailBody = "";
  $emailBody = $emailBody . "NAME: " . $name . "<br>"; 
  $emailBody = $emailBody . "EMAIL: " . $email . "<br>";
  $emailBody = $emailBody . "COMPANY: " . $company . "<br>"; 
  $emailBody = $emailBody . "MESSAGE: " . $message;
  $from = "connect@happyfish.technology";

  $mail->SetFrom($from, $name);
  $address = "connect@happyfish.technology";
  $mail->AddAddress($address, "Happy Fish");
  $mail->Subject = "Contact Form Submission | " . $name;
  $mail->MsgHTML($emailBody);

  if(!$mail->Send()) {
    echo "There was a problem sending the email." . $mail->ErrorInfo;
    exit;
  }

  header("location: contact.php?status=thanks");
  exit;
}
?>

<?php
$pageTitle = "Happy Fish | Contact Information";
$section = "contact";
include('inc/header.php');
?>
      <?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
        <div class="hero">
          <div class="container thanks">
            <div class="row">
              <div class="col-xs-12 text-center">
                <h1>Thanks for contacting us. We'll get back to you soon.</h1>
              </div>
              <div class="col-sm-12">
                <a href="index.php"><button type="button" class="btn btn-default center-block">Home</button></a>
              </div>
            </div>
          </div>
        </div>
      <?php } elseif (isset($_GET["status"]) AND $_GET["status"] == "error") { ?>
        <div class="hero">
          <div class="container thanks">
            <div class="row">
              <div class="col-xs-12 text-center">
                <h1>Sorry, the required fields weren't filled out correctly.</h1>
              </div>
              <div class="col-sm-12">
                <a href="contact.php#contact"><button type="button" class="btn btn-default center-block">Go Back</button></a>
              </div>
            </div>
          </div>
        </div>
      <?php } else { ?>
    <!-- start hero -->
    <div class="hero">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center">
            <img src="img/happy_fish_logo_white.png" alt="Happy Fish Logo" class="img-responsive center-block">
            <h1>Let's talk.</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- end hero -->
    <!-- start emailus -->
    <div class="emailus" id="contact">
      <div class="container forms">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h1>Email us.</h1>
          </div>
          <div class="col-sm-12 text-center">
            <p>Happy Fish is brand new. We have a passion for coding. Email us here or at <a href="mailto:connect@happyfish.technology">connect@happyfish.technology</a> and we'll get back to you as soon as possible.</p>
          </div>
          <form method="post" action="contact.php" class="form-horizontal col-sm-10">
            <div class="form-group">
              <label class="control-label col-sm-5" for="name">Name *</label>
              <div class="col-sm-4"><input class="form-control form" type="text" name="name" id="name"></div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5" for="email">Email *</label>
              <div class="col-sm-4"><input class="form-control form" type="text" name="email" id="email"></div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5" for="company">Company/Organization</label>
              <div class="col-sm-4"><input class="form-control form" type="text" name="company" id="company"></div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5" for="message">Message</label>
              <div class="col-sm-5"><textarea class="form-control form" name="message" id="message"></textarea></div>
            </div>
          <!-- Hide with CSS -->
            <div class="form-group" style="display: none;">
              <label class="control-label col-sm-2" for="address">Address</label>
              <div class="col-sm-5"><textarea class="form-control" name="address" id="address"></textarea></div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-5"></label>
              <div class="col-sm-6"><input class ="btn btn-default" type="submit" value="send"></div>
              <div class="col-sm-4 pull-right">*Required Field</div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end emailus -->
    <?php } ?>
<?php include('inc/footer_contact.php'); ?>
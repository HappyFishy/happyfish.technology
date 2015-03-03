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

  if ($POST["address" != ""]) {
    echo "Sorry, there was a problem processing your form.";
    exit;

  }

  require_once("inc/phpmailer/class.phpmailer.php");
  $mail = new PHPMailer();


  if (!$mail->ValidateAddress($email)) {
    echo "No valid email address speicified.";
    //add to error
    exit;
  }


  $emailBody = "";
  $emailBody = $emailBody . "NAME: " . $name . "<br>"; 
  $emailBody = $emailBody . "EMAIL: " . $email . "<br>";
  $emailBody = $emailBody . "COMPANY: " . $company . "<br>"; 
  $emailBody = $emailBody . "MESSAGE: " . $message;

  // $mail->SMTPDebug = 1;
  // $mail->IsSMTP();
  // $mail->SMTPAuth = true;
  // $mail->Host = "smtp.postmarkapp.com";
  // $mail->Port = 25;
  // $mail->Username = "f3fef0ef-70ad-4510-a28e-4d2340df2ad1";
  // $mail->Password = "f3fef0ef-70ad-4510-a28e-4d2340df2ad1";
  $mail->SetFrom($email, $name);
  $address = "happyfishtechnology@gmail.com";
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

        <p>Thanks for contacting us. We'll get back to you soon.</p>

        <p><a href="contact.php">Go Back</a></p>

      <?php } elseif (isset($_GET["status"]) AND $_GET["status"] == "error") { ?>

        <p>Sorry, the required fields weren't filled out correctly.</p>

        <p><a href="contact.php">Go Back</a></p>

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
    <div class="emailus">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h1>Email us.</h1>
          </div>
          <div class="col-md-5">
            <p>Happy Fish is brand new. We have a passion for coding. Email us and we'll get back to you as soon as possible.</p>
          </div>
          <form method="post" action="contact.php" class="form-horizontal col-sm-10">
                <div class="form-group">
                  <label class="control-label col-sm-5" for="name">Name*</label>
                  <div class="col-sm-4"><input class="form-control" type="text" name="name" id="name"></div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-5" for="email">Email*</label>
                  <div class="col-sm-4"><input class="form-control" type="text" name="email" id="email"></div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-5" for="company">Company/Organization</label>
                  <div class="col-sm-4"><input class="form-control" type="text" name="company" id="company"></textarea></div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-5" for="message">Message</label>
                  <div class="col-sm-5"><textarea class="form-control" name="message" id="message"></textarea></div>
                </div>
              <!-- Hide with CSS -->
                <div class="form-group" style="display: none;">
                  <label class="control-label col-sm-2" for="address">Address</label>
                  <div class="col-sm-5"><textarea class="form-control" name="message" id="address"></textarea></div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-5"></label>
                  <div class="col-sm-6"><input class ="btn btn-default" type="submit" value="send"></div>
                </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end emailus -->
    <?php } ?>
<?php include('inc/footer.php'); ?>
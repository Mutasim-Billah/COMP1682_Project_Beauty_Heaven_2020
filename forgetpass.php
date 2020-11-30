<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'vendor/email.php';
include 'parts/header.php';
?>

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Forget Password</h1>
            </div>
          </div>

          <div class="col-md-5 mt-5 card" style="padding: 40px 20px; text-align: center;margin: 0 auto;    background: #458dec30;">
           
            <form action="" method="POST">
            <input class="form-control" type="email" name="email" required placeholder="Your Account Mail">
            <input class="btn btn-info mt-3" type="submit" name="reset" value="Send">
            </form>
           
         </div> 
         
        </div>
      </div>
    </div>




































  <?php include 'parts/footer.php' ?>

<?php
if(isset($_POST['reset'])){
$reset = $ot-> checkMail($_POST);
if($reset){
    $cmail = $_POST['email'];
    $pass = rand(1000,9999);
    $insert= $ot->insertPass($cmail,$pass);
    if($insert){
   
   
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug =2; //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = EMAIL;                     // SMTP username
    $mail->Password   = PASS;                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('No-reply@beautyheaven.com', 'Beauty Heaven');
    $mail->addAddress($cmail);     // Add a recipient
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'Hi, Here is your temporary Password <b>'.$pass.'</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script>alert('Check Your Email');</script>";
    echo "<script>window.location.replace('login.php')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
 }
}
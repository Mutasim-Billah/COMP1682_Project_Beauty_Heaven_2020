<?php include 'partials/header.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './../vendor/autoload.php';
require './../vendor/email.php';

?>
        <!-- partial -->
        <?php Session::checkAdminOnly(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
          
    

           <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Staff Registration</h4>
                    <p class="card-description">Staff registration form</p>

                    <p>
                             <?php
             if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg'])){
              $name=$_POST['name'];
              $email = $_POST['email'];
              $pass = $_POST['pass'];
                $staffReg = $stf->staffRegistration($_POST);
                if(isset($staffReg)){
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
    $mail->addAddress($email);     // Add a recipient
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Staff Registration';
    $mail->Body    = 'Hi '.$name.', <br> Congratulation your now Staff of Beauty Heaven, Here is your temporary Password <b>'.$pass.'</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script>window.location.replace('viewstaff.php')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



                }
             }
           ?>
                    </p>
                    <form method="POST" action="" class="forms-sample"  enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="0123456789">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">National ID No.</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="nid" placeholder="10203993933939">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Pofile Pictures</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" name="profile">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" name="pass2" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                      </div>
                     
                      <button type="submit" name="reg" class="btn btn-primary mr-2">Registration</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            
       
          
            
       
           
            </div>
          
         
    
          </div>
          <!-- content-wrapper ends -->
         
         <?php include 'partials/footer.php'; ?>
<?php include 'parts/header.php'; ?>
<?php

if(!Session::get('cmrId')){
  echo "<script>window.location.replace('login.php')</script>";
}?>

    <div class="featured-page">
      <div class="container">
        <div class="row">
             <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Profile</h1>
                        <br><br>
            </div>
          </div>
<div class="col-md-12">
  
<?php
 $id = Session::get('cmrId');
if(isset($_POST['update'])){
 
  $updaet = $cmr->updateCustomer($_POST,$id);
  if($updaet){
    echo $updaet;
  }
}

$viewUser = $cmr->viewCustomersForProfile($id);
$row = $viewUser->fetch_assoc();
 ?>
  
</div>
          <div class="col-md-5 card">
           <table class="table">
              <thead>
                <form action="" method="POST">
                <tr>
                  <th scope="col">Name:</th>
                  <td><input type="text" name="name" value="<?php echo $row['username']; ?>"></td>
                </tr>
                <tr>
                  <th scope="col">Email:</th>
                  <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                </tr>
                <tr>
                  <th scope="col">Phone:</th>
                  <td><input type="number" name="phone" value="<?php echo $row['phone']; ?>"></td>
                </tr>
                <tr>
                  <th scope="col">Address:</th>
                  <td><input type="text" name="address" value="<?php echo $row['address']; ?> "></td>
                </tr>
                <tr>
                  <th></th>
                  <td><input type="submit" name="update" value="Update"></td>
                </tr>
                </form>
              </thead>
            </table>
         </div> 
        
        </div>
      </div>
    </div>


 
<?php include 'parts/footer.php'; ?>
<?php
error_reporting(0);
include('../includes/connection.php');
if (isset($_POST['update']))
{
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $profession = $_POST['profession'];
  $un = $_SESSION['userName'];

  $sql = "UPDATE  users SET fullname = '$name',
                             gender  = '$gender',
                             phone  =  '$phone' ,
                             email =  '$email',
                             profession = '$profession' where userName ='$un' ";
  $res = mysqli_query($con,$sql);

  if ($res)
  {
    $_SESSION['successMessage'] = 'User Updated! User Can Login';
    header('Location:addUsers.php');
  }
  else
  {
    $_SESSION['errorMessage'] = mysqli_error($con);
      header('Location:addUsers.php');
  }

}



 ?>



<div class="">
<?php
$un = $_SESSION['userName'];

$select = "SELECT * FROM users where userName='".$un."'    ";
$results = mysqli_query($con,$select);
$fetch = mysqli_fetch_assoc($results);


 ?>

 <?php
if(isset($_SESSION['errorMessage'])){
include ("../includes/displayErrorMessage.php");
unset($_SESSION['errorMessage']);

}

// success message
if(isset($_SESSION['successMessage'])){
 include ("../includes/displaySuccessMessage.php");
unset($_SESSION['successMessage']);
}?>

<center>Editing Personal Profile</center>
</div>
<hr>
<form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">

    <div class="modal-body">
      <!-- the form content goes here -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="name">Full Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" value="<?php echo $fetch['fullname']; ?>" name="name" placeholder="Enter material Name">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="gender">Gender:</label>
              <div class="col-sm-9">
                 <select name="gender" value="<?php echo $fetch['gender']; ?>" id="gender" class="form-control">

                   <option value="">~~Select Gender ~~</option>
                   <option value="f">Female</option>
                   <option value="m">Male</option>

                 </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="phone">Phone:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?php echo $fetch['phone']; ?>" id="phone" name="phone" placeholder="Enter material Name">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Email:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?php echo $fetch['email']; ?>" id="email" name="email" placeholder="Enter material Name">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="profession">Profession:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?php echo $fetch['profession']; ?>" id="profession" name="profession" placeholder="Enter material Name">
              </div>
            </div>

    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success" id="addMaterialBtn" name="update" data-loading-text="Loading.." >
      <span class="glyphicon glyphicon-plus-sign"></span>Update Profile</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

</form>

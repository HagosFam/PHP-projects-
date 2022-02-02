<?php error_reporting(0);

if(isset($_GET['id'])){

   $sql = "DELETE FROM users WHERE id ='".$_GET['id']."'";
   $result = mysqli_query($con,$sql);
   
   if($result){
	   $_SESSION['successMessage'] = "User successfully removed";
	    header('Location:manageerrrrrrrDrug.php');
   }else{
	   
	   $_SESSION['errorMessage'] =mysqli_error($con);
	  header('Location:managefDfgsrug.php');
   
   }

}


?>

<?php
if (isset($_POST['addUser']))
{
$name = $_POST['name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$profession = $_POST['profession'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "INSERT INTO users(fullname,gender,phone,email,profession,username,password,role)
 values('$name','$gender','$phone','$email','$profession','$username','$password','$role')";
$res = mysqli_query($con,$sql);

if ($res)
{
  $_SESSION['successMessage'] = 'User Created! User Can Login';
  header('Location:addUsers.php');
}
else
{
  $_SESSION['errorMessage'] = mysqli_error($con);
    header('Location:addUsers.php');
}

}
else
 {
//  $_SESSION['errorMessage'] = 'Please Login First';
  header('Location:addUsers.php');
}

 ?>


<div class="row">
<div id="satus">
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

        </div>

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5 class="text-success"><span class="glyphicon glyphicon-pencil"></span>Manage Users</h5></div>
<div class="panel-body">

<div class="remove-messages"></div>

<div class="div-action pul pull-right">

<button class="btn btn-info" data-toggle="modal" data-target="#addMaterialodal">
    <span class="glyphicon glyphicon-plus-sign"></span>Add New User
</button>

</div> <!-- end of div-action -->
<h4 class="text-info"><center>List of Users</center></h4>
<hr style="border:groove 1px #79D57E;"/>

<br/>



<table class="table" id="manageMaterialTable">

   <thead>

    <tr>

       <th>NO</th>
       <th>Name</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Profession</th>
       <th>Role</th>
       <th style="width:15%;">Options</th>
     <th></th>
    </tr>

   </thead>

   <tbody>
 <?php

      $sql = "SELECT * FROM users";
      $result = mysqli_query($con,$sql);
      $counter =0;
 while($material = mysqli_fetch_assoc($result)){

  ?>

      <tr>

     <td><?php echo ++$counter;?></td>
     <td><?php echo $material['fullname'];?></td>
      <td><?php echo $material['phone'];?></td>
       <td><?php echo $material['email'];?></td>
        <td><?php echo $material['profession'];?></td>
         <td><?php echo $material['role'];?></td>

     <td>
 <a href="<?php echo'index.php?page=editUsers&id='.$material['id'];?>" style="text-decoration:none;"><button class="btn btn-info ">Edit </button></a>

       </td>

      <td>
  <a href="<?php echo'index.php?page=addUsers&id='.$material['id'];?>" style="text-decoration:none;"><button class="btn btn-danger ">Delete </button></a>
	   
	   </td>

      </tr>
    <?php }?>
    </tbody>

</table>


</div>  <!--  end panel body -->

</div> <!--  end panel default-->

</div>  <!-- end  col-md-12-->

</div> <!-- end row -->


<div id="addMaterialodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>Add New User</h4>
      </div>

      <form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="name">Full Name:</label>
                    <div class="col-sm-9">
                      <input type="text" required class="form-control" id="name" name="name" placeholder="Enter user full Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="gender">Gender:</label>
                    <div class="col-sm-9">
                       <select name="gender" required id="gender" class="form-control">

                         <option value="">~~Select Gender ~~</option>
                         <option value="f">Female</option>
                         <option value="m">Male</option>

                       </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="phone">Phone:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="phone" name="phone" placeholder="Enter phone number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="email" name="email" placeholder="Enter Email Address">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="profession">Profession:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="profession" name="profession" placeholder="Enter your profession">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="username">Username:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required name="username"  id="username"
                       placeholder="Enter material Quantity">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Password:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required  name="password" value="12345" readonly  id="password"
                       placeholder="Enter material Quantity">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="role">Role:</label>
                    <div class="col-sm-9">
                       <select name="role" required id="role" class="form-control">

                         <option value="">~~Select role ~~</option>
                         <option value="admin">Administrator</option>
                         <option value="pharmacist">Pharmacist</option>
                         <option value="dephead">Head Department</option>
                       </select>
                    </div>
                  </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="addMaterialBtn" name="addUser" data-loading-text="Loading.." >
            <span class="glyphicon glyphicon-plus-sign"></span>Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </form>
    </div>  <!-- end modal content -->

  </div> <!-- end dialog -->
</div>  <!-- end modal-->

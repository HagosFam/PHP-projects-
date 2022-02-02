<?php error_reporting(0);

if (isset($_POST['sendnotification']))
{
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$subject = $_POST['subject'];
$body = $_POST['body'];

$sql = "INSERT INTO notifications (sender,receiver,subject,body)
                        values('$sender','$receiver','$subject','$body')";
$res = mysqli_query($con,$sql);

if ($res)
{
  $_SESSION['successMessage'] = 'Notification Sent! ';
  header('Location:addDepartment.php');
}
else
 {
  $_SESSION['errorMessage'] = mysqli_error($con);
    header('Location:addDepartment.php');
}
}

?>

<div class="row">
<div id="status">
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
<div class="panel-heading"><h5 class="text-success"><span class="glyphicon glyphicon-pencil"></span>
  Manage Notifications</h5></div>
<div class="panel-body">

<div class="remove-messages"></div>

<div class="div-action pul pull-right">

<button class="btn btn-info" data-toggle="modal" data-target="#addMaterialodal">
    <span class="glyphicon glyphicon-plus-sign"></span>Send Notifications
</button>

</div> <!-- end of div-action -->
<h4 class="text-success"><center>List of Notifications</center></h4>
<hr style="border:groove 1px #79D57E;"/>

<br/>

<table class="table" id="manageMaterialTable">

   <thead>

    <tr>

       <th>NO</th>
       <th>Receiver</th>
       <th>Subject</th>
       <th>Body</th>

     <th></th>
    </tr>

   </thead>

   <tbody>
 <?php

      $username = $_SESSION['userName'];
      $sql = "SELECT * FROM notifications where receiver = '$username'   ";
      $result = mysqli_query($con,$sql);
      $counter =0;
 while($material = mysqli_fetch_assoc($result)){

  ?>

      <tr>
     <td><?php echo ++$counter;?></td>
     <td><?php echo $material['receiver'];?></td>
      <td><?php echo $material['subject'];?></td>
      <td><?php echo $material['body'];?></td>

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
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>Send New Notifications</h4>
      </div>

      <form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->

            <?php

              $sql = "SELECT * from users";
              $result = mysqli_query($con,$sql);
              ?>
<?php   $un =  $_SESSION['userName']; ?>

              <div class="form-group">
                <label class="control-label col-sm-3" for="sender">Sender:</label>
                <div class="col-sm-9">
                  <input type="text" required class="form-control"  readonly value="<?php echo $un; ?>" id="sender" name="sender" placeholder="Enter material Name">
                </div>
              </div>


            <div class="form-group">
              <label class="control-label col-sm-3" for="receiver">Receiver:</label>
              <div class="col-sm-9">
                <select class="form-control" required name="receiver" id="receiver">
                  <option>~To Whome is the Notification?~</option>
                     <?php  while($place = mysqli_fetch_assoc($result)){ ?>

                         <option value="<?php echo $place['id'];?>"><?php echo $place['fullname'];?></option>

                   <?php } ?>

                </select>
                    </div>
            </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="subject">Subject:</label>
                    <div class="col-sm-9">
                      <input type="text" required class="form-control" id="subject" name="subject" placeholder="Enter material Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="body">Body:</label>
                    <div class="col-sm-9">
<textarea name="body" id="body" rows="8" required cols="55"></textarea>
                    </div>
                  </div>



          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="addMaterialBtn" name="sendnotification" data-loading-text="Loading.." >
            <span class="glyphicon glyphicon-plus-sign"></span>Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </form>
    </div>  <!-- end modal content -->

  </div> <!-- end dialog -->
</div>  <!-- end modal-->

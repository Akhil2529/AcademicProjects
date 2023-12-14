<?php  
   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $borrower = new Borrower();
  $res = $borrower->single_borrower($id)

?> 


 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Change New Password</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">  

 <form class="form-horizontal span6" action="controller.php?action=changepassword" method="POST" onsubmit="return validateRetypePassword()">

 
                 <input class="form-control input-sm" id="BorrowerId" name="BorrowerId" placeholder=
                    "Account Id" type="Hidden" value="<?php echo $res->BorrowerId; ?>">
     
                  <div class="form-group">
                    <div class="col-md-8 row">
                      <label class="col-md-2 control-label" for=
                      "user_name">Name:</label>

                      <div class="col-md-8">

                        <?php echo $res->Firstname . ' ' .  $res->MiddleName . ' ' . $res->Lastname; ?>
                        
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8 row">
                      <label class="col-md-2 control-label" for=
                      "user_email">Username:</label>

                      <div class="col-md-8">
                         <?php echo $res->BUsername; ?>
                      </div>
                    </div>
                  </div>
                  <hr/>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "user_pass">New Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="user_pass" name="user_pass" placeholder=
                            "Account Password" type="Password" value="" placeholder="Enter new password......">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "user_pass">Retype Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="retype_user_pass" name="retype_user_pass" placeholder=
                            "Retype Password" type="Password" value="">
                      </div>
                    </div>
                  </div> 
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                         <button class="btn btn-primary" id="usersave" name="save" type="submit" ><i class="fa fa-save"></i> Save</button> 
                      </div>
                    </div>
                  </div>

              
 
        </form>
      
 </div>
</div>
</div>

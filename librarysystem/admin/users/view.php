<?php  
  if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
 }
 
$USERID = isset($_GET['id']) ? $_GET['id'] : '';

if($USERID==''){
   redirect("index.php");
}


  $user = New User();
  $singleuser = $user->single_user($USERID);

 
  ?>
<div class="container">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-lg-6">
         <a  data-target="#myModal" data-toggle="modal" href=""  >
            <img alt="click here to change image" style="width: 100%"
             title="" class="img-circle img-thumbnail isTooltip" src="<?php echo web_root.'admin/dist/'. $singleuser->PicLoc;?>"  > 
         </a>  
        </div>
        <div class="col-lg-6">
            <h1><strong>User Profile</strong></h1><br> 
                        
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_NAME">Name:</label>

                      <div class="col-md-8">
                         <input id="USERID" name="USERID" type="Hidden" value="<?php echo $singleuser->USERID; ?>"> 
                         <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder=
                            "Account Name" type="text" value="<?php echo $singleuser->NAME; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_USERNAME">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder=
                            "Email Address" type="text" value="<?php echo $singleuser->UEMAIL; ?>" readonly>
                      </div>
                    </div>
                  </div>  
        </div>
    </div>
</div>
</div>
            

     <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                </div>

                <form action="controller.php?action=photos" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="rows">
                        <div class="col-md-12">
                          <div class="rows">
                            <div class="col-md-8">
                            <input class="mealid" type="hidden" name="user_id" id="user_id" value="<?php echo $USERID ?>">
                              <input name="MAX_FILE_SIZE" type=
                              "hidden" value="1000000"> <input id=
                              "photo" name="photo" type=
                              "file">
                            </div>

                            <div class="col-md-4"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Close</button> <button class="btn btn-primary"
                    name="savephoto" type="submit">Upload Photo</button>
                  </div>
                </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

 
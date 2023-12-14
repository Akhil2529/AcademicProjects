<?php 
 if (!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
   }

  $autonumber = New Autonumber();
  $auto = $autonumber->set_autonumber("BorrowerID"); 
 ?> 

 <style type="text/css">
   .stretch img {
      width: 100%;
   }
 </style>
 
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Add New Borrower</h6>
  </div>
  <div class="card-body"> 
   <!-- // SELECT `IDNO`, `BorrowerId`, `Firstname`, `Lastname`, `MiddleName`, `Address`, `Sex`, `ContactNo`, `CourseYear`, `BorrowerPhoto`, `BorrowerType`, `Stats`, `IMGBLOB` FROM `tblborrower` WHERE 1 -->
        <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
            <div class="row">
              <label class="col-md-2 control-label" for=
              "BorrowerId">Borrower ID</label>

              <div class="col-md-8"> 
                  <input class="form-control input-sm" id="BorrowerId" name="BorrowerId" placeholder=
                    "Employee No" type="text" value="<?php echo DATE('Y').$auto->AUTO; ?>" readonly>  
           </div>
            </div>
          </div>           
           <div class="form-group">
            <div class="row">
              <label class="col-md-2 control-label" for=
              "Firstname">Firstname:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="Firstname" name="Firstname" placeholder=
                    "Firstname" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-md-2 control-label" for=
              "Lastname">Lastname:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                <input  class="form-control input-sm" id="Lastname" name="Lastname" placeholder=
                    "Lastname"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-md-2 control-label" for=
              "MiddleName">Middle Name:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                <input  class="form-control input-sm" id="MiddleName" name="MiddleName" placeholder=
                    "Middle Name"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                 <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                    "Description" type="text" value=""> -->
              </div>
            </div>
          </div> 

         <div class="form-group">
          <div class="row">
            <label class="col-md-2 control-label" for=
            "Address">Address:</label>

            <div class="col-md-8">
              
               <textarea class="form-control input-sm" id="Address" name="Address" placeholder=
                  "Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
            </div>
          </div>
        </div> 

        <div class="form-group">
          <div class="row">
            <label class="col-md-2 control-label" for=
            "Gender">Sex:</label>

            <div class="col-md-8 row">
               <div class="col-lg-5">
                  <div class="radio">
                    <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="radio">
                    <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Male</label>
                  </div>
                </div> 
               
            </div>
          </div>
        </div>

             

           <div class="form-group">
            <div class="row">
              <label class="col-md-2 control-label" for=
              "ContactNo">Contact No.:</label>

              <div class="col-md-8">
                
                 <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                    "Contact No." type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
              </div>
            </div>
          </div> 

            

          <div class="form-group">
            <div class="row">
              <label class="col-md-2 control-label" for=
              "CourseYear">Course & Year:</label>

              <div class="col-md-8">
               <!--  <select class="form-control input-sm" name="CourseYear" id="CourseYear">
                    <option value="none" >Select</option> 
                </select>  -->
                <input class="form-control input-sm" id="CourseYear" name="CourseYear" placeholder=
                    "BSIT-1" type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
              </div>
            </div>
          </div> 


            <div class="form-group">
            <div class="row">
              <label class="col-md-2 control-label" for=
              "BUsername">Username:</label>

              <div class="col-md-8">
                
                 <input class="form-control input-sm" id="BUsername" name="BUsername" placeholder=
                    "Username" type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
              </div>
            </div>
          </div> 

            

          <div class="form-group">
            <div class="row">
              <label class="col-md-2 control-label" for=
              "BPassword">Password</label>

              <div class="col-md-8">
               <!--  <select class="form-control input-sm" name="CourseYear" id="CourseYear">
                    <option value="none" >Select</option> 
                </select>  -->
                <input class="form-control input-sm" id="BPassword" name="BPassword" placeholder=
                    "Password" type="Password"  value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
              </div>
            </div>
          </div> 




          
            </div>
              <div class="col-md-4 strecth">         
                      
                     <img id="blah" title="profile image" class="img-hover"    src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSav3zdXwA34mCyHltp_lcBPItUcrFa1RXKeNo53LApKqYmpyPh&usqp=CAU" width="300px" height="200px"> 
                      
                    <input type="file" name="picture"  id="imgInp" /> 
            </div>

          </div>

           
          <div class="form-group">
            <div class="row"> 
              <div class="col-md-8">
               <button class="btn btn-primary btn-md" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button>  
               </div>
            </div>
          </div> 

        </form>

       
                 
    </div><!--/.row-->  
</div><!--/.container--> 
 
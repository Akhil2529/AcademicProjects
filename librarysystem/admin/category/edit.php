<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }


  $categoryid = $_GET['id'];
  $category = New Category();
  $singlecategory = $category->single_category($categoryid);

?> 
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Modify Categpry</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">  
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST" autocomplete="off">
 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="CATEGORY">Category:</label>

                      <div class="col-md-8">
                       <input  id="CATEGORYID" name="CATEGORYID"   type="HIDDEN" value="<?php echo $singlecategory->CategoryId; ?>">
                         <input class="form-control input-sm" id="CATEGORY" name="CATEGORY" placeholder=
                            "Category" type="text" value="<?php echo $singlecategory->Category; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DDecimal">Dewey Decimal:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="DDecimal" name="DDecimal" placeholder=
                            "Dewey Decimal" type="text" value="<?php echo $singlecategory->DDecimal; ?>">
                      </div>
                    </div>
                  </div>


            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <!-- <a href="index.php" class="btn btn_fixnmix"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                      <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                   
                      </div>
                    </div>
                  </div>

    </form>
  </div>
</div>
</div>
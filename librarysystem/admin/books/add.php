
 
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add New Book</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">


<form class="form-horizontal well span4" action="controller.php?action=add" method="POST" autocomplete="off">
 <div class="col-md-12"> 
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="IBSN">IBSN</label><input class="form-control " id="IBSN" name="IBSN" type="text" placeholder="Enter IBSN" /></div>
        </div> 
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="BookTitle">Title</label><input class="form-control " id="BookTitle" name="BookTitle" type="text" placeholder="Enter Title" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="BookDesc">Description</label><input class="form-control " id="BookDesc" name="BookDesc" type="text" placeholder="Enter Description" /></div>
        </div>
    </div>  
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="Author">Author</label><input class="form-control " id="Author" name="Author" type="text" placeholder="Enter Author" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Published Date</label>
             <div class='input-group date'>
                    <input type='text' class="form-control" name="PublishDate" id="datepicker" placeholder="Select Date" readonly="false" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
          </div>
        </div>
    </div>  
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="BookPublisher">Publisher</label><input class="form-control " id="BookPublisher" name="BookPublisher" type="text" placeholder="Enter Publisher" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="Category">Category</label>
                 <select class="form-control " name="Category" id="Category">
                      <?php
                      $categ = new Category();
                      $cur = $categ->listofcategory(); 
                      foreach ($cur as $category) {
                        echo '<option>'.$category->Category.' </option>';
                      }

                   ?>
              
            </select> 
          </div>
        </div>
    </div> 
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="DDecimal">Dewey Decimal</label><input class="form-control " id="DDecimal" name="DDecimal" type="text" placeholder="Enter Dewey Decimal" readonly="true" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Type</label> 
             <select class="form-control input-sm" name="BookType" id="BookType">
              <option>Fiction</option>
              <option>Non-Fiction</option>  
              <option>Unknown</option>  
          </select> </div>
        </div>
    </div>   
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="BookPrice">Price</label><input class="form-control " id="BookPrice" name="BookPrice" type="text" placeholder="Enter Price" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="Remarks">Remarks</label><input class="form-control " id="Remarks" name="Remarks" type="text" aria-describedby="emailHelp" placeholder="Enter Remarks" /></div>
        </div>   
    </div>   
</div>

       <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "idno"></label>

                <div class="col-md-8">
                  <button class="btn btn-primary" name="savecourse" type="submit" ><span class="fa fa-save"></span> Save</button>
               <!--   <button class="btn btn-primary" name="saveandnewcourse" type="submit" ><span class="fa fa-save"></span> Save and Add new</button> -->
                </div>
              </div>
            </div>

         
            
  </form> 

</div>
</div>
</div>
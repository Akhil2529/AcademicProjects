<?php

$id = $_GET['id'];
$book = new Book();
$object = $book->single_books($id);

?>

<div class="card shadow mb-4">
      <div class="card-header py-3"> 
        <div class="row">
           <div class="col-md-8"><h6 class="m-0 font-weight-bold text-primary">Borrow Book</h6></div>
             <div class="col-md-4">

               <form action="index.php?view=add&id=<?php echo $id;?>" method="POST">
               <div class="row"> 
                 <div class="col-md-3">
                   <label>Borrower</label>
                 </div>
                 <div class="col-md-6">
                   <select class="form-control select2" id="SearchBorrowerId" name="SearchBorrowerId">
                     <option></option>
                     <?php
                      $borrower = new Borrower();
                      $cur = $borrower->listOfborrower();
                      foreach ($cur as $borrower) {
                        echo '<option value='.$borrower->BorrowerId.'>'.$borrower->Firstname.' '.$borrower->Lastname.'</option>';
                      }
                     ?>
                   </select>
                 </div>
                 <div class="col-md-3">
                   <button type="submit" class="btn btn-primary btn-sm " name="btnfindborrower"><i class="fa fa-search"></i>Find</button>
                 </div>  
               </div>
             </form>
            </div>
            
               
        </div>
      </div>
    <div class="card-body"> 

        <style type="text/css">
          .small {
            /*font-weight: bold; */

          }
          p{
            font-weight: bolder; 
          }
          .book-details{
            padding: 5px;
            font-size: 15px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
          }
        </style>
        <form class="form-horizontal well span4" action="controller.php?action=add" method="POST" autocomplete="off">
<!-- SELECT `BookID`, `IBSN`, `BookTitle`, `BookDesc`, `Author`, `PublishDate`, `BookPublisher`, `Category`, `BookPrice`, `BookQuantity`, `Status`, `BookType`, `DeweyDecimal`, `OverAllQty`, `Donate`, `Remarks` FROM `tblbooks` WHERE 1 -->
          <div class="row">
            <div class="col-md-6">  
                  <div class="book-details">Book Details</div> 
                <div class="form-row">
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="IBSN">IBSN</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->IBSN ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="BookTitle">Title</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->BookTitle ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="BookDesc">Description</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->BookDesc ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="Category">Category</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->Category ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="DeweyDecimal">Dewey Decimal</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->DeweyDecimal ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="BookType">Type</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->BookType ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="BookPrice">Price</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->BookPrice ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="Author">Author</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->Author ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="BookPublisher">Publisher</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->BookPublisher ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="PublishDate">Date Published</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  $object->PublishDate ?></p> 
                    </div>
                </div> 
            </div> 
            <!-- borrowers side -->
            <div class="col-md-6">
              <?php
              // SELECT `IDNO`, `BorrowerId`, `Firstname`, `Lastname`, `MiddleName`, `Address`, `Sex`, `ContactNo`, `CourseYear`, `BorrowerPhoto`, `BorrowerType`, `Stats`, `BUsername`, `BPassword` FROM `tblborrower` WHERE 1 
              if (isset($_POST['btnfindborrower'])) {
                  @$borrower = new Borrower();
                  @$res = $borrower->single_borrower($_POST['SearchBorrowerId']) ;
              }
              ?>
              <div class="book-details">Borrower Information</div> 
                <div class="form-row">
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="BorrowerId">Borrower ID</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  isset($res->BorrowerId) ? $res->BorrowerId: 'None'; ?></p> 
                          <input type="hidden" name="BorrowerId" value="<?php echo isset($res->BorrowerId) ? $res->BorrowerId: 'None'; ?>">
                          <input type="hidden" name="IBSN" value="<?php echo $id;?>">
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="Firstname">First Name</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  isset($res->Firstname) ? $res->Firstname: 'None'; ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="MiddleName">Middle Name</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  isset($res->MiddleName) ? $res->MiddleName : 'None'; ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="Lastname">Last Name</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  isset($res->Lastname) ? $res->Lastname: 'None'; ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="Address">Address</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  isset($res->Address) ? $res->Address: 'None'; ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="Sex">Sex</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  isset($res->Sex) ? $res->Sex : 'None'; ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="ContactNo">Contact Number</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  isset($res->ContactNo) ? $res->ContactNo : 'None'; ?></p> 
                    </div>
                    <div class="col-md-3"> 
                          <label class="small mb-1" for="CourseYear">Course/Year</label>  
                     </div> 
                    <div class="col-md-9"> 
                          <p><?php echo  isset($res->CourseYear) ?$res->CourseYear : 'None'; ?></p> 
                    </div> 
                </div> 
            </div>
          </div>     

          <hr/>
                        <?php    if (isset($res->BorrowerId)) { ?>
                           <button class="btn btn-primary" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button> 
                         <?php } ?>
                         <a href="index.php?view=add&id=<?php echo $id;?>" class="btn btn-info"><i class="fa fa-refresh"></i> Refresh</a>
                        <a href="index.php?view=filter" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back to Borrow a Book</a>
                     
 
          </form> 
 
    </div>
</div>
<?php

$id = $_GET['id'];
 
@$transaction = new Transaction();
@$trans = $transaction->single_transaction($id) ;
 





$book = new Book();
$object = $book->single_books($trans->IBSN);

?>
<style type="text/css">
	p{
		font-size: 16px;
		font-weight: bold;
		color: #E32639;
	}
</style>


        <style type="text/css">
          .small {
            /*font-weight: bold; */

          }
          p{
            font-weight: bolder; 
          }
          .book-details{
            padding: 5px;
            /*font-size: 15px;*/
            font-weight: bold;
            border-bottom: 1px solid #ddd;
          }
        </style>
 
 
<div class="row">
            <div class="col-md-6">  
                <div class="row">
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
                   
                </div> 
            </div>  
 
            <div class="col-md-6">
                  <div class="row">
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

                   <div class="col-md-3"> 
                    <label class="small mb-1" for="Status">Transaction Status</label>  
                    </div> 
                    <div class="col-md-9"> 
                        <p><?php echo  isset($trans->Status) ?$trans->Status : 'None'; ?></p> 
                    </div> 

                    <div class="col-md-3"> 
                    <label class="small mb-1" for="DateBorrowed">Date Borrowed</label>  
                    </div> 
                    <div class="col-md-9"> 
                        <p><?php echo  isset($trans->DateBorrowed) ?$trans->DateBorrowed : 'None'; ?></p> 
                    </div> 
                    <div class="col-md-3"> 
                      <label class="small mb-1" for="DueDate">Due Date</label>  
                    </div> 
                    <div class="col-md-9"> 
                        <p><?php echo  isset($trans->DueDate) ?$trans->DueDate : 'None'; ?></p> 
                    </div> 

                    <?php if ($trans->Status!='Pending') { ?> 

                    <div class="col-md-3"> 
                      <label class="small mb-1" for="DateReturned">Returned Date</label>  
                    </div> 
                    <div class="col-md-9"> 
                        <p><?php echo  isset($trans->DateReturned) ?$trans->DateReturned : 'None'; ?></p> 
                    </div>    

                     <?php } ?> 


                    <div class="col-md-3"> 
                      <label class="small mb-1" for="Remarks">Remarks</label>  
                    </div> 
                    <div class="col-md-9"> 
                        <p><?php echo  isset($trans->Remarks) ?$trans->Remarks : 'None'; ?></p> 
                    </div>     

             
  </div>    
  
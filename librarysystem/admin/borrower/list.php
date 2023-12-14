<?php
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

?>

			  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Borrowers 
             <?php if ($_SESSION['TYPE']=="SystemAdministrator" || $_SESSION['TYPE']=="Administrator") { ?>
              	<a href="index.php?view=add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New</a>
              <?php } ?>
          	</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  	
							<table id="dataTable" class="table table-bordered  table-hover  " cellspacing="0">

							  <thead>
							  	<tr>
							  		<th width="5%">BorrowerId</th>
							  		 <th>Name</th>
							  		<th>Address</th>
							  		 <th>Sex</th> 
							  		 <th>ContactNo</th>
							  		 <th>Course/Year</th> 
							  	 	<th  >Action</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		// SELECT `IDNO`, `BorrowerId`, `Firstname`, `Lastname`, `MiddleName`, `Address`, `Sex`, `ContactNo`, `CourseYear`, `BorrowerPhoto`, `BorrowerType`, `Stats`, `IMGBLOB` FROM `tblborrower` WHERE 1
							  		$mydb->setQuery("SELECT * 
														FROM   `tblborrower`");
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		echo '<td>' . $result->BorrowerId.'</a></td>';
							  		echo '<td>'. $result->Firstname.' '. $result->MiddleName.' '. $result->Lastname.'</td>';
							  		echo '<td>'. $result->Address.'</td>';
							  		echo '<td>'. $result->Sex.'</td>'; 
							  		echo '<td>'. $result->ContactNo.'</td>';
							  		echo '<td>'. $result->CourseYear.'</td>'; 
							  	  
							  		echo '<td align="center" >   
					  		             <a title="Edit" href="index.php?view=edit&id='.$result->BorrowerId.'"  class="btn btn-primary btn-sm  ">
					  		             <i class="fa fa-edit fw-fa"></i> Edit</a>
					  		             <a title="Chnage Password" href="index.php?view=changepassword&id='.$result->BorrowerId.'"  class="btn btn-success btn-sm  ">
					  		             <i class="fa fa-lock fw-fa"></i> Change Password</a>
					  					 <a title="Delete" href="controller.php?action=delete&id='.$result->BorrowerId.'" class="btn btn-danger btn-sm" 
					  					 ><i class="fa fa-trash "></i> Delete</a>
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table> 
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container--> 
 
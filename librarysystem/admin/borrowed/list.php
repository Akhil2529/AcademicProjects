
 
			  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Borrowed Books 
             <?php if ($_SESSION['TYPE']=="SystemAdministrator" || $_SESSION['TYPE']=="Administrator") { ?>
              	<a href="index.php?view=filter" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Borrow Books</a>
              <?php } ?>
          	</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">



			    <!-- <form action="controller.php?action=delete" Method="POST">  					 -->
				<table id="dataTable" class="table table-bordered table-hover" cellspacing="0"  >
				
				  <thead>
				  	<tr> 
						<th>IBSN</th>
						<th>Title</th>
						<!-- <th>Description</th>  -->
						<th>Category</th>  
						<th>Borrower</th> 
						<th>DateBorrowed</th>
						<th>DueDate</th>
						<th>Status</th>
						<!-- <th>Remarks</th> -->
						<th width="22%">Action</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php
				  	// SELECT `BorrowId`, `IBSN`, `NoCopies`, `DateBorrowed`, `Purpose`, `Status`, `DueDate`, `BorrowerId`, `Due`, `Remarks` FROM `tblborrow` WHERE 1

				  	// SELECT `IDNO`, `BorrowerId`, `Firstname`, `Lastname`, `MiddleName`, `Address`, `Sex`, `ContactNo`, `CourseYear`, `BorrowerPhoto`, `BorrowerType`, `Stats`, `BUsername`, `BPassword` FROM `tblborrower` WHERE 1
				  	
					  		// $mydb->setQuery("SELECT *, sum(BookQuantity) as qty FROM `tblbooks` GROUP BY BookTitle");
				  	$mydb->setQuery("SELECT * FROM `tblbooks` b, `tbltransaction` t ,`tblborrower` s
				  					WHERE b.IBSN=t.IBSN AND t.BorrowerId=s.BorrowerId AND Borrowed=1");
						  	loadresult();
					
				  		function loadresult(){
					  		global $mydb;
					  		$cur = $mydb->loadResultlist();
							foreach ($cur as $result) {
						  		echo '<tr>'; 
						  		// echo '<td ><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->SUBJ_ID. '"/>
						  		// 		<a href="index.php?view=edit&id='.$result->SUBJ_ID.'">' . $result->SUBJ_CODE.'</a></td>';
								echo '<td >' . $result->IBSN.'</td>';
								echo '<td >'. $result->BookTitle.'</td>';
								// echo '<td>'.  $result->BookDesc.'</td>'; 
								echo '<td>'. $result->Category.'</td>'; 
								echo '<td>'. $result->Firstname.' '. $result->MiddleName.' '. $result->Lastname.'</td>';
								echo '<td>'. $result->DateBorrowed.'</td>';
								echo '<td>'. $result->DueDate.'</td>';
								echo '<td>'. $result->Status.'</td>';
								// echo '<td>'. $result->Remarks.'</td>';

								if ($_SESSION['TYPE']=="SystemAdministrator" || $_SESSION['TYPE']=="Administrator") {

									if ($result->Status=='Confirmed') {
										# code...
										$button = '<a title="Edit" href="controller.php?action=return&id='.$result->TransactionID.'" class="btn btn-primary btn-sm  " ><i class="fa fa-check"></i> Return</a>';
									}elseif($result->Status=='Pending'){
										$button = '<a title="Edit" href="controller.php?action=confirm&id='.$result->TransactionID.'" class="btn btn-primary btn-sm  " ><i class="fa fa-check"></i> Confirm</a>';
									}
				  			# code...
						  			$btn= '
						  			<a title="View Book Details" href="index.php?view=view&id='.$result->TransactionID.'" class="btn btn-info btn-sm  " ><i class="fa fa-info"></i> View</a> 
						  			  		'.$button.'
						  					 <a title="Delete" href="controller.php?action=cancel&id='.$result->TransactionID.'&" class="btn btn-danger btn-sm  " ><i class="fa fa-times"></i> Cancel</a>';
						  	 
						  		}else{
						  			$btn='No Action';
						  			
				  				}
				  				echo '<td > '.$btn.'</td>';

						  		echo '</tr>';
					  		}
					  	} 
				  	?>
				  </tbody>
				
				</table>
				<?php
				// if($_SESSION['ACCOUNT_TYPE']=='Administrator'){
				// 		echo '
				// <div class="btn-group">
				//   <a href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>
				//   <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				// </div>';
			// }
				?>
				<!-- </form>  --> 
			</div>
		</div>
	</div>
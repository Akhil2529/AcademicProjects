
 
			  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Books 
             <?php if ($_SESSION['TYPE']=="SystemAdministrator" || $_SESSION['TYPE']=="Administrator") { ?>
              	<a href="index.php?view=add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New</a>
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
						<th>Description</th> 
						<th>Category</th> 
						<th>Author</th> 
						<th>Price</th>
						<th>Status</th>
						<!-- <th>Quantity</th> -->
						<th width="20%">Action</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php
				  	// `AccessionNo`, `BookTitle`, `BookDesc`, `Author`, `PublishDate`, `BookPublisher`, `Category`, `BookPrice`, `BookQuantity`, `Status`, `BookType`, `DeweyDecimal`, `OverAllQty`, `Donate`, `Remarks`
				  	
					  		// $mydb->setQuery("SELECT *, sum(BookQuantity) as qty FROM `tblbooks` GROUP BY BookTitle");
				  	$mydb->setQuery("SELECT * FROM `tblbooks`");
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
								echo '<td>'.  $result->BookDesc.'</td>'; 
								echo '<td>'. $result->Category.'</td>'; 
								echo '<td>'. $result->Author.'</td>';
								echo '<td>'. $result->BookPrice.'</td>';
								echo '<td>'. $result->Status.'</td>';
								// echo '<td>'. $result->qty.'</td>';

								if ($_SESSION['TYPE']=="SystemAdministrator" || $_SESSION['TYPE']=="Administrator") {
				  			# code...
						  			$btn= '<a title="Edit" href="index.php?view=edit&id='.$result->IBSN.'" class="btn btn-primary btn-sm  " ><i class="fa fa-edit"></i> Edit</a>  
						  			 
						  			<a title="View Book Details" href="index.php?view=view&id='.$result->IBSN.'" class="btn btn-info btn-sm  " ><i class="fa fa-info"></i> View</a>
						  					 <a title="Delete" href="controller.php?action=delete&id='.$result->IBSN.'" class="btn btn-danger btn-sm  " ><i class="fa fa-trash"></i> Delete</a>';
						  	 
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
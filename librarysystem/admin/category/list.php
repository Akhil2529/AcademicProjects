<?php 
	  if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Categories 
    	<?php if ($_SESSION['TYPE']=="SystemAdministrator" || $_SESSION['TYPE']=="Administrator") { ?>
    	<a href="index.php?view=add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> New</a>
    <?php } ?>
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">  
	 		   <table id="dataTable" class="table table-bordered table-hover"   cellspacing="0" style="white-space: nowrap;">
				
				  <thead>
				  	<tr> 
				  		<th> Category</th> 
				  		<th> Dewey Decimal</th> 
				  		 <th width="10%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		// SELECT `CategoryId`, `Category`, `DDecimal` FROM `tblcategory` WHERE 1
				  		$mydb->setQuery("SELECT * FROM `tblcategory`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>'; 
				  			echo '<td>' . $result->Category.'</td>';
				  			echo '<td>' . $result->DDecimal.'</td>';

				  		if ($_SESSION['TYPE']=="SystemAdministrator" || $_SESSION['TYPE']=="Administrator") {
				  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->CategoryId.'" class="btn btn-primary btn-sm  ">  <span class="fa fa-edit fw-fa"></span> Edit</a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->CategoryId.'" class="btn btn-danger btn-sm  ">  <span class="fa  fa-trash fw-fa "></span> Delete</a></td>';
				  		 }else{
				  		echo '<td>No Action</td>';

				  		 }
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  

			</div>
		</div>
	</div>
	 
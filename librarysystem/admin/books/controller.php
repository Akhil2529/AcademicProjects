<?php 
require_once ("../../include/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
	global $mydb;
	// SELECT `BookID`, `IBSN`, `BookTitle`, `BookDesc`, `Author`, `PublishDate`, `BookPublisher`, `Category`, `BookPrice`, `BookQuantity`, `Status`, `BookType`, `DeweyDecimal`, `OverAllQty`, `Donate`, `Remarks` FROM `tblbooks` WHERE 1	
if (isset($_POST['savecourse'])){

	if ($_POST['IBSN'] == "" OR $_POST['BookTitle'] == "" OR $_POST['Category'] == "") {
		message("All field is required!","error");
		redirect('index.php?view=add');
	}else{
		
		$sql = "SELECT * FROM `tblbooks` WHERE IBSN = '".$_POST['IBSN']."'";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);

		if ($maxrow>0) {
			# code...
			message("Accession # is already exist!","error");
			redirect('index.php?view=add');
		}else{
			$book = new Book();
			$IBSN   	= $_POST['IBSN'];
			$BookTitle	 	= $_POST['BookTitle'];
			$BookDesc 			= $_POST['BookDesc'];
			$Author 			= $_POST['Author']; 
			$PublishDate 		= $_POST['PublishDate'];
			$BookPublisher 			= $_POST['BookPublisher'];
			$Category 		= $_POST['Category'];
			$BookPrice 		= $_POST['BookPrice'];
			$BookQuantity 		=1;
			$Status 		= 'Available';
			$BookType 		= $_POST['BookType'];
			$DeweyDecimal 		= $_POST['DDecimal'];
			$OverAllQty 		=1; 
			$Remarks 		= $_POST['Remarks'];
		
				$book->IBSN		 	= $IBSN;
				$book->BookTitle  	 		= $BookTitle;
				$book->BookDesc 		 	= $BookDesc;
				$book->Author 	 			= $Author; 
				$book->PublishDate 		 	= $PublishDate;
				$book->BookPublisher 		= $BookPublisher;
				$book->Category 		 	= $Category;
				$book->BookPrice 		 	= $BookPrice;
				$book->BookQuantity 		= $BookQuantity;
				$book->Status 		 		= $Status;
				$book->DeweyDecimal 		= $DeweyDecimal;
				$book->OverAllQty 			= $OverAllQty; 
				$book->Remarks 		 		= $Remarks;


				 $istrue = $book->create(); 
				 if ($istrue == 1){
				 	
				 	message("New Book created successfully!","success");
				 	redirect('index.php');
				 }
		}



		
	}
	}
	elseif (isset($_POST['saveandnewcourse'])) {
	if ($_POST['IBSN'] == "" OR $_POST['BookTitle'] == "" OR $_POST['Category'] == "") {
		message("All field is required!","error"); 
		redirect('index.php?view=add');
	}else{
		

		$book = new Book();
		$IBSN   	= $_POST['IBSN'];
		$BookTitle	 	= $_POST['BookTitle'];
		$BookDesc 			= $_POST['BookDesc'];
		$Author 			= $_POST['Author']; 
		$PublishDate 		= $_POST['PublishDate'];
		$BookPublisher 			= $_POST['BookPublisher'];
		$Category 		= $_POST['Category'];
		$BookPrice 		= $_POST['BookPrice'];
		$BookQuantity 		=1;
		$Status 		= 'Available';
		$BookType 		= $_POST['BookType'];
		$DeweyDecimal 		= $_POST['DDecimal'];
		$OverAllQty 		=1; 
		$Remarks 		= $_POST['Remarks'];
	
			$book->IBSN		 	= $IBSN;
			$book->BookTitle  	 		= $BookTitle;
			$book->BookDesc 		 	= $BookDesc;
			$book->Author 	 			= $Author; 
			$book->PublishDate 		 	= $PublishDate;
			$book->BookPublisher 		= $BookPublisher;
			$book->Category 		 	= $Category;
			$book->BookPrice 		 	= $BookPrice;
			$book->BookQuantity 		= $BookQuantity;
			$book->Status 		 		= $Status;
			$book->DeweyDecimal 		= $DeweyDecimal;
			$book->OverAllQty 			= $OverAllQty; 
			$book->Remarks 		 		= $Remarks;


			 $istrue = $book->create(); 
			 if ($istrue == 1){
			 	
			 	message("New Book created successfully!","success");
				redirect('index.php?view=add');
			 }
}

}
}



function doEdit(){
	if (isset($_POST['savecourse'])){
	

	if ($_POST['IBSN'] == "" OR $_POST['BookTitle'] == "" OR $_POST['Category'] == "") {
		message("All field is required!","error");
		redirect('index.php');
	}else{


		$book = new Book();
		$IBSN   	= $_POST['IBSN'];
		$BookTitle	 	= $_POST['BookTitle'];
		$BookDesc 			= $_POST['BookDesc'];
		$Author 			= $_POST['Author']; 
		$PublishDate 		= $_POST['PublishDate'];
		$BookPublisher 			= $_POST['BookPublisher'];
		$Category 		= $_POST['Category'];
		$BookPrice 		= $_POST['BookPrice'];
		$BookQuantity 		=1;
		$Status 		= 'Available';
		$BookType 		= $_POST['BookType'];
		$DeweyDecimal 		= $_POST['DDecimal'];
		$OverAllQty 		=1; 
		$Remarks 		= $_POST['Remarks'];
	
			$book->IBSN		 	= $IBSN;
			$book->BookTitle  	 		= $BookTitle;
			$book->BookDesc 		 	= $BookDesc;
			$book->Author 	 			= $Author; 
			$book->PublishDate 		 	= $PublishDate;
			$book->BookPublisher 		= $BookPublisher;
			$book->Category 		 	= $Category;
			$book->BookPrice 		 	= $BookPrice;
			$book->BookQuantity 		= $BookQuantity;
			// $book->Status 		 		= $Status;
			$book->DeweyDecimal 		= $DeweyDecimal;
			$book->OverAllQty 			= $OverAllQty; 
			$book->Remarks 		 		= $Remarks;


			 $istrue = $book->update($IBSN);

 
			message("Book has updated successfully!", "info");
			redirect('index.php');
			 
			
		}	 

		
	}
		
}

function doDelete(){
		 //  @$id=$_POST['selector'];
	  // $key = count($id);
	//multi delete using checkbox as a selector
	
	// for($i=0;$i<$key;$i++){

	$id = $_GET['id'];
 
		$subj = new Book();
		$subj->delete($id);
	// }
	message("Course already Deleted!","info");
	redirect('index.php');

}

?>
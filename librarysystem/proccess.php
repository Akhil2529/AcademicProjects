<?php
require_once ("include/initialize.php"); 
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'checkout' :
	doCheckout();
	break; 
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;
   
	case 'changepassword' :
	doChangePassword();
	break;
  
	}
   
   // SELECT `IDNO`, `BorrowerId`, `Firstname`, `Lastname`, `MiddleName`, `Address`, `Sex`, `ContactNo`, `CourseYear`, `BorrowerPhoto`, `BorrowerType`, `Stats`, `IMGBLOB` FROM `tblborrower` WHERE 1
	function doInsert(){
		if(isset($_POST['save'])){

			$ibsn = $_POST['id'];

			@$picture = UploadImage();
			@$location = "photos/". $picture; 

					$borrower = New Borrower(); 
					$borrower->BorrowerId 		= $_POST['BorrowerId'];
					$borrower->Firstname		= $_POST['Firstname']; 
					$borrower->Lastname			= $_POST['Lastname'];
					$borrower->MiddleName 	   	= $_POST['MiddleName'];
					$borrower->Address			= $_POST['Address'];   
					$borrower->ContactNo		= $_POST['ContactNo'];   
					$borrower->Sex 				= $_POST['optionsRadios']; 
					$borrower->CourseYear		= $_POST['CourseYear']; 
					$borrower->BorrowerPhoto	= $location; 
					$borrower->Stats			= 'Active';
					$borrower->BorrowerType		= 'Students'; 
					$borrower->BUsername		= $_POST['BUsername']; 
					$borrower->BPassword		= sha1($_POST['BPassword']); 
					$borrower->create(); 


					$email = trim($_POST['BUsername']);
				    $upass  = trim($_POST['BPassword']);
				    $h_upass = sha1($upass);

					$borrower::borrowerAuthentication($email, $h_upass);
 
						
					$autonum = New Autonumber(); 
					$autonum->auto_update('BorrowerId');
 
					redirect("index.php?q=checkout&id=".$ibsn);
 
		 }  
	}

 

	function doCheckout(){ 
		global $mydb;
			$ibsn = $_GET['id'];

			$sql = "SELECT * FROM `tblbooks` WHERE IBSN = '".$ibsn."'";
			$mydb->setQuery($sql);
			$cur = $mydb->executeQuery();
			$maxrow = $mydb->num_rows($cur);

			if ($maxrow>0) {
				# code...
	 

				$transaction = new Transaction();
				$transaction->IBSN = $ibsn;
				$transaction->NoCopies =1;
				$transaction->DateBorrowed = date('Y-m-d h:i');
				$transaction->Purpose = '1 week';
				$transaction->Status = 'Pending';
				$transaction->DueDate = date('Y-m-d h:i', strtotime(date('Y-m-d h:i'). ' + 7 day'));
				$transaction->BorrowerId = $_SESSION['BorrowerId'];
				$transaction->Borrowed = 1;
				$transaction->Due = 0;
				$transaction->Returned=0;
				$transaction->DateReturned =	date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 day'));
				$transaction->Remarks = 'Borrowed for on Week';
				$transaction->create();

				$book = new Book(); 
				$Status 		= 'Not Available';  
				$book->Status = $Status; 
				$book->update($ibsn);


				message("Transaction created successfully!","success");
				redirect("borrower/");


			 
			} 
	   
	}


function UploadImage(){

	$target_dir = "admin/borrower/photos/";
	$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	
	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
	|| $imageFileType != "gif" ) {
		 if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			return  date("dmYhis") . basename($_FILES["picture"]["name"]);
		}else{
			echo "Error Uploading File";
			// exit;
		}
	}else{
			echo "File Not Supported";
			// exit;
		}
} 

?>

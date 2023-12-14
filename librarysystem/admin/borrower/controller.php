<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

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


		if ( $_POST['BorrowerId'] == "" OR $_POST['Firstname'] == ""
			OR $_POST['Lastname'] == "" OR $_POST['MiddleName'] == ""  OR $_POST['Address'] == "" 
			OR $_POST['ContactNo'] == "") {
			$messageStats = false;
			message("All fields are required!","error");
			redirect('index.php?view=add');
		}else{	

			$picture = UploadImage();
			$location = "photos/". $picture ;

	  

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
 
						
					$autonum = New Autonumber(); 
					$autonum->auto_update('BorrowerId');

					message("New borrower created successfully!", "success");
					redirect("index.php");
 
			} 
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

		if ( $_POST['BorrowerId'] == "" OR $_POST['Firstname'] == ""
			OR $_POST['Lastname'] == "" OR $_POST['MiddleName'] == ""  OR $_POST['Address'] == "" 
			OR $_POST['ContactNo'] == "") {
			$messageStats = false;
			message("All fields are required!","error");
			redirect('index.php?view=add');
		}else{	

				$picture = UploadImage();
			    $location = "photos/". $picture ;


					$borrower = New Borrower();  
					$borrower->Firstname			= $_POST['Firstname']; 
					$borrower->Lastname				= $_POST['Lastname'];
					$borrower->MiddleName 	   		= $_POST['MiddleName'];
					$borrower->Address				= $_POST['Address'];   
					$borrower->ContactNo			= $_POST['ContactNo'];   
					$borrower->Sex 					= $_POST['optionsRadios']; 
					$borrower->CourseYear			= $_POST['CourseYear'];
					$borrower->BUsername			= $_POST['BUsername']; 
					
					if ($location!='photos/') {
						$borrower->BorrowerPhoto	= $location;  
					}
					$borrower->Stats				= 'Active';
					$borrower->BorrowerType			= 'Students';  
					$borrower->update($_POST['BorrowerId']);
		 

				message("Borrower has been updated!", "success"); 
		       redirect("index.php?view=edit&id=".$_POST['BorrowerId']);
	    	} 
	 
	}

} 
	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","error");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$subj = New Student();
		// 	$subj->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$borrower = New Borrower();
	 		 	$borrower->delete($id);
			 
		
		// }
			message("Borrower(s) already Deleted!","success");
			redirect('index.php');
		// }

		
	}


  function doChangePassword(){
		global $mydb;
	if(isset($_POST['save'])){

			$borrower = New Borrower();  
			$borrower->BPassword			=sha1($_POST['user_pass']); 
			$borrower->update($_POST['BorrowerId']); 

			  message("Password has been changed!", "success");
			  redirect("index.php?view=changepassword&id=".$_POST['BorrowerId']);
		}
	}

   
 
  function UploadImage(){
			$target_dir = "photos/";
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
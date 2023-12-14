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
	case 'confirm' :
	doDelete();
	break;
	case 'return' :
	doReturned();
	break;
	case 'cancel' :
	doCancelled();
	break;


	}
function doInsert(){
	global $mydb;
	// SELECT `BookID`, `AccessionNo`, `BookTitle`, `BookDesc`, `Author`, `PublishDate`, `BookPublisher`, `Category`, `BookPrice`, `BookQuantity`, `Status`, `BookType`, `DeweyDecimal`, `OverAllQty`, `Donate`, `Remarks` FROM `tblbooks` WHERE 1	
	// SELECT `TransactionID`, `IBSN`, `NoCopies`, `DateBorrowed`, `Purpose`, `Status`, `DueDate`, `BorrowerId`, `Borrowed`, `Due`, `Returned`, `DateReturned`, `Remarks` FROM `tbltransaction` WHERE 1
if (isset($_POST['save'])){
 
		
		$sql = "SELECT * FROM `tblbooks` WHERE IBSN = '".$_POST['IBSN']."'";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);

		if ($maxrow>0) {
			# code...
 

			$transaction = new Transaction();
			$transaction->IBSN = $_POST['IBSN'];
			$transaction->NoCopies =1;
			$transaction->DateBorrowed = date('Y-m-d h:i');
			$transaction->Purpose = '1 week';
			$transaction->Status = 'Confirmed';
			$transaction->DueDate = date('Y-m-d h:i', strtotime(date('Y-m-d h:i'). ' + 7 day'));
			$transaction->BorrowerId = $_POST['BorrowerId'];
			$transaction->Borrowed = 1;
			$transaction->Due = 0;
			$transaction->Returned=0;
			$transaction->DateReturned =	date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 day'));
			$transaction->Remarks = 'Borrowed for on Week';
			$transaction->create();

			$book = new Book(); 
			$Status 		= 'Not Available';  
			$book->Status = $Status; 
			$book->update($_POST['IBSN']);


			message("Transaction created successfully!","success");
			redirect('index.php');


		 
		} 
 
	}
	 
}

function doConfirmed(){

	$id = $_GET['id'];

			// $transaction = new Transaction(); 
			// $trans = $transaction->single_transaction($id);
		 

			// $transaction->IBSN = $_POST['IBSN'];
			// $transaction->NoCopies =1;
			// $transaction->DateBorrowed = date('Y-m-d h:i');
			// $transaction->Purpose = '1 week';
			// $transaction->Status = 'Returned';
			// $transaction->DueDate = date('Y-m-d h:i', strtotime(date('Y-m-d h:i'). ' + 7 day'));
			// $transaction->BorrowerId = $_POST['BorrowerId'];
			// $transaction->Borrowed = ;
			// $transaction->Due = 0;

			// $now = time(); // or your date as well 
			// $your_date = strtotime($trans->DueDate);
			// $datediff = $your_date -  $now ;

			// $duedate =  round($datediff / (60 * 60 * 24));

			// if($duedate>=0){
			// 	$Status= 'Ontime';
			// 	$due = 0;
			// }else{
			// 	$Status= 'Over Due';
			// 	$due = 1;	
			// }


            $transaction = new Transaction();  
			$transaction->Borrowed =1;  
			$transaction->DateBorrowed =	date('Y-m-d');
			$transaction->Status = 'Confirmed'; 
			$transaction->update($id);

			// $book = new Book(); 
			// $Status 		= 'Available';  
			// $book->Status = $Status; 
			// $book->update($trans->IBSN);
 
 
		message("Book returned successfully!", "info");
		redirect('index.php');
			 

}

function doReturned(){

	$id = $_GET['id'];

			$transaction = new Transaction(); 
			$trans = $transaction->single_transaction($id);
		 

			// $transaction->IBSN = $_POST['IBSN'];
			// $transaction->NoCopies =1;
			// $transaction->DateBorrowed = date('Y-m-d h:i');
			// $transaction->Purpose = '1 week';
			// $transaction->Status = 'Returned';
			// $transaction->DueDate = date('Y-m-d h:i', strtotime(date('Y-m-d h:i'). ' + 7 day'));
			// $transaction->BorrowerId = $_POST['BorrowerId'];
			// $transaction->Borrowed = ;
			// $transaction->Due = 0;

			$now = time(); // or your date as well 
			$your_date = strtotime($trans->DueDate);
			$datediff = $your_date -  $now ;

			$duedate =  round($datediff / (60 * 60 * 24));

			if($duedate>=0){
				$Status= 'Ontime';
				$due = 0;
			}else{
				$Status= 'Over Due';
				$due = 1;	
			}


            $transaction = new Transaction();  
			$transaction->Borrowed =0;
			$transaction->Returned=1;
			$transaction->Due=$due;
			$transaction->DateReturned =	date('Y-m-d');
			$transaction->Status = 'Returned';
			$transaction->Remarks = $Status;
			$transaction->update($id);

			$book = new Book(); 
			$Status 		= 'Available';  
			$book->Status = $Status; 
			$book->update($trans->IBSN);
 
 
		message("Book returned successfully!", "info");
		redirect('index.php');
			 

}

function doCancelled(){
	$id = $_GET['id'];

		$transaction = new Transaction(); 
		$trans = $transaction->single_transaction($id);
	 
  

		$now = time(); // or your date as well 
		$your_date = strtotime($trans->DueDate);
		$datediff = $your_date -  $now ;

		$duedate =  round($datediff / (60 * 60 * 24));

		if($duedate>=0){
			$Status= 'Ontime';
			$due = 0;
		}else{
			$Status= 'Over Due';
			$due = 1;	
		}


        $transaction = new Transaction();  
		$transaction->Borrowed =0;
		$transaction->Returned=0;
		$transaction->Due=0;
		$transaction->Status = 'Cancelled';
		$transaction->Remarks = 'Cancelled';
		$transaction->update($id);

		$book = new Book(); 
		$Status 		= 'Available';  
		$book->Status = $Status; 
		$book->update($trans->IBSN);
 
 
		message("Transaction cancelled successfully!", "info");
		redirect('index.php');
}


function doEdit(){





			$transaction = new Transaction();
			// $transaction->IBSN = $_POST['IBSN'];
			// $transaction->NoCopies =1;
			// $transaction->DateBorrowed = date('Y-m-d h:i');
			// $transaction->Purpose = '1 week';
			// $transaction->Status = 'Returned';
			// $transaction->DueDate = date('Y-m-d h:i', strtotime(date('Y-m-d h:i'). ' + 7 day'));
			// $transaction->BorrowerId = $_POST['BorrowerId'];
			// $transaction->Borrowed = ;
			// $transaction->Due = 0;

			$now = time(); // or your date as well
			$your_date = strtotime("2010-01-31");
			$datediff = $now - $your_date;

			echo round($datediff / (60 * 60 * 24));


			// $transaction->Returned=1;
			// $transaction->DateReturned =	date('Y-m-d');
			// $transaction->Remarks = 'Ontime';
			// $transaction->create();

			// $book = new Book(); 
			// $Status 		= 'Available';  
			// $book->Status = $Status; 
			// $book->update($_POST['IBSN']);
 
 
		message("Book has returned successfully!", "info");
		// redirect('index.php');
			 
			 
		
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
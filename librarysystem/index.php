<?php 
require_once("include/initialize.php");   
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
  case 'find':
    $title = "Find Books";
    $content = 'filterBooks.php';
   # code...
   break; 
  case 'books':
    $title = "List of Books";
    $content = 'book.php'; 
   break;


  case 'bookdetails':
    $title = "Book Details";
    $content = 'single-view.php'; 
   break;  

  case 'borrow':
    $title = "Borrow a Book";
    $content = 'borrow.php'; 
   break; 


  case 'checkout':
    $title = "Checkout";
    $content = 'checkout.php'; 
   break; 



  case 'login':
    $title = "Login";
    $content = 'login.php'; 
   break; 


  case 'logout':
    $title = "Logout";
    $content = 'logout.php'; 
   break;

  case 'about':
    $title = "About Us";
    $content = 'about.php';
   # code...
   break; 
   
  case 'contact':
    $title = "Contact Us";
    $content = 'contact.php';
   # code...
   break; 
  default :
    $title = "";
    $content    = 'home.php';
}
require_once("theme/templates.php");
?>
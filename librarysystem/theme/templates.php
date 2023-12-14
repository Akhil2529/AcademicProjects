<!DOCTYPE html>
<?php  $q = isset($_GET['q']) ? $_GET['q'] :'';?>

<html lang="en">

    <head>

        <!-- Basic -->
        <title>Online Library | Home</title>

        <!-- Define Charset -->
        <meta charset="utf-8">

        <!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Page Description and Author -->
        <meta name="description" content="Sulfur - Responsive HTML5 Template">
        <meta name="author" content="Shahriyar Ahmed">

        <!-- Bootstrap CSS  -->
        <link rel="stylesheet" href="<?php echo web_root;?>asset/bootstrap/css/bootstrap.min.css" type="text/css">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="<?php echo web_root;?>asset/font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="<?php echo web_root;?>asset/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="<?php echo web_root;?>asset/css/owl.theme.css" type="text/css">
        <link rel="stylesheet" href="<?php echo web_root;?>asset/css/owl.transitions.css" type="text/css">
        
        <!-- Css3 Transitions Styles  -->
        <link rel="stylesheet" type="text/css" href="<?php echo web_root;?>asset/css/animate.css">
        
        <!-- Lightbox CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo web_root;?>asset/css/lightbox.css">

        <!-- Sulfur CSS Styles  -->
        <link rel="stylesheet" type="text/css" href="<?php echo web_root;?>asset/css/style.css">

        <!-- Responsive CSS Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo web_root;?>asset/css/responsive.css">


        <script src="<?php echo web_root;?>asset/js/modernizrr.js"></script>
        <link href="<?php echo web_root;?>admin/dist/css/datepicker.css" rel="stylesheet" />
        <link href="<?php echo web_root;?>admin/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />


    </head>

    <body>
    
        <header class="clearfix">
        
            <!-- Start Top Bar -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-bar">
                            <div class="row">
                                    
                                <div class="col-md-6">
                                    <!-- Start Contact Info -->
                                    <ul class="contact-details">
                                        <li><a href="#"><i class="fa fa-phone"></i> +12 345 678 000</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i> support@library.com</a>
                                        </li> 
                                    </ul>
                                    <!-- End Contact Info -->
                                </div><!-- .col-md-6 -->
                                
                                <div class="col-md-6">
                                    <!-- Start Social Links -->
                                    <ul class="social-list">
                                        
                                            <?php if (isset($_SESSION['BorrowerId'])) {
                                                # code...
                                                echo '<li><a class="active" href="'.web_root.'logout.php"><i class="fa fa-sign-out"></i></a></li>'; 
                                                echo '<li><a class="active" href="'.web_root.'borrower/"><i class="fa fa-user"></i></a></li>'; 
                                            }else{
                                                echo '<li><a class="active" href="'.web_root.'index.php?q=login"><i class="fa fa-lock"></i></a></li>';
                                            }
                                        ?> 
                                    </ul>
                                    <!-- End Social Links -->
                                </div><!-- .col-md-6 -->
                            </div>
                                
                                
                        </div>
                    </div>                        

                </div><!-- .row -->
            </div><!-- .container -->
            <!-- End Top Bar -->
        
            <!-- Start  Logo & Naviagtion  -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->
                        <a class="navbar-brand" href="<?php echo web_root;?>">Online Library</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a class="<?php echo ($q=='')? 'active' : ''?>" href="<?php echo web_root;?>">Home</a>
                            </li> 
                            <li >
                                <a class="<?php echo ($q=='books' || $q=='borrow' || $q=='bookdetails')? 'active' : ''?>" href="<?php echo web_root;?>index.php?q=books">Books</a>
                            </li>
                            <li>
                                <a  class="<?php echo ($q=='find')? 'active' : ''?>" href="<?php echo web_root;?>index.php?q=find">Find Books</a>
                            </li> 
                            <li>
                                <a  class="<?php echo ($q=='about')? 'active' : ''?>" href="<?php echo web_root;?>index.php?q=about">About Us</a>
                            </li>
                            <li >
                            	<a class="<?php echo ($q=='contact')? 'active' : ''?>" href="<?php echo web_root;?>index.php?q=contact">Contact</a>
                            </li>
                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion --> 
        </header>

        <?php   

        if ($q!='') {

          echo '<div class="page-header">
              <div class="overlay">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-12">
                              <h1>'.$title.'</h1>
                          </div>
                      </div>
                  </div>
              </div>
          </div>';

        }

        ?>
              
		<?php  require_once $content; ?>    


  <!-- Start Footer Section -->
        <section id="footer-section" class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="section-heading-2">
                            <h3 class="section-title">
                                <span>School Address</span>
                            </h3>
                        </div>
                        
                        <div class="footer-address">
                            <ul>
                                <li class="footer-contact"><i class="fa fa-home"></i>123, Second Street name, Address</li>
                                <li class="footer-contact"><i class="fa fa-envelope"></i><a href="#">info@domain.com</a></li>
                                <li class="footer-contact"><i class="fa fa-phone"></i>+1 (123) 456-7890</li>
                                <li class="footer-contact"><i class="fa fa-globe"></i><a href="#" target="_blank">www.domain.com</a></li>
                            </ul>
                        </div>
                    </div><!--/.col-md-3 -->
                    <div class="col-md-4">
                        <div class="section-heading-2">
                            <h3 class="section-title">
                                <span>Navigation</span>
                            </h3>
                        </div>
                        
                        <div class="footer-address">
                            <ul>
                                <li class="footer-contact"><i class="fa fa-home"></i> <a href="<?php echo web_root;?>" target="_blank">Home</a></li>
                                <li class="footer-contact"><i class="fa fa-book"></i> <a href="<?php echo web_root;?>index.php?q=books">Books</a></li>
                                <li class="footer-contact"><i class="fa fa-search"></i> <a href="<?php echo web_root;?>index.php?q=find" target="_blank">Find Books</a></li>
                                <li class="footer-contact"><i class="fa fa-question"></i> <a href="#" target="<?php echo web_root;?>index.php?q=about">About us</a></li>
                            </ul>
                        </div>
                    </div><!--/.col-md-3 -->
                    <div class="col-md-4">
                        <div class="section-heading-2">
                            <h3 class="section-title">
                                <span>Category of Books</span>
                            </h3>
                        </div>
                        
                        <div class="footer-address">
                            <ul>
                                <?php 
                                    $category = new Category();
                                    $res = $category->listofcategory();

                                    $sql = "SELECT * FROM tblcategory LIMIT 4";
                                    $mydb->setQuery($sql);
                                    $res = $mydb->loadResultList();
                                    foreach ($res as $object) {
                                        # code...

                                        echo '<li class="footer-contact"><i class="fa fa-star"></i>'.$object->Category.'</li>'; 
                                    }
                                ?>

                            </ul>
                        </div>
                    </div><!--/.col-md-3 -->
                    
                    
                   
                </div><!--/.row -->
            </div><!-- /.container -->
        </section>
        <!-- End Footer Section -->
        
        
        <!-- Start CCopyright Section -->
        <div id="copyright-section" class="copyright-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="copyright">
                            Copyright © 2014. All Rights Reserved
                        </div>
                    </div>
                    
                   
                </div><!--/.row -->
            </div><!-- /.container -->
        </div>
        <!-- End CCopyright Section -->
        
        
        
       <!-- Sulfur JS File -->
        <script src="<?php echo web_root;?>asset/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo web_root;?>asset/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo web_root;?>asset/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo web_root;?>asset/js/owl.carousel.min.js"></script>
        <script src="<?php echo web_root;?>asset/js/jquery.appear.js"></script>
        <script src="<?php echo web_root;?>asset/js/jquery.fitvids.js"></script>
        <script src="<?php echo web_root;?>asset/js/jquery.nicescroll.min.js"></script>
        <script src="<?php echo web_root;?>asset/js/lightbox.min.js"></script>
        <script src="<?php echo web_root;?>asset/js/count-to.js"></script>
        <script src="<?php echo web_root;?>asset/js/styleswitcher.js"></script>
        
        <script src="<?php echo web_root;?>asset/js/map.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="<?php echo web_root;?>asset/js/script.js"></script> 
        <script type="text/javascript" src="<?php echo web_root;?>admin/dist/js/inputmask/jquery.inputmask.js" charset="utf-8"></script>
        <script src="<?php echo web_root;?>admin/dist/js/bootstrap-datepicker.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo web_root;?>admin/dist/assets/demo/datatables-demo.js"></script>
        
    <script type="text/javascript">
        
    $("#datepicker").inputmask("datetime", {
        inputFormat: "yyyy-mm-dd",
        outputFormat: "yyyy-mm-dd",
        inputEventOnly: true
    });

      $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose:1
});

       function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
$("#imgInp").change(function(){
    readURL(this);
});


  function validateRetypePassword(){
  // retype_user_pass
  var pass = $("#user_pass");
  var rpass = $("#retype_user_pass"); 

  // alert(rpass.val());

  // return false;
  if(pass.val()==rpass.val()){
    return true
  }else{
    alert("Password does not match")
    return false;
  }
}

    </script>
    </body>
</html>

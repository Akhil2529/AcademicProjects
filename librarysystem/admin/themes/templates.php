<?php 
 $user = New User();
  $singleuser = $user->single_user($_SESSION['USERID']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Panel</title>

        <link href="<?php echo web_root;?>admin/dist/css/styles.css" rel="stylesheet" /> 
          <link href="<?php echo web_root;?>admin/dist/css/datepicker.css" rel="stylesheet" />
        <link href="<?php echo web_root;?>admin/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="<?php echo web_root;?>admin/dist/fonts/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="<?php echo web_root;?>admin/dist/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo web_root;?>admin/">Admin Panel</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo web_root;?>admin/users/index.php?view=view&id=<?php echo $_SESSION['USERID']?>">Account</a> 
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo web_root;?>admin/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo web_root?>admin/"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard</a>
                            <div class="sb-sidenav-menu-heading">Transaction</div>
                                  <a class="nav-link" href="<?php echo web_root;?>admin/borrowed/">
                                    <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                                Borrowed Books</a>
                                  <a class="nav-link" href="<?php echo web_root;?>admin/returned/">
                                    <div class="sb-nav-link-icon"><i class="fas fa-undo"></i></div>
                                Returned Books</a>
                               <div class="sb-sidenav-menu-heading">UI</div>
                                  <a class="nav-link" href="<?php echo web_root;?>admin/category/">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Category of Books</a>
                                  <a class="nav-link" href="<?php echo web_root;?>admin/books/">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Manage Books</a>
                                  <a class="nav-link" href="<?php echo web_root;?>admin/borrower/">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Manage Borrowers</a>
                                  <a class="nav-link" href="<?php echo web_root;?>admin/users/">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Manage Users</a> 
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?php echo $singleuser->NAME;  ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                         <!-- <h1 class="mt-4">Dashboard</h1> -->
                         <br/> 
                       <?php
                        check_message(); 
                        require_once $content;
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Library System 2019</div>
                            <div>
                              <!--   <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a> -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo web_root;?>admin/dist/js/scripts.js"></script> 
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo web_root;?>admin/dist/assets/demo/datatables-demo.js"></script>
        <script src="<?php echo web_root;?>admin/dist/js/bootstrap-datepicker.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo web_root;?>admin/dist/js/inputmask/jquery.inputmask.js" charset="utf-8"></script>
    </body>
<script type="text/javascript">
  $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose:1
});

$('.select2').select2({
  placeholder: 'Select a Borrower'
});

$('.Borrower').select2({
  placeholder: 'Select a Borrower'
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



$('#Category').on("change",function(){ 
    var categ = $(this).val();

     // alert(categ);

     $.ajax({
        type: "POST",
        url: 'deweydecimal.php',
        data: {category: categ}, 
         success:function(data) { 
            // alert(data);
            $('#DDecimal').val(data);
         }
    });

});




$(function(){ 
    var categ = $('#Category').val(); 
     // alert(categ);

     $.ajax({
        type: "POST",
        url: 'deweydecimal.php',
        data: {category: categ}, 
         success:function(data) { 
            // alert(data);
            $('#DDecimal').val(data);
         }
    });

});

 
// $(":input").inputmask();

// $("#phone").inputmask({"mask": "(999) 999-9999"});

    $("#datepicker").inputmask("datetime", {
        inputFormat: "yyyy-mm-dd",
        outputFormat: "yyyy-mm-dd",
        inputEventOnly: true
    });

</script>
</html>

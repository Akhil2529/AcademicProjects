  <!-- Start Service Section -->
        <section id="service-section">
            <div class="container">
                <div class="row">


 <?php  check_message(); ?>
                      <div class="col-md-4"></div>
                        <div class="col-md-4">
                              <form class="form-horizontal span4" action="" method="POST" autocomplete="off">
                            <div class="pricing">
                                <div class="pricing-header">
                                    <i class="fa fa-lock"></i>  
                                </div>
                                <div class="pricing-body">

                                     <div class="form-group" id="Username">
                                            <div class="row">
                                              <label class="col-md-2 control-label" for=
                                              "Username">Username:</label>

                                              <div class="col-md-10">
                                                 <input class="form-control input-lg" id="Username" name="Username" placeholder=
                                                                      "Username" type="text" value="">
                                              </div>

                                            </div> 
                                          </div> 
                                          <div class="form-group" id="password">
                                            <div class="row">
                                               <label class="col-md-2 control-label" for=
                                                "password">Password:</label>

                                                <div class="col-md-10">
                                                  <input class="form-control input-lg" id="password" name="password" type=
                                                  "password" placeholder="Password">
                                                </div>

                                            </div>

                                          </div>
                                            
                                        <div class="form-group" id="subjcode">
                                            <div class="row">
                                               <div class="col-md-2"></div>

                                                <div class="col-md-4"> 
                                                   <button type="submit" name="btnLogin" class="btn btn-primary btn-lg" style="width: 100%"><i class="fa fa-key"></i> Login</button>  
                                                </div>

                                            </div>

                                          </div>
                                     
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="col-md-4"></div>  
                </div>
            </div>
        </section>


<?php
if (isset($_SESSION['BorrowerId'])) {
    # code...
    redirect(web_root."index.php");
}
$bookid  = isset($_GET['id']) ? $_GET['id']:'';

if(isset($_POST['btnLogin'])){
    $email = trim($_POST['Username']);
    $upass  = trim($_POST['password']);
    $h_upass = sha1($upass);

        if ($email == '' OR $upass == '') {

            message("Invalid Username and Password!", "error");
            redirect("index.php?q=login&id=".$bookid);

        } else {
        //it creates a new objects of member
            $borrower = new Borrower();
            //make use of the static function, and we passed to parameters
            $res = $borrower::borrowerAuthentication($email, $h_upass);
            if ($res==true) { 

                if ($bookid=='') {
                    # code...
                 redirect(web_root."borrower/");
                }else{

                 redirect(web_root."index.php?q=checkout&id=".$bookid);
                } 
            }else{
                message("Account does not exist! Please contact Administrator.", "error");
                redirect("index.php?q=login&id=".$bookid);
            }
        }
 }
 ?> 
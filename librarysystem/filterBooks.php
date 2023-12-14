  <style type="text/css">
    .layer{
        border-top: 1px solid #ddd;
        padding: 10px;
    }
    .layer:hover{
        background-color: #F5F8FA;
    }

    .title{
        font-weight: bold; 
    }
    .desc {

    } 
    .searchagain{
        font-size: 20px; 
        font-weight: bold;
        margin-bottom: 5px;
        color: #FF432E;

    }
</style>

        <!-- End Header Section --> 
   <?php if (!isset($_POST['search'])){   ?>
        <!-- Start Service Section -->
        <section id="service-section">
            <div class="container">
                <div class="row">
                       <div class="col-md-3"></div>
        
                        <div class="col-md-6">
                              <form class="form-horizontal span4" action="#.php" method="POST" autocomplete="off">
                            <div class="pricing">
                                <div class="pricing-header">
                                    <!-- <i class="fa fa-search"></i>   -->
                                  <h3>Query Option</h3>
                                </div>
                                <div class="pricing-body">

                                     <div class="form-group" id="BookTitle">
                                            <div class="row">
                                              <label class="col-md-2 control-label" for=
                                              "BookTitle">Title:</label>

                                              <div class="col-md-10">
                                                 <input class="form-control input-lg" id="BookTitle" name="BookTitle" placeholder=
                                                                      "Title" type="text" value="">
                                              </div>

                                            </div> 
                                          </div>
                                          <div class="form-group" id="Category">
                                            <div class="row">
                                             <label class="col-md-2 control-label" for=
                                                "Category">Category:</label>

                                                <div class="col-md-10">
                                                 <select class="form-control input-lg" name="Category" id="Category">
                                                    <option value="">Select Book Category</option>
                                                    <?php
                                                    $category = new Category();
                                                    $cur = $category->listOfcategory(); 
                                                    foreach ($cur as $category) {
                                                        echo '<option>'.$category->Category .'</option>';
                                                    }

                                                    ?>
                                                        
                                                    </select>   
                                                </div>

                                            </div>

                                          </div>
                                          <div class="form-group" id="Author">
                                            <div class="row">
                                               <label class="col-md-2 control-label" for=
                                                "Author">Author:</label>

                                                <div class="col-md-10">
                                                  <input class="form-control input-lg" id="Author" name="Author" type=
                                                  "text" placeholder="Author">
                                                </div>

                                            </div>

                                          </div>
                                           <div class="form-group" id="BookPublisher">
                                            <div class="row">
                                               <label class="col-md-2 control-label" for=
                                                "BookPublisher">Publisher:</label>

                                                <div class="col-md-10">
                                                  <input class="form-control input-lg" id="BookPublisher" name="BookPublisher" type=
                                                  "text" placeholder="Publisher">
                                                </div>

                                            </div>

                                          </div>
                                           <div class="form-group" id="PublishDate">
                                            <div class="row">
                                               <label class="col-md-2 control-label" for=
                                                "PublishDate">Date:</label>

                                                <div class="col-md-10">
                                                  <input class="form-control input-lg datepicker" id="datepicker" name="PublishDate" type=
                                                  "text" placeholder="Published Date"   data-inputmask="'alias': 'date'">
                                                </div>

                                            </div>

                                          </div>

                                        <div class="form-group" id="subjcode">
                                            <div class="row">
                                               <div class="col-md-2"></div>

                                                <div class="col-md-10"> 
                                                   <button type="submit" name="search" class="btn btn-primary btn-lg" style="width: 100%"><i class="fa fa-search"></i> Search</button>  
                                                </div>

                                            </div>

                                          </div>
                                     
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="col-md-3"></div>
 
                </div>
            </div>
        </section>
        <!-- Start Service Section -->
        
      

 <?php }else{ ?>

     <section id="service-section">
            <div class="container">
                <div class="row">
  <div class="searchagain">Result ....</div>

 
<?php 

$title = $_POST['BookTitle'];
$category = $_POST['Category'];
$author = $_POST['Author'];
$publisher = $_POST['BookPublisher'];
$publisheddate = $_POST['PublishDate'];



                $mydb->setQuery("SELECT * FROM `tblbooks` 
                        WHERE Status = 'Available' AND ( BookTitle LIKE '%{$title}%' AND  Category LIKE '%{$category}%' AND  Author LIKE '%{$author}%' AND  BookPublisher LIKE '%{$publisher}%' AND  PublishDate LIKE '%{$publisheddate}%')"); 
                $e = $mydb->executeQuery();
                $maxrow = $mydb->num_rows($e);

                if ($maxrow  > 0) { 
                $cur = $mydb->loadResultlist();
                foreach ($cur as $result) {
              //        echo '<tr>';  
                    // echo '<td >' . $result->IBSN.'</td>';
                    // echo '<td >'. $result->BookTitle.'</td>';
                    // echo '<td>'.  $result->BookDesc.'</td>'; 
                    // echo '<td>'. $result->Category.'</td>'; 
                    // echo '<td>'. $result->Author.'</td>';
                    // echo '<td>'. $result->BookPrice.'</td>';
                    // echo '<td>'. $result->Status.'</td>'; 
                    // echo '</tr>';  

                echo '<div class="layer">
                        <a href="">
                            <div class="title"  ><a href="index.php?q=bookdetails&id='.$result->IBSN.'">'. $result->BookTitle.'</a></div> 
                            <div class="desc">IBSN : ' . $result->IBSN.' .. '.  $result->BookDesc.' .. '.  $result->Category.'<br/>Author : '. $result->Author.'</div>
                        </a>
                    </div>'; 
 
                } 
              }else{
                 echo '<div class="layer">
                        <a href="">
                            <div class="title"  >No Record Found!</div> 
                            
                        </a>
                    </div>'; 

              }
        ?>
   
 
                </div>
            </div>
        </section>

 <?php }?>
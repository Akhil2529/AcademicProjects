  <?php 
    $category = isset($_GET['category']) ? $_GET['category'] : ''; 
    $page = isset($_GET['page']) ? $_GET['page'] : 1; 
 
        $no_of_records_per_page = 10;
        $offset = ($page-1) * $no_of_records_per_page; 

        $total_pages_sql = "SELECT * FROM tblbooks WHERE Status='Available' AND Category LIKE '%$category%' "; 
        $mydb->setQuery($total_pages_sql);
        $cur = $mydb->executeQuery();
        $total_rows = $mydb->num_rows($cur);
        $total_pages = ceil($total_rows / $no_of_records_per_page);
 
        $sql = "SELECT * FROM `tblbooks`  WHERE Status='Available' AND Category LIKE '%$category%' LIMIT $offset, $no_of_records_per_page"; 
        $mydb->setQuery($sql);
        $cur = $mydb->executeQuery();
        $maxrow = $mydb->num_rows($cur);

    
   ?>
        
        <!-- Start Blog Page Section -->
        <div class="container">
            <div class="row">

                
                <!-- Start Blog Body Section -->
                <div class="col-md-8 blog-body"> 

                     <?php
  

                        $sql = "SELECT * FROM `tblbooks`  WHERE Category LIKE '%$category%' GROUP BY BookTitle LIMIT $offset, $no_of_records_per_page"; 
                        $mydb->setQuery($sql);
                        $cur = $mydb->loadResultlist();
                        foreach ($cur as $result) {

                     ?>
                              <!-- Start Blog post -->
                            <div class="blog-post"> 
                                <h1 class="post-title"><a href="index.php?q=bookdetails&id=<?php echo $result->IBSN;?>"><?php echo $result->BookTitle;?></a></h1>
                                
                                <ul class="post-meta">
                                    <li><i class="fa fa-calendar"> </i><?php echo $result->PublishDate;?></li>
                                    <li><i class="fa fa-user"> </i> <?php echo $result->Author;?></li>
                                    <li><i class="fa fa-tags"> </i><a href="index.php?q=books&category=<?php echo $result->Category;?>"><?php echo $result->Category;?></a></li>    
                                </ul>
                                
                                <p class="post-content"> <?php echo $result->BookDesc;?></p>
                                <a href="index.php?q=bookdetails&id=<?php echo $result->IBSN;?>" class="btn btn-primary ">Read more...<i class="fa fa-angle-right"></i></a>
                            </div>
                            <!-- End Blog Post -->

    
                      <?php  }     ?>

          
                    <!-- Start Pagination -->         
                    <nav>
                    <?php if ($maxrow > 0) { ?>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="index.php?q=books&category=<?php echo $category;?>&page=1">First</a></li>
                        <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "index.php?q=books&category=".$category."&page=".($page - 1); } ?>">Prev</a>
                        </li>
                        <li class="page-item <?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "index.php?q=books&category=".$category."&page=".($page + 1); } ?>">Next</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="index.php?q=books&category=<?php echo $category;?>&page=<?php echo $total_pages; ?>">Last</a></li>
                    </ul>
                    <?php }else{ echo '<h1>No Record Found!</h1>';} ?> 
                    </nav>
                    <!-- 
                    <nav>
                        <ul class="pagination">
                            <li class="disabled"><a href="#" aria-label="Start">Start</a></li>
                            <li class="disabled"><a href="#" aria-label="Previous">Prev</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">Next</a></li>
                            <li><a href="#">End</a></li>
                        </ul>
                    </nav> -->
                    <!-- End Pagination -->
                    
                </div>
                <!-- End Blog Body Section -->
                
                                <!-- Start Sidebar Section -->
                <div class="col-md-4 sidebar right-sidebar">
                     
                    
                    <!-- Start Blog categories widget -->
                    <div class="widget widget-categories">
                        
                        <div class="section-heading-2">
                            <h3 class="section-title">
                                <span>Book Categories</span>
                            </h3>
                        </div>
                        <style type="text/css">
                            .selected{
                                color: #FF432E;
                            }
                        </style>
                        <ul>
                             <?php
                                $category = new Category();
                                $cur = $category->listOfcategory(); 
                                foreach ($cur as $category) { 
                                    if ($category==$category->Category) {
                                        # code...
                                         echo ' <li style="color:#FF432E">
                                                <i class="fa fa-angle-double-right"></i>
                                                <a  style="color:#FF432E" href="index.php?q=books&category='.$category->Category.'">'.$category->Category .'</a> 
                                            </li> ';
                                    }else{
                                             echo '<li>
                                                <i class="fa fa-angle-double-right"></i>
                                                <a   href="index.php?q=books&category='.$category->Category.'">'.$category->Category .'</a> 
                                            </li> ';
                                    }
                                   
                                }
                            ?>
                           
                        </ul>
                        
                    </div>
                    <!-- End Blog categories widget -->
          
                </div>
                <!-- End Sidebar Section -->

                
            </div>
        </div>
        <!-- End Blog Page Section -->
        
        
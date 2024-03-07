        <!-- /top navigation -->

       
              <div class="right_col" role="main">
                <div class="">

                  <div class="page-title">
                    <div class="title_left">
                      <h3>Blog Posts</h3>
                    </div>

                    <div class="title_right">
                      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="clearfix"></div>       

      <?php if (isset($_GET['success'])){ ?>
        <div class="col-md-12 text-center" style='background: green; color: white; padding: 0.2em; margin-bottom: 2px;'>
          <span>BLOG POST SUCESSFULLY UPDATED</span>
        </div>

      <?php } ?>

                <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                       <div class="x_panel">
                         <div class="x_title">
                           <a href='index.php?new_post'class='btn btn-info btn-lg'>
                            Add Post
                          </a>
                           <ul class="nav navbar-right panel_toolbox">
                             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                             </li>
                             <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                               <ul class="dropdown-menu" role="menu">


                               </ul>
                             </li>
                             <li><a class="close-link"><i class="fa fa-close"></i></a>
                             </li>
                           </ul>
                           <div class="clearfix"></div>
                         </div>

                         <div class="x_content">
                        
                           <table id="datatable" class="table table-striped table-bordered">
                             <thead style="background:#2A3F54; color:#fff;">
                               <tr>
                                 <th>S.N</th>
                                 <th>Title</th>
                                 
                                 <th>Action</th>
                               </tr>
                             </thead>
                             <tbody>
                                 <?php 
     
                                    $split = 0;
                                    $perpage = 20;

                                    if(isset($_GET["page"])){
                                    $page = intval($_GET["page"]);
                                    }
                                    else {
                                    $page = 1;
                                    }
                                    $calc = $perpage * $page;
                                    $start = $calc - $perpage;
                                    $result = mysqli_query($con, "SELECT * from blog_posts Limit $start, $perpage");
                                    $j = 0;
                                    $rows = mysqli_num_rows($result);       
                                    if($rows){
                                    $i = 0;                                
                                    while     ($row = mysqli_fetch_assoc($result)) {
                                          
                                                $post_id=$row['postID'];
                                                $post_title=$row['postTitle'];                            
                                                $j++;
                                   ?>
                
                            
                               <tr>
                               
                                <td><?php echo $j; ?></td>
                                 <td><?php  echo $post_title?></td>
                                 
                                
                                
                                 <td>
                                   <!-- Split button -->

                                   <div class="btn-group">
                                   
                                    <a href="index.php?edit_post&&id=<?php echo $post_id;?>" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>                           
                                       
                                  <a href="delete_post.php?delete_post=<?php echo $post_id;?>" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>

                                    

                                   </div>


                                   <!-- Split button -->
                                 </td>

                               </tr>

                               <?php } } ?>


                             </tbody>
                           </table>

                           <nav class='page_links'>

                           <?php
                                if(isset($page))
                                {
                                $result = mysqli_query($con,"SELECT Count(*) As Total from blog_posts");
                                $rows = mysqli_num_rows($result);
                                if($rows)
                                {
                                $rs = mysqli_fetch_assoc($result);
                                $total = $rs["Total"];
                                }
                                $totalPages = ceil($total / $perpage);
                                if($page <=1 ){
                                echo "<span id='page_a_link' style='font-weight: bold;'>Prev</span>";
                                }else{
                                $j = $page - 1;
                                echo "<span><a id='page_a_link' href='index.php?page=$j'>< Prev</a></span>";
                                }for($i=1; $i <= $totalPages; $i++)
                                {
                                if($i<>$page)
                                {
                                echo "<span><a id='page_a_link' href='index.php?page=$i'>$i</a></span>";
                                }else{
                                echo "<span id='page_links' style='font-weight: bold;'>$i</span>";
                                }
                                }
                                if($page == $totalPages )
                                {
                                echo "<span id='page_a_link' style='font-weight: bold;'>Next ></span>";
                                }else
                                {
                                $j = $page + 1;
                                echo "<span><a id='ppage_a_link' href='index.php?page=$j'>Next</a></span>";
                                }
                                }
                          ?>
                        </nav>
                         </div>
                       </div>
                     </div>
                   </div>
<?php include 'header.php'; ?>
<!-- main content  -->

<section class="main-content">
  <div class="container-xl">
    <div class="row gy-4">
      <!-- left part 1st section  -->
      <div class="col-lg-8">
        <!-- <div class="section-header">
                            <h3 class="section-title">Editor's Pick</h3>
                        </div> -->

        <div class="padding-30 rounded bordered">
          <div class="row gy-5">
            <div>



              <?php

              include "config.php";
              if (isset($_GET['id'])) {
                $id = $_GET['id'];
              }
              $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,user.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id
WHERE post.post_id=$id
";


              $result = mysqli_query($connection, $query) or die("Failed");
              $count = mysqli_num_rows($result);
              if ($count > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                  $taken = $row['category'];
                  $pid = $row['post_id'];

              ?>



                  <!-- post  -->
                  <div class="post">

                    <div class="postimg">
                      <a href="#">
                        <div>
                          <img src="admin/upload/<?php echo $row['post_img'] ?>" alt="" />
                        </div>
                      </a>

                    </div>
                    <ul class="meta list-inline mt-4 mb-0">
                      <li class="list-inline-item">
                        <a href="#">
                          <img class="author" src="images/other/mahim.jpg" alt="" />
                          <?php echo $row['username'] ?>
                        </a>
                      </li>
                      <li class="list-inline-item"><?php echo $row['post_date'] ?></li>
                      <li class="list-inline-item"><?php echo $row['category_name'] ?></li>
                    </ul>
                    <h4 class="post-title mb-3 mt-3">
                      <?php echo $row['title'] ?>
                    </h4>
                    <p class="ps excerpt mb-0">
                      <?php echo $row['description'] ?>

                    </p>
                  </div>
              <?php }
              } else {
                echo "No post found";
              }


              ?>

            </div>
          </div>
        </div>
        <!----------- Comment Section----------- -->




        <div class="spacer" data-height="30"></div>




        <h6>Comment Here</h6>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
          <div class="col-lg-6">
            <div class="mb-3">
              <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
          </div>
          <div class="mb-3">
            <textarea class="form-control" id="message" rows="2" name="message" placeholder="Add a comment..." required></textarea>
          </div>
          <button type="submit" name="cmnt" class="btn btn-primary">Comment</button>
        </form>
        <br>
        <?php
        include 'config.php';
        if (isset($_POST['cmnt'])) {
          $name = $_POST['name'];
          $message = $_POST['message'];

          $time = date("d M,Y h:i A");
          $query = "INSERT INTO comment (id,name,message,time) VALUES ('$pid','$name','$message','$time')";
          $result = mysqli_query($connection, $query);
        }
        $limit = 6;
        $query3 = "SELECT * FROM comment
          WHERE id=$pid
          ORDER BY cmntid DESC";


        $result3 = mysqli_query($connection, $query3) or die("Failed");
        $count3 = mysqli_num_rows($result3);
        if ($count3 > 0) {

          while ($row1 = mysqli_fetch_assoc($result3)) {
            if ($limit == 0) break;
            $limit--;
        ?>
            <span style="font-size:20px;margin-right:5px"><i class="fas fa-user"></i></span><b><span style="color:#414a4c;font-size: 15px;margin-right:3px"><?php echo $row1['name'] ?></span></b>
            <span style="font-size: 15px;"> <?php echo $row1['message'] ?><br>
              <span style="font-size:12px;"><?php echo $row1['time'] ?></span>
              <br><br>



          <?php
          }
        }
          ?>





          <!-- <section id="latest"> -->
          <div class="spacer" data-height="50"></div>

          <div class="section-header" id="latest">
            <h3 class="section-title">Related Posts</h3>
          </div>

          <div class="padding-30 rounded bordered">
            <div class="row">
              <div class="col-md-12 col-sm-6">



                <?php




                include "config.php";
                $limit = 5;
                if (isset($_GET['id'])) {
                  $id = $_GET['id'];
                }
                if (isset($_GET['page'])) {
                  $page_number = $_GET['page'];
                } else {
                  $page_number = 1;
                }

                $offset = ($page_number - 1) * $limit;

                $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,user.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id WHERE post.category={$taken}
ORDER BY post.post_id DESC LIMIT {$offset},{$limit}

";


                $result = mysqli_query($connection, $query) or die("Failed");
                $count = mysqli_num_rows($result);

                if ($count > 0) {

                  while ($row = mysqli_fetch_assoc($result)) {

                    if ($row['post_id'] == $pid) continue;

                ?>


                    <!-- post  -->
                    <div class="post post-list clearfix">
                      <div class="thumb rounded">
                        <span class="post-format-sm">
                          <i class="icon-picture"></i>
                        </span>
                        <a href="single.php?id=<?php echo $row['post_id'] ?>">
                          <div class="inner">
                            <img src="admin/upload/<?php echo $row['post_img'] ?>" alt="">
                          </div>
                        </a>
                      </div>
                      <div class="details">
                        <ul class="meta list-inline mb-3">
                          <li class="list-inline-item">
                            <a href="#">
                              <img src="images/other/mahim.jpg" class="author" alt="">
                              <?php echo $row['username'] ?>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#"><?php echo $row['category_name'] ?></a>
                          </li>
                          <li class="list-inline-item"><?php echo $row['post_date'] ?></li>
                        </ul>
                        <h5 class="post-title">
                          <a href="single.php?id=<?php echo $row['post_id'] ?>">
                            <?php echo $row['title'] ?>
                          </a>
                        </h5>
                        <p class="excerpt mb-0">
                          <?php echo substr($row['description'], 0, 80) . "..." ?>
                        </p>
                        <div class="post-bottom clearfix d-flex align-items-center">
                          <div class="social-share me-auto">
                            <button class="toggle-button icon-share"></button>
                            <ul class="icons list-unstyled list-inline mb-0">
                              <li class="list-inline-item">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#"><i class="fab fa-telegram-plane"></i></a>
                              </li>
                              <li class="list-inline-item">
                                <a href="#"><i class="far fa-envelope"></i></a>
                              </li>
                            </ul>
                          </div>
                          <div class="more-button float-end">
                            <a href="#"><span class="icon-options"></span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php }
                } else {
                  echo "No post found";
                }

                ?>
              </div>
              <div class="text-center">
                <?php
                /*  $query2 = "SELECT * FROM post WHERE post.category={$taken}";
                  $result2 = mysqli_query($connection, $query2) or dir("Failed."); */
                /*  if (mysqli_num_rows($result2)) {
                    $total_records = mysqli_num_rows($result2);
                    $total_page = ceil($total_records / $limit);
 */

                /*  echo '<li class= "page-item ' . $active . '"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>'; */
                /*  echo '<li class=' . $active . '><a href="index.php?page=' . $i . '">' . $i . '</a></li>'; */

                /*  if ($total_page > $page_number) {
                      echo '<a  aria-label="Next" href="single.php?id=' . ($page_number + 1) . '"><button class="btn btn-simple"><span aria-hidden="true">Load More</button></span></a>';
                    }
                  }
 */

                ?>

                <!-- <button class="btn btn-simple">Load More</button> -->
              </div>
            </div>
          </div>

          <!-- left part over here  -->
      </div>
      <!-- </section> -->
      <!-- right part starts from here  -->

      <div class="col-lg-4">
        <div class="sidebar">
         

          <div class="widget rounded">
            <div class="widget-header text-center">
              <h3 class="widget-title">Technology</h3>
            </div>
            <div class="widget-content">
              <?php

              include "config.php";
              $limit = 4;

              $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,user.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id
ORDER BY post.post_id DESC ";


              $result = mysqli_query($connection, $query) or die("Failed");
              $count = mysqli_num_rows($result);

              if ($count > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                  if ($limit == 0) break;
                  if ($row['category_name'] != "Technology") continue;
                  $limit--;


              ?>



                  <div class="post post-list-sm circle">
                    <div class="thumb circle">
                      <!-- <span class="number">1</span> -->
                      <a href="single.php?id=<?php echo $row['post_id'] ?>">
                        <div class="inner">
                          <img src="admin/upload/<?php echo $row['post_img'] ?>" alt="">
                        </div>
                      </a>
                    </div>
                    <div class="details clearfix">
                      <h6 class="post-title my-0">
                        <a href="single.php?id=<?php echo $row['post_id'] ?>"><?php echo $row['title'] ?></a>
                      </h6>
                      <ul class="meta list-inline mt-1 mb-0">
                        <li class="list-inline-item"><?php echo $row['post_date'] ?></li>
                      </ul>
                    </div>
                  </div>


              <?php }
              } else {
                echo "No post found";
              }


              ?>


            </div>
          </div>

          <div class="widget rounded">
            <div class="widget-header text-center">
              <h3 class="widget-title">Explore Topics</h3>
            </div>
            <div class="widget-content">
              <ul class="list">
                <?php
                include "config.php";

                $query = "SELECT * from category";


                $result = mysqli_query($connection, $query) or die("Failed");
                $count = mysqli_num_rows($result);

                if ($count > 0) {

                  while ($row = mysqli_fetch_assoc($result)) {

                ?>






                    <li><a href="catpage.php?catname=<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></a><span>(<?php echo $row['post'] ?>)</span></li>

                <?php }
                } else {
                  echo "No post found";
                }


                ?>

              </ul>
            </div>
          </div>



          <?php

          if (isset($_POST['sub'])) {

            include 'config.php';

            $sub_email = mysqli_real_escape_string($connection, $_POST['sub_email']);


            $query = "SELECT sub_email FROM subscriber WHERE sub_email='$sub_email'";
            $result = mysqli_query($connection, $query) or die("Query faild.");

            $count = mysqli_num_rows($result);
            if ($count > 0) {
              echo "You have already subscribed.";
            } else {
              $query1 = "INSERT INTO subscriber (sub_email) 
VALUES ('$sub_email')";
              $result = mysqli_query($connection, $query1) or die("Query Failed.");
              echo "Thank you for your subscription.";
              $to_email = $sub_email;
              $subject = "Subscription Successful to JU CSE";
              $body = "You have successfully subscribed to JU CSE. You will get notifications of all news from JU CSE. Stay tuned. Thank you. ";
              $headers = "From: JU CSE";
              mail($to_email, $subject, $body, $headers);
            }
          }


          ?>
          <div class="widget rounded">
            <div class="widget-header text-center">
              <h3 class="widget-title">Newsletter</h3>
            </div>
            <div class="widget-content">
              <span class="newsletter-headline text-center mb-3">Join 50,000 subscribers</span>
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-2">
                  <input type="email" name="sub_email" class="form-control w-100 text-center" placeholder="Email address...">
                </div>
                <input type="submit" name="sub" class="btn btn-default btn-full" value="subscribe">

              </form>
              <span class="newsletter-privacy text-center mt-3">
                Subscribe for receiveing notifications of all news
                <!--  <a href="#">Privacy policy</a> -->
              </span>
            </div>
          </div>

          <div class="widget rounded">
            <div class="widget-header text-center">
              <h3 class="widget-title">COVID-19</h3>
            </div>
            <div class="widget-content">
              <div class="post-carousel-widget">


                <?php

                include "config.php";
                $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,user.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id
ORDER BY post.post_id DESC ";


                $result = mysqli_query($connection, $query) or die("Failed");
                $count = mysqli_num_rows($result);

                if ($count > 0) {

                  while ($row = mysqli_fetch_assoc($result)) {

                    if ($row['category_name'] != "Covid-19") continue;



                ?>


                    <div class="post post-carousel">
                      <div class="thumb rounded">
                        <a href="#" class="category-badge position-absolute"><?php echo $row['category_name'] ?></a>
                        <a href="single.php?id=<?php echo $row['post_id'] ?>">
                          <div class="inner">
                            <img src="admin/upload/<?php echo $row['post_img'] ?>" alt="">
                          </div>
                        </a>
                      </div>
                      <h5 class="post-title mb-0 mt-4">
                        <a href="single.php?id=<?php echo $row['post_id'] ?>"><?php echo $row['title'] ?></a>
                      </h5>
                      <ul class="meta list-inline mt-2 mb-0">
                        <li class="list-inline-item">
                          <a href="#"><?php echo $row['username'] ?></a>
                        </li>
                        <li class="list-inline-item"><?php echo $row['post_date'] ?></li>
                      </ul>
                    </div>

                <?php }
                } else {
                  echo "No post found";
                }


                ?>

              </div>
              <div class="slick-arrows-bot">
                <buttton class="carousel-botNav-prev slick-custom-buttons" type="button" data-role="none" aria-label="Previous">
                  <i class="icon-arrow-left"></i>
                </buttton>
                <buttton class="carousel-botNav-next slick-custom-buttons" type="button" data-role="none" aria-label="Next">
                  <i class="icon-arrow-right"></i>
                </buttton>
              </div>

            </div>
          </div>


          <div class="widget rounded">
            <div class="widget-header text-center">
              <h3 class="widget-title">Tag Clouds</h3>
            </div>
            <div class="widget-content">
              <?php
              include "config.php";

              $query = "SELECT * from category";


              $result = mysqli_query($connection, $query) or die("Failed");
              $count = mysqli_num_rows($result);

              if ($count > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

              ?>

                  <a href="#" class="tag">#<?php echo $row['category_name'] ?></a>
              <?php }
              } else {
                echo "No post found";
              }


              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
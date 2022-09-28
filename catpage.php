<?php include 'header.php'; ?>


<!-- main content  -->

<section class="main-content">
    <div class="container-xl">
        <div class="row gy-4">


            <div class="col-lg-8">


                <!--------------------- categorywise-------------- -->
                <div class="spacer"></div>

                <div class="section-header" id="latest">
                    <h3 class="section-title"><?php
                                                if (isset($_GET['catname'])) {
                                                    $catid = $_GET['catname'];
                                                }

                                                if ($catid == 1) {
                                                    echo 'Competitive ';
                                                } else if ($catid == 2) {
                                                    echo 'Sports ';
                                                } else if ($catid == 3) {
                                                    echo 'Academic ';
                                                } else if ($catid == 4) {
                                                    echo 'Alumni ';
                                                } else if ($catid == 5) {
                                                    echo 'Technology ';
                                                } else if ($catid == 6) {
                                                    echo 'Entertainment ';
                                                } else if ($catid == 7) {
                                                    echo 'Covid-19 ';
                                                } else if ($catid == 0) {
                                                    echo 'Latest ';
                                                }


                                                ?>News</h3>
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <?php

                            if ($catid == 0) {
                                include "config.php";
                                $limit = 6;

                                if (isset($_GET['page'])) {
                                    $page_number = $_GET['page'];
                                } else {
                                    $page_number = 1;
                                }

                                $offset = ($page_number - 1) * $limit;

                                if (isset($_GET['catname'])) {
                                    $catname = $_GET['catname'];
                                }
                                $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,user.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id
ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";


                                $result = mysqli_query($connection, $query) or die("Failed");
                                $count = mysqli_num_rows($result);
                            } else {
                                include "config.php";
                                $limit = 6;

                                if (isset($_GET['page'])) {
                                    $page_number = $_GET['page'];
                                } else {
                                    $page_number = 1;
                                }

                                $offset = ($page_number - 1) * $limit;

                                if (isset($_GET['catname'])) {
                                    $catname = $_GET['catname'];
                                }
                                $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,user.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id WHERE post.category={$catname}
ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";


                                $result = mysqli_query($connection, $query) or die("Failed");
                                $count = mysqli_num_rows($result);
                            }
                            if ($count > 0) {

                                while ($row = mysqli_fetch_assoc($result)) {


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
                            /* $query2 = "SELECT * FROM post "; */
                            if ($catid == 0) {
                                $query2 = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,user.username FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id";
                            } else {
                                $query2 = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, category.category_name,user.username FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id WHERE post.category={$catname}";
                            }


                            $result2 = mysqli_query($connection, $query2) or dir("Failed.");
                            if (mysqli_num_rows($result2)) {
                                $total_records = mysqli_num_rows($result2);
                                $total_page = ceil($total_records / $limit);

                                echo "<ul class='pagination pagination-sm'>";
                                if ($page_number > 1) {
                                    echo '<li class="page-item"><a class="page-link" aria-label="Previous" href="catpage.php?page=' . ($page_number - 1) . '&catname=' . ($catid) . '"><span aria-hidden="true">&laquo;</span></a></li>';
                                }

                                for ($i = 1; $i <= $total_page; $i++) {

                                    if ($i == $page_number) {
                                        $active = "active";
                                    } else {
                                        $active = "";
                                    }
                                    echo '<li class= "page-item ' . $active . '"><a class="page-link" href="catpage.php?page=' . $i . '&catname=' . ($catid) . '">' . $i . '</a></li>';
                                }
                                if ($total_page > $page_number) {
                                    echo '<li class="page-item"><a class="page-link" aria-label="Next" href="catpage.php?page=' . ($page_number + 1) . '&catname=' . ($catid) . '"><span aria-hidden="true">&raquo;</span></a></li>';
                                }
                                echo "</ul>";




                                /* if ($total_page > $page_number) {
                                            echo '<a  aria-label="Next" href="catpage.php?page=' . ($page_number + 1) . '&catname=' .($catid).'"><button class="btn btn-simple"><span aria-hidden="true">Load More</button></span></a>';
                                        } */
                            }


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
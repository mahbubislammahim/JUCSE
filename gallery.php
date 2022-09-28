<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JU CSE -Know the news</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--  <link rel="stylesheet" href="css/bootstrap.min1.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/gallerystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel=" stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/font-awesome.css">

</head>

<body>
    <div class="site-wrapper">
        <div class="main-overlay"></div>
        <header class="header-default">
            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">
                    <!-- logo  -->
                    <a href="index.php" class="navbar-brand">
                        <img src="images/logo.svg" alt="">
                    </a>

                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                                <a href="index.php" class="nav-link dropdown-toggle">Home</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="catpage.php?catname=3" class="dropdown-item">Academic</a>
                                    </li>
                                    <li>
                                        <a href="catpage.php?catname=1" class="dropdown-item">Competitive</a>
                                    </li>
                                    <li>
                                        <a href="catpage.php?catname=5" class="dropdown-item">Technology</a>
                                    </li>
                                    <li>
                                        <a href="catpage.php?catname=6" class="dropdown-item">Entertainment</a>
                                    </li>
                                    <li>
                                        <a href="catpage.php?catname=2" class="dropdown-item">Sports</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="catpage.php?catname=0" class="nav-link">Latest</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- right side of header  -->
                    <div class="header-right">
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>

                        <!-- buttons  -->
                        <div class="header-buttons">
                            <button class="search icon-button">
                                <i class="icon-magnifier"></i>
                            </button>
                            <button class="burger-menu icon-button">
                                <span class="burger-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>


        </header>

    </div>
    <div class="wrapper">
        <!-- filter Items -->
        <nav>
            <div class="items">
                    <h4 align="center">Photo Gallery of Depertment of Computer Science & Engnieering</h4>
            </div>
        </nav>
        <!-- filter Images -->
        <div class="gallery">
            <?php
            include "config.php";


            $query = "SELECT * FROM gallery 

         ORDER BY imageid DESC";


            $result = mysqli_query($connection, $query) or die("Failed");
            $count = mysqli_num_rows($result);

            if ($count > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

            ?>


                    <div class="image"><span><img src="admin/upload/<?php echo $row['image_url'] ?>" alt=""></span></div>
            <?php }
            } ?>
        </div>
    </div>
    <!-- fullscreen img preview box -->
    <div class="preview-box">
        <div class="details">
            <span class="title">
                <p></p>
            </span>
            <span class="icon fas fa-times"></span>
        </div>
        <div class="image-box"><img src="" alt=""></div>
    </div>
    <div class="shadow"></div>
    <script src="js/gallerymain.js"></script>

   
<footer>
<div class="container-xl">
    <div class="footer-inner">
        <div class="row d-flex align-items-center gy-4">
            <div class="col-md-4">
                <span class="copyright">&copy; 2021 JU CSE -Made by <a href="https://mahim-ju-cse.github.io/portfolio/">Mahim</a></span>
            </div>
            <div class="col-md-4 text-center">
                <ul class="social-icons list-unstyled list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <a href="#" id="return-to-top" class="float-md-end">
                    <i class="icon-arrow-up"></i>
                    Back to Top
                </a>
            </div>
        </div>
    </div>
</div>
</footer>




</div>


<!-- canvas menu  -->
<div class="canvas-menu d-flex align-items-end flex-column">
<button class="btn-close" aria-label="Close" type="button"></button>

<div class="logo">
<img src="images/logo.svg" alt="">
</div>
<nav>
<ul class="vertical-menu">
<li class="active">
        <a href="index.php">Home</a>
        <ul class="submenu">
            <li><a href="catpage.php?catname=3">Academic</a></li>
            <li><a href="catpage.php?catname=1">Competitive</a></li>
            <li><a href="catpage.php?catname=5">Technology</a></li>
            <li><a href="catpage.php?catname=6">Entertainment</a></li>
            <li><a href="catpage.php?catname=2">Sports</a></li>
        </ul>
    </li>
    <li><a href="catpage.php?catname=0">Latest</a></li>
    <li><a href="#">About Us</a></li>
    <li><a href="#">Contact</a></li>
</ul>
</nav>


<ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
<li class="list-inline-item">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
</li>
<li class="list-inline-item">
    <a href="#"><i class="fab fa-twitter"></i></a>
</li>
<li class="list-inline-item">
    <a href="#"><i class="fab fa-itunes"></i></a>
</li>
<li class="list-inline-item">
    <a href="#"><i class="fab fa-pinterest"></i></a>
</li>
<li class="list-inline-item">
    <a href="#"><i class="fab fa-youtube"></i></a>
</li>
</ul>
</div>


<!-- search pop up  -->
<div class="search-popup">
<button class="btn-close" aria-label="Close" type="button"></button>

<div class="search-content">
<div class="text-center">
    <h3 class="mb-4 mt-0">Type Here  and search</h3>
</div>

<form action="search.php" class="d-flex search-form" method="get">
    <input type="search" name="search" placeholder='You can also search by date like "17 sep"' aria-label="Search" class="form-control me-2" autofocus >
   <button class="btn btn-default btn-lg" type="submit">
        <i class="icon-magnifier"></i>
    </button>
</form>
</div>
</div>



<!-- javascripts  -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.sticky-sidebar.min.js"></script>
<script src="main.js"></script>

</body>

</html>
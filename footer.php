<div class="instagram">

<div class="container-xl">
    <a href="gallery.php" class="btn btn-default btn-instagram">Gallery</a>
    <div class="instagram-feed d-flex flex-wrap">


        <?php
        include "config.php";

        $query = "SELECT * from gallery ORDER BY imageid DESC";


        $result = mysqli_query($connection, $query) or die("Failed");
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $limit = 6;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($limit == 0) break;
                $limit--;

        ?>



                <div class="insta-item col-sm-2 col-6 col-md-2">
                    
                        <img src="admin/upload/<?php echo $row['image_url'] ?>" alt="">
                    
                </div>

        <?php }
        } else {
            echo "No photo found";
        }


        ?>
    </div>
</div>
</div>

<footer>
<div class="container-xl">
    <div class="footer-inner">
        <div class="row d-flex align-items-center gy-4">
            <div class="col-md-4">
                <span class="copyright">&copy; <?php echo date('Y') ?> JU CSE -Made by <a href="https://mahim-ju-cse.github.io/portfolio/">Mahim</a></span>
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
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact</a></li>
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
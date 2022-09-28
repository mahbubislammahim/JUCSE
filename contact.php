<?php include 'header.php'; ?>




<div class="container-xl">
    <div class="col-lg-8">
        <h4 align="center">Contact Form</h4>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name*</label>
                <input type="text" class="form-control" name="name" autofocus required>

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address*</label>
                <input type="email" class="form-control" name="email" required>

            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message*</label>
                <textarea class="form-control" id="message" rows="5" name="message" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Send message</button>
        </form>
        <?php
        include 'config.php';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $query = "INSERT INTO contact (name,email,message) VALUES ('$name','$email','$message')";
            $result = mysqli_query($connection, $query);
            if ($result) {
                /* echo "Message has been sent successfully."; */
               echo' <div style="margin-top:10px" class="alert alert-primary" role="alert">
               Message has been sent successfully.
               </div>';
            }
            else
            {
                echo' <div style="margin-top:10px" class="alert alert-danger" role="alert">
                Message has not been sent.
                </div>';
            }
        }

        ?>
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
            <h3 class="mb-4 mt-0">Type Here and search</h3>
        </div>

        <form action="search.php" class="d-flex search-form" method="get">
            <input type="search" name="search" placeholder='You can also search by date like "17 sep"' aria-label="Search" class="form-control me-2" autofocus>
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
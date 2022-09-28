
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Image upload</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="upload.php" method="POST" enctype="multipart/form-data">
                     
                      <div class="form-group">
                          <label for="exampleInputPassword1"></label>
                          <input type="file" name="fileup" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="upload" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>




          <div class="col-md-12">

        <?php

        include "config.php";
        $limit = 10;

        if (isset($_GET['page'])) {
          $page_number = $_GET['page'];
        } else {
          $page_number = 1;
        }

        $offset = ($page_number - 1) * $limit;


          $query = "SELECT * FROM gallery 

         ORDER BY imageid DESC LIMIT {$offset},{$limit}";
        

        $result = mysqli_query($connection, $query) or die("Failed");
        $count = mysqli_num_rows($result);

        if ($count > 0) {

        ?>
          <table class="content-table">
            <thead>
              <th>S.No.</th>
              <th>Image</th>
              <th>Delete</th>
            </thead>
            <tbody>
              <?php
              $serial_number = 1;
              while ($row = mysqli_fetch_assoc($result)) {

              ?>
                <tr>
                  <td class='id'><?php echo $serial_number++ ?></td>
                  <td><img height="50px" src="upload/<?php echo $row['image_url'] ?>"></td>
                  <td class='delete'><a onclick="return confirm('Are You Sure?')" href='deleteimg.php?id=<?php echo $row['imageid'] ?>'><i class='fa fa-trash-o'></i></a></td>


                </tr>
              <?php } ?>
            </tbody>
          <?php } ?>
          </table>

          <?php

          include "config.php";
          $query2 = "SELECT * FROM gallery";
          $result2 = mysqli_query($connection, $query2) or dir("Failed.");
          if (mysqli_num_rows($result2)) {
            $total_records = mysqli_num_rows($result2);
            $total_page = ceil($total_records / $limit);

            echo "<ul class='pagination admin-pagination'>";
            if ($page_number > 1) {
              echo '<li><a href="gallery.php?page=' . ($page_number - 1) . '"><<</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {

              if ($i == $page_number) {
                $active = "active";
              } else {
                $active = "";
              }

              echo '<li class=' . $active . '><a href="gallery.php?page=' . $i . '">' . $i . '</a></li>';
            }
            if ($total_page > $page_number) {
              echo '<li><a href="gallery.php?page=' . ($page_number + 1) . '">>></a></li>';
            }
            echo "</ul>";
          }


          ?>

      </div>
      </div>
  </div>

  
<?php include "footer.php"; ?>

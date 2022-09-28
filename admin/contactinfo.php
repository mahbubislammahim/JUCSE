<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Visitor Contact Info</h1>
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


          $query = "SELECT * FROM contact 

         ORDER BY id DESC LIMIT {$offset},{$limit}";
        

        $result = mysqli_query($connection, $query) or die("Failed");
        $count = mysqli_num_rows($result);

        if ($count > 0) {

        ?>
          <table class="content-table">
            <thead>
              <th>S.No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Message</th>
              
            </thead>
            <tbody>
              <?php
              $serial_number = 1;
              while ($row = mysqli_fetch_assoc($result)) {

              ?>
                <tr>
                  <td class='id'><?php echo $serial_number++ ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['message'] ?></td>

                </tr>
              <?php } ?>
            </tbody>
          <?php } ?>
          </table>

          <?php

          include "config.php";
          $query2 = "SELECT * FROM contact";
          $result2 = mysqli_query($connection, $query2) or dir("Failed.");
          if (mysqli_num_rows($result2)) {
            $total_records = mysqli_num_rows($result2);
            $total_page = ceil($total_records / $limit);

            echo "<ul class='pagination admin-pagination'>";
            if ($page_number > 1) {
              echo '<li><a href="contactinfo.php?page=' . ($page_number - 1) . '"><<</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {

              if ($i == $page_number) {
                $active = "active";
              } else {
                $active = "";
              }

              echo '<li class=' . $active . '><a href="contactinfo.php?page=' . $i . '">' . $i . '</a></li>';
            }
            if ($total_page > $page_number) {
              echo '<li><a href="contactinfo.php?page=' . ($page_number + 1) . '">>></a></li>';
            }
            echo "</ul>";
          }


          ?>

      </div>
      </div>
  </div>

  
<?php include "footer.php"; ?>

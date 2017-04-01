<?php include "include/db.php"; ?>


<!-- Header -->
<?php include "include/header.php"; ?>

    <!-- Navigation -->
<?php include "include/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

              <?php

              if(isset($_POST['submit'])){
              $search = $_POST['search'];

              $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
              $search_query = mysqli_query($connection, $query);

              if (!$search_query) {
                die("QUERY FAILED" . mysqli_error($connection));
              }

              $count = mysqli_num_rows($search_query);

              if($count == 0){
                echo "<h1> NO RESULT </h1>";
              } else {

                while($row = mysqli_fetch_assoc($search_query)){

                  $post_id =  $row['post_id'];
                  $post_category_id =  $row['post_category_id'];
                  $post_title =  $row['post_title'];
                  $post_author =  $row['post_author'];
                  $post_date =  $row['post_date'];
                  $post_image =  $row['post_image'];
                  $post_content =  $row['post_content'];
                  $post_tags =  $row['post_tags'];
                  $post_comment_count =  $row['post_comment_count'];
                  $post_status =  $row['post_status'];

              ?>

                  <!-- First Blog Post -->
                  <h2>
                      <a href="#"><?php echo "$post_title"; ?></a>
                  </h2>
                  <p class="lead">
                      by <a href="index.php"><?php echo "$post_author"; ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>
                  <hr>
                  <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                  <hr>
                  <p><?php echo $post_content ?></p>
                  <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                  <hr>

                  <?php }
                      }
                    }
                  ?>

            </div>

            <?php include "include/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>
<!-- Footer -->
<?php include "include/footer.php"; ?>

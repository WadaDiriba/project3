<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomerce website</title>
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include('dbcon.php')?>
  <?php include('header.php')?>
  
  <h1 class="text-center text-danger my-3">Welcome to My Store Supermarket</h1>
  <h1 class="text-center text-primary">Shop by Category</h1>
  <hr>
  <hr>
 
<div class="container">
  <div class="row">
    <?php
    // SQL query to fetch all records from 'clothe' table
    $sql = "SELECT * FROM clothe";  // No quotes around table name
    $result = mysqli_query($con, $sql);

    if ($result) {
      // While loop to iterate over all rows from the query result
      while ($row = mysqli_fetch_assoc($result)) {
        // Fetch each column's data
        $categ_id=$row['categ_id'];
        $categ_name = $row['categ_name'];
        $cate_descript = $row['cate_descript'];
        $categ_price = $row['categ_price'];
        $categ_image = $row['categ_image'];
        ?>

      
        <div class="col-md-4 col-sm-6 col-xs-12 mb-5">
          <div class="card">
            <!-- Dynamically set image source -->
            <img class="card-img-top" src="<?= $categ_image; ?>" alt="Card image cap">
            <div class="card-body">
              <!-- Dynamically displaying category name -->
              <h5 class="card-title"><?= $categ_name; ?></h5>
              <!-- Dynamically displaying category description -->
              <p class="card-text"><?= $cate_descript?></p>
              <!-- Dynamically displaying category price -->
              <p class="card-price">Price: $<?= number_format($categ_price, 2); ?></p> <!-- Price formatting -->
              <a href="detail.php?detail_id=<?= $categ_id ?>" class="btn btn-primary">Shop now</a>

            </div>
          </div>
        </div>

        <?php
      }
    } else {
      // Handle error if the query fails
      echo "Error: " . mysqli_error($con);
    }
    ?>
  </div>
</div>
<?php include('footer.php')?>
</body>
</html>
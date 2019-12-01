<?php include '../Partials/Header.php'; ?>
<?php include '../Partials/Sidebar.php'; ?>
<?php

if (isset($_GET['action'])){
  $slug = $_GET['product'];
  $query = mysqli_query($link,"DELETE FROM Category WHERE Slug='$slug'");
  if ($query){
    echo '<script> alert("Product Deleted"); </script>';
    echo "<script> window.location.replace('".ADMIN_URL."Pages/Products/List.php'); </script>";
  }
} ?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Category List</h4>

                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">

              <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">List Table</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Image </th>
                                                <th>Name</th>
                                                <th>Sku</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$query = mysqli_query($link,"SELECT * FROM Product");
$sn = 1;
while($row = mysqli_fetch_array($query)){
$slug = $row['ProductSlug'];
 ?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $row['ProductImage']; ?></td>
                                                <td><?php echo $row['ProductName']; ?></td>
                                                <td><?php echo $row['ProductSku']; ?></td>
                                                <td><?php echo $row['ProductPrice']; ?></td>
                                                <td><?php echo $row['CategoryId']; ?></td>

                                                <td>
                                                  <a href="View.php?product=<?php echo $slug; ?>"><input type="submit" class="btn btn-info btn-sm" value="Edit"></a>
                                                  <a href="List.php?product=<?php echo $slug; ?>&&action=del"><button onclick="delCategory()" class="btn btn-danger btn-sm">Delete</button></a>
                                                </td>
                                            </tr>
<?php $sn++; } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>SN</th>
                                              <th>Image </th>
                                              <th>Name</th>
                                              <th>Sku</th>
                                              <th>Price</th>
                                              <th>Category</th>
                                              <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                  </div>
              </div>
<script>
  function delCategory(){
  confirm("Do You want to delete ? ");
  }
</script>
<?php include '../Partials/Footer.php'; ?>

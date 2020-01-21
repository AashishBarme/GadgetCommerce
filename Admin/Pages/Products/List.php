<?php getPartialView("Header"); ?>
<?php getPartialView("Sidebar");?>
<?php
$productModel = new Models_ProductModel();
$categoryModel = new Models_CategoryModel();
if (isset($_GET['action'])){
  $slug = $_GET['product'];
  $query=$productModel->deleteProductBySlug($slug);
  if ($query = ' '){
    echo '<script> alert("Category Deleted"); </script>';
    echo '<script>location.href="./?page=Products/List";</script>';
  }
}
 ?>
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
                            <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
                                          <?php $ProductCollection = $productModel->getProductList();?>
                                          <?php foreach ($ProductCollection as $key => $row){ ?>
                                            <tr>
                                                <td><?php echo ++$key; ?></td>
                                                <td><img width="60px" src="<?php echo UPLOAD_URL.$row->ProductImage; ?>"></td>
                                                <td><?php echo $row->ProductName; ?></td>
                                                <td><?php echo $row->ProductSku; ?></td>
                                                <td><?php echo $row->ProductPrice; ?></td>
                                                <td><?php $categoryData = $categoryModel->getCategoryDataById($row->CategoryId);
                                                           foreach($categoryData as $key => $value){ echo $value->Name; }  ?>
                                                </td>
                                                 <td>
                                                  <a href="./?page=Products/View&product=<?php echo $row->Id; ?>"><input type="submit" class="btn btn-info btn-sm" value="Edit"></a>
                                                  <a href="./?page=Products/List&product=<?php echo $row->Id; ?>&&action=del"><button onclick="delCategory()" class="btn btn-danger btn-sm">Delete</button></a>
                                                </td>
                                            </tr>
                                          <?php } ?>
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
<?php getPartialView('Footer'); ?>

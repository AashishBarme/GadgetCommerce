<?php getPartialView("Header"); ?>
<?php getPartialView("Sidebar");?>
<?php
$productModel = new Models_ProductModel();
$categoryModel = new Models_CategoryModel();
if (isset($_POST['update'])){
  $id = intval($_POST['id']);
    $productimage = $_FILES["productImage"]["name"];
    $productModel->uploadProductImage(); //uploading product image
    $query = $productModel->updateProductById($id,$_POST['name'],$_POST['price'],$_POST['sku'],$_POST['categoryId'],$productimage);
      if ($query = " "){
        echo '<script> alert("Item Updated"); </script>';
        echo '<script>location.href="./?page=Products/List";</script>';
      } else {
        echo '<script> alert("Something went Wrong"); </script>';
      }
}
?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">View Product</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <?php
                  $slug = $_GET['product'];
                   $productSingleData = $productModel->displayProductBySlug($slug);
                   foreach($productSingleData as $key => $row) { ?>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="id" value="<?php echo $row->Id; ?>">
                        <div class="card-body">
                            <h4 class="card-title">Product Detail</h4>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $row->ProductName; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Sku</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sku" class="form-control" id="sku" value="<?php echo $row->ProductSku; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Price</label>
                                <div class="col-sm-9">
                                    <input type="text" name="price" class="form-control" id="price" value="<?php echo $row->ProductPrice; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="productImage" class="form-control" id="productImage" >
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="category-name" class="col-sm-3 text-right control-label col-form-label">Category</label>
                              <div class="col-sm-9">
                                <select name="categoryId" class="form-control">
                                    <?php $categoryData = $categoryModel->getCategoryList();
                                         foreach ($categoryData  as $key => $cdata){
                                          $id = $cdata->Id;
                                          $selectedCatId = $row->CategoryId; ?>
                                    <option value="<?php echo $id; ?>" <?php if($id == $selectedCatId) { echo 'selected = selected'; } ?>><?php echo $cdata->Name; ?></option>
                                  <?php  } ?>
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="update" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                  <?php } ?>
                </div>
              </div>
          </div>
        </div>
    </div>
<?php getPartialView('Footer'); ?>

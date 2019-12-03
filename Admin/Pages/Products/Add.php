<?php getPartialView("Header"); ?>
<?php getPartialView("Sidebar");?>
<?php
$productModel = new Models_ProductModel();
$CategoryModel = new Models_CategoryModel();
if (isset($_POST['submit'])){
    $imgfile=$_FILES["productImage"]["name"];
    // get the image extension
    $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
    // allowed extensions
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if(!in_array($extension,$allowed_extensions))
    {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }
    else
    {
    // Code for move image into directory
    move_uploaded_file($_FILES['productImage']['tmp_name'], ADMIN_PATH.'Uploads/'.$imgfile);
      $query = $productModel->addProductData($imgfile);
    }
    if ($query =' '){
      echo '<script> alert("Item Added"); </script>';
    } else {
      echo '<script> alert("Something went Wrong"); </script>';
      echo mysqli_error($query);
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
                <h4 class="page-title">Add Product</h4>
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

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Product Detail</h4>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Sku</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sku" class="form-control" id="sku">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Price</label>
                                <div class="col-sm-9">
                                    <input type="text" name="price" class="form-control" id="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="productImage" class="form-control" id="productImage">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="category-name" class="col-sm-3 text-right control-label col-form-label">Category</label>
                              <div class="col-sm-9">
                                <select name="categoryId" class="form-control">
                                    <option value="0">None</option>
                                      <?php $categoryData = $CategoryModel->getCategoryList();
                                         foreach ($categoryData as $key => $row){ ?>
                                          <option value="<?php echo $row->Id; ?>"><?php echo $row->Name; ?></option>
                                          <?php } ?>
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
              </div>
          </div>
        </div>
    </div>
<?php getPartialView('Footer'); ?>

<?php include '../Partials/Header.php'; ?>
<?php include '../Partials/Sidebar.php'; ?>

<?php
if (isset($_POST['update'])){
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $description = $_POST['description'];
    $slug = slugify($name);
    $query=mysqli_query($link,"UPDATE Category SET Name='$name',Slug='$slug',Description='$description' WHERE Id='$id'");
      if ($query){
        echo '<script> alert("Item Updated"); </script>';
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
                <h4 class="page-title">Add Category</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                  $slug = $_GET['category'];
                  $query = mysqli_query($link,"SELECT * FROM Category WHERE Slug='$slug'");
                  while($row = mysqli_fetch_array($query))
                  { ?>
                    <form class="form-horizontal" method="post">
                       <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                        <div class="card-body">
                            <h4 class="card-title">Category Detail</h4>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                <div class="col-sm-9">

                                    <input type="text" name="name" class="form-control" value="<?php echo htmlentities($row['Name']); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                <div class="col-sm-9">
                                <textarea name="description" rows="5" cols="80">
                                <?php echo htmlentities($row['Description']); ?>
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="update" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
              </div>
          </div>

        </div>
    </div>
<?php include '../Partials/Footer.php'; ?>

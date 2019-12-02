<?php getPartialView("Header") ?>
<?php getPartialView("Sidebar");?>
<?php
$CategoryModel = new Models_CategoryModel();

if (isset($_GET['action'])){
    $slug = $_GET['category'];
    $query=$CategoryModel->deleteCategoryBySlug($slug);
    if ($query){
        echo '<script> alert("Category Deleted"); </script>';
        echo "<script> window.location.replace('".ADMIN_URL."Pages/Category/List.php'); </script>";
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php    $CategoryCollection= $CategoryModel->getCategoryList();?>
                                    <?php foreach($CategoryCollection as $key=>$row): ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td><?php echo $row->Name; ?></td>
                                            <td><?php echo $row->Description; ?></td>
                                            <td>
                                                <a href="./Index.php?page=Category/View&category=<?php echo $row->Slug; ?>"><input type="submit" class="btn btn-info btn-sm" value="Edit"></a>
                                                <a href="./Index.php?page=Category/List&category=<?php echo $row->Slug; ?>&&action=del"><button onclick="delCategory()" class="btn btn-danger btn-sm">Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Description</th>
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
<?php getPartialView("Footer");?>
<?php #include '../Partials/Footer.php'; ?>

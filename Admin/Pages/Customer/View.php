<?php getPartialView('Header'); ?>
<?php getPartialView('Sidebar'); ?>
<?php
$CustomerModel = new Models_CustomerModel();
if (isset($_POST['update'])){
  $customerid = $_GET['customerid'];
  $query = $CustomerModel-> updateCustomerDataById($customerid);
  if ($query = ' '){
    echo '<script>alert("Customer Updated"); </script>';
      echo '<script>location.href="./?page=Customer/List";</script>';

  }
}?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">View Customer's Detail</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
            <div class="col-md-12">
                <div class="card">
                  <?php
                  $customerid = $_GET['customerid'];
                  $customerSingleData = $CustomerModel->displayCustomerDataById($customerid);
                  foreach($customerSingleData as $key=>$data)
                  { ?>
                    <form class="form-horizontal" method="post">
                       <input type="hidden" name="id" value="<?php echo $data->Id; ?>">
                        <div class="card-body">
                            <h4 class="card-title">Customer Detail</h4>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $data->FirstName; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="lastname" class="form-control" id="lastname"  value="<?php echo $data->LastName; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">UserName</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" id="username" required  value="<?php echo $data->UserName; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="password" required  value="<?php echo $data->Password; ?>">
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
<?php getPartialView("Footer");?>

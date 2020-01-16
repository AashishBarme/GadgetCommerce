<?php getPartialView('Header'); ?>
<?php getPartialView('Sidebar'); ?>
<?php
$CustomerModel = new Models_CustomerModel();
if (isset($_GET['action'])){
  $customerid = $_GET['customerid'];
  $query = $CustomerModel->deleteCustomerById($customerid);
  if ($query = ' '){
    echo '<script>alert("Customer Delete"); </script>';
    echo '<script>location.href="./?page=Customer/List";</script>';
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
                                               <th>FirstName </th>
                                               <th>LastName</th>
                                               <th>UserName</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                         <?php $customerData = $CustomerModel->getAllCostumer(); ?>
                                         <?php foreach ($customerData as $key => $row){ ?>
                                           <tr>
                                               <td><?php echo ++$key; ?></td>
                                               <td><?php echo $row->FirstName; ?></td>
                                               <td><?php echo $row->LastName; ?></td>
                                               <td><?php echo $row->UserName; ?></td>
                                                <td>
                                                 <a href="./?page=Customer/View&customerid=<?php echo $row->Id; ?>"><input type="submit" class="btn btn-info btn-sm" value="Edit"></a>
                                                 <a href="./?page=Customer/List&customerid=<?php echo $row->Id; ?>&action=del"><button onclick="delCategory()" class="btn btn-danger btn-sm">Delete</button></a>
                                               </td>
                                           </tr>
                                         <?php } ?>
                                       </tbody>
                                       <tfoot>
                                           <tr>
                                             <th>SN</th>
                                             <th>FirstName </th>
                                             <th>LastName</th>
                                             <th>UserName</th>
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
</div>
<?php getPartialView('Footer'); ?>

<?php getPartialView('Header');?>
<?php $vm = new ViewModels_Category();?>
<section class="cat_product_area section_gap">
  <div class="container-fluid">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="product_top_bar">
          <div class="left_dorp">
            <select class="sorting">
              <option value="1">Default sorting</option>
              <option value="2">Default sorting 01</option>
              <option value="4">Default sorting 02</option>
            </select>
            <select class="show">
              <option value="1">Show 12</option>
              <option value="2">Show 14</option>
              <option value="4">Show 16</option>
            </select>
          </div>
          <div class="right_page ml-auto">
            <nav class="cat_page" aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item blank">
                  <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">6</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="latest_product_inner row">
          <?php  foreach ($vm->ListProduct($_GET['category']) as $item): ?>
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="f_p_item">
              <div class="f_p_img">
                <img class="img-fluid" src="<?php echo UPLOAD_URL.$item->ProductImage; ?>" alt="">
                <div class="p_icon">
                  <a href="#">
                    <i class="lnr lnr-heart"></i>
                  </a>
                  <a href="#">
                    <i class="lnr lnr-cart"></i>
                  </a>
                </div>
              </div>
              <a href="<?=BASE_URL?>index.php?page=product&product=<?=$item->ProductSlug;?>">
                <h4><?=$item->ProductName;?></h4>
              </a>
              <h5><?=$item->ProductPrice;?></h5>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="left_sidebar_area">
          <aside class="left_widgets cat_widgets">
            <div class="l_w_title">
              <h3>Browse Categories</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                <?php foreach ($vm->getHeaderMenu() as $url => $label):?>
                  <li>
                    <a href="<?=BASE_URL?>index.php?page=category&category=<?=$url?>"><?=$label;?></a>
                  </li>
                <?php endforeach;?>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>

    <div class="row">
      <nav class="cat_page mx-auto" aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#">
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">01</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">02</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">03</a>
          </li>
          <li class="page-item blank">
            <a class="page-link" href="#">...</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">09</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</section>
<?php getPartialView('Footer');?>

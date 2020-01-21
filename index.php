<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  include __DIR__."/Bootstrap.php";

  function getPartialView($path){
    include  __DIR__."/Frontend/Pages/Partials/$path.php";
  }

  $page = (isset($_GET["page"]) && !empty($_GET['page'])) ? ucfirst(strtolower($_GET['page'])):"Index";
  include __DIR__."/Frontend/Pages/$page.php";

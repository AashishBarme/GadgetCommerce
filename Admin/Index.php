<?php
include __DIR__."/Bootstrap.php";

function getPartialView($path){
    include  __DIR__."/Pages/Partials/$path.php";
}
$page = (isset($_GET["page"]) && !empty($_GET['page'])) ? $_GET['page']:"NotFound";
include __DIR__."/Pages/$page.php";

<?php
include "../Bootstrap.php";
define("ADMIN_PATH",dirname(__FILE__)."/");
define ("ADMIN_URL",BASE_URL."Admin/");

function slugify($text)
{
  $stringHelper = new String_Helper();
  return $stringHelper->slugify($text);
}

include __DIR__. "/DataSeeder.php";
$DataSeeder = new DataSeeder();
$DataSeeder->SeedDatabase();

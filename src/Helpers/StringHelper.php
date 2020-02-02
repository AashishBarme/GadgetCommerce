<?php declare(strict_type=1);

class Helpers_StringHelper
{

  public function slugify(string $text):string
  {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '-');
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
      return 'n-a';
    }
    return $text;
  }

  public function VerifySlug(string $slug):bool
  {
    return preg_replace("#[^a-zA-Z0-9-]#","",$slug);
  }

  public function CheckSlugDuplication(string $slug, string $tablename):string
  {
    $sql  = 'SELECT 1 FROM $tablename WHERE slug =$slug LIMIT 1';
    echo $sql;
  }

}

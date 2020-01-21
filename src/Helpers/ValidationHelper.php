<?php declare(strict_type=1);

class Helpers_StringHelper
{
  public function VerifyInteger($var)
  {
    return   preg_match("#[^0-9]#",$customerid);
  }
}

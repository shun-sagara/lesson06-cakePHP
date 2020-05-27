<?php
namespace App\Model\Validation;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validation;

class CustomValidation extends Validation {
  public static function isImage($files)
    {
      $ret = true;
      $exts = array("png", "gif", "jpeg", "jpg", );
      $ext = substr($files, strrpos($files, '.') + 1);
      if (!in_array($ext, $exts,true)) {
        $ret = false;
      }
      return $ret;
    }
}

<?php namespace App\Models;

class Page extends WPObject {
  public static $type = 'page';

  public $parent;

  public static function find($args = [])
  {
    if (is_array($args)) $args = array_merge($args, ['post_type' => 'post']);
    return parent::find($args);
  }
}

<?php namespace App\Models;

class Post extends WPObject {
  public static $type = 'post';

  public $parent;

  public static function find($args = [])
  {
    if (is_array($args)) $args = array_merge($args, ['post_type' => 'post']);
    return parent::find($args);
  }

  public static function paginate($args = [])
  {
    $postsPerPage = 10;
    $midRange = 5;

    $results = [];
    $page = $args['_paginate'];
    $cat_ID = $args['post_category'];
    $category = get_the_category();
    $total = $category[0]->count;

    $results['post_count'] = $total;
    $numPages = ceil($total / $postsPerPage);

    if ($numPages > 8) {
      $before = [1, '&mdash;'];
      $after = ['&mdash;', $numPages];

      $startRange = $page - floor($midRange / 2);
      $endRange = $page + floor($midRange / 2);

      if ($startRange <= 0) {
        $endRange += abs($startRange) + 1;
        $startRange = 1;
        $before = [];
      }

      if ($endRange >= $numPages) {
        $startRange -= $endRange - $numPages;
        $endRange = $numPages;
        $after = [];
      }

      $results['range'] = array_merge($before, range($startRange, $endRange), $after);
    }
    elseif ($numPages > 1) {
      $results['range'] = range(1, 8);
    }

    $results['page_count'] = $numPages;
    $results['current_page'] = $page;

    $start = 3 + ($page * $postsPerPage);
    $end = $start + $postsPerPage;


    $results['posts'] = static::find(array_merge($args, [
      'offset' => 0,
      'posts_per_page' => 10,
      'category' => $category[0]->term_id
    ]));
    $results['archive'] = [];

    return $results;
  }

}

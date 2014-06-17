<?php

/** Create object|permalink filter */
$get_permalink_filter = new Twig_SimpleFilter('permalink', function($post)
{

  if (isset($post->post_type) && $post->post_type === 'post') {
    $taxonomies = [];
    $taxIDS = wp_get_post_categories($post->ID);
    foreach($taxIDS as $taxID) {
      $taxonomies[] = get_category($taxID)->slug;
    }
    $type = preg_replace('/y$/', 'ie', $taxonomies[0]) . 's';
    $link = sprintf('%s/research/%s/%s', bloginfo('url'), $type, $post->post_name);
  }
  else {
    $link = get_permalink($post->ID);
  }
  return $link;
});
$app->twig->addFilter($get_permalink_filter);

/** time-ago filter */
$time_ago_filter = new Twig_SimpleFilter('ago', function($time) {
  $time = strtotime($time);
  $periods = array("s", "min", "h", "d", "w", "m", "y", "d");
  $lengths = array("60","60","24","7","4.35","12","10");
  $now = time();
  $difference     = $now - $time;
  for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
    $difference /= $lengths[$j];
  }
  $difference = round($difference);

  return "{$difference}{$periods[$j]}";
});

$app->twig->addFilter($time_ago_filter);

/** Twitterify helper **/
$twitterify_filter = new Twig_SimpleFilter('twitterify', function($text)
{
  $linked = preg_replace('/(http\:\/\/[^\s]+)/', '<a href="$1">$1</a>', $text);
  $atted = preg_replace('/\@(\w+)/', '<a href="http://www.twitter.com/$1">@$1</a>', $linked);
  $hashed = preg_replace('/\#(\w+)/', '<a href="http://www.twitter.com/hashtag/$1">#$1</a>', $atted);
  return $hashed;
});

$app->twig->addFilter($twitterify_filter);

/** Active Link Filter */
$active_link_filter = new Twig_SimpleFilter('active', function($page)
{
  $uri = $_SERVER['REQUEST_URI'];
  $name = $page->name;
  return preg_match('/'.$page->name.'/', $uri) ? ' active' : '';
});

$app->twig->addFilter($active_link_filter);

/** Info Filter */
$info_filter = new Twig_SimpleFilter('info', function($param)
{
  return get_bloginfo($param);
});

$app->twig->addFilter('info', $info_filter);

/** Asset filters */
$js_filter = new Twig_SimpleFilter('js', function($file)
{
  $base = get_bloginfo('url');
  return sprintf('%s/build/javascripts/%s', $base, $file);
});
$app->twig->addFilter('js', $js_filter);

$css_filter = new Twig_SimpleFilter('css', function($file)
{
  $base = get_bloginfo('url');
  return sprintf('%s/build/stylesheets/%s', $base, $file);
});

$app->twig->addFilter('css', $css_filter);

/** JSON filter */
$json_filter = new Twig_SimpleFilter('json', function($obj) {
  return json_encode($obj);
});

$app->twig->addFilter('json', $json_filter);

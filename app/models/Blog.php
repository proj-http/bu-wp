<?php namespace App\Models;

class Blog {
  protected $fields = [];

  public function __construct() {
    $this->fields = ['admin_email', 'atom_url', 'charset', 'comments_atom_url', 'comments_rss2_url', 'description', 'html_type', 'language', 'name', 'pingback_url', 'rdf_url', 'rss2_url', 'rss_url', 'stylesheet_directory', 'stylesheet_url', 'template_directory', 'template_url', 'text_direction', 'url', 'version', 'wpurl'];
    foreach ($this->fields as $f) {
      $this->{$f} = \get_bloginfo($f);
    }
  }
}

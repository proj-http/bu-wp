<?php namespace App\Models;

class WPObject {

  public $ID;
  public static $type;
  public $title;
  public $content;
  public $status;
  public $date;
  public $name;
  public $parent;

  public static $meta = [];
  public static $json = [];

  public function __construct($wp_post_array) {
    $this->extract($wp_post_array, [
        'key' => function ($k, $v) {
            return (substr($k, 0, 5) === "post_") ? substr($k, 5) : $k;
        }
    ]);
  }
    /**
     * Finds and creates WP objects using WP get_post and get_posts methods
     *
     * @param  mixed $args Numeric ID or array of arguments
     * @return mixed       Single WP object or array of WP objects
     */
    public static function find($args = []) {
        if (is_numeric($args)) {
            return static::find_one($args);

        } else if (is_array($args)) {
            return static::find_many($args);
        }
    }

    public static function attachMetaData($wpobject)
    {
        $fields = get_fields($wpobject->ID);
        if (! empty($fields)) {
          $fieldObject = json_decode(json_encode($fields));
            foreach ($fields as $key => $field) {
                if ($field) $wpobject->{$key} = $field;
            }
        }

        foreach(static::$meta as $prop) {
            $meta = get_post_meta($wpobject->ID, $prop, true);
            $wpobject->{$prop} = in_array($prop, static::$json) ? json_decode($meta) : $meta;
        }



        return $wpobject;
    }


    /**
     * Handles creating a single post object
     *
     * @param  int $id WordPress id
     * @return WPObject
     */
    protected static function find_one($id) {
        $object = get_post($id);
        $Klass = get_called_class();
        $wpobject = new $Klass($object);
        $Klass::attachMetaData($wpobject);
        return $wpobject;
    }

    /**
     * Find a set of objects based on arguments
     *
     * @param  array $args List of parameters for finding the object set
     * @return array       WPObject instances
     */
    protected static function find_many($args) {
        $Klass = get_called_class();

        return array_map(function ($object) use($Klass) {
            $wpobject = new $Klass($object);
            return $Klass::attachMetaData($wpobject);
        }, get_posts($args));
    }


    /**
     * Create a new object
     *
     * @param  array $data Object data
     * @return WPObject      Instance of WPObject tied to newly created WP object
     */
    public static function create($data) {
        unset($data['ID']);
        $data = array_merge($data, ['post_type' => static::$type]);
        $object = static::find_one(wp_insert_post($data));
        if (! empty(static::$meta)) {
            foreach(static::$meta as $prop) {
                if (in_array($prop, array_keys($data))) {
                    update_post_meta($object->ID, $prop, $data[$prop]);
                }
            }
        }
        return $object;
    }


    /**
     * Updates the existing object
     *
     * @param  array $data
     * @return WPObject
     */
    public function update($data) {
        foreach ($data as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
            elseif (in_array($k, static::$meta)) {
                update_post_meta($this->id, $prop, $data[$prop]);
            }
        }
        $data['ID'] = $this->ID;
        wp_update_post($data);

        return $this;
    }


    /**
     * Deletes instance
     * @return WPObject
     */
    public function delete() {
        wp_delete_post($this->ID);

        return $this;
    }

    /**
     * An object version of PHP's core extract() function.
     * This version pulls out all the elements of a hash and pushes them
     * onto the object using $this->$key = $value syntax.
     *
     * @param array $properties The hash of properties
     * @param array $modifier A list of callbacks to pass keys/values through if you want to modify, say to remove a prefix, etc
     * @param boolean $ifExists Defaults to true, run every key in the hash through property_exists and only assign if the property was declared on the object
     *
     * @return null
     */
    protected function extract($properties, $modifiers = [], $ifExists = true) {
        foreach ((array) $properties as $key => $value) {

            if (!empty($modifiers['key']) && is_callable($modifiers['key'])) {
                $key = $modifiers['key']($key, $value);
            }
            if (!empty($modifiers['value']) && is_callable($modifiers['value'])) {
                $value = $modifiers['value']($key, $value);
            }
            if ($key === 'type') continue;

            if (!$ifExists || ($ifExists && property_exists($this, $key))) {

                $this->$key = $value;
            }
        }
    }
}

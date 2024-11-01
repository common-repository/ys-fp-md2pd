<?php
/*
Plugin Name: Ys-Fp_md2pd
Plugin URI:
Description: When this plug-in is enabled, when future post, adjust the modify date to post date.
Author: YuuWoods
Version: 0.1
Author URI: https://www.yuuwoods.net/
License: GPL2
Text Domain: ys-fp_md2pd
Domain Path: /languages
*/
class Ys_Fp_md2pd {
  const DOMAIN = 'ys-fp_md2pd';

  public function __construct() {
    load_plugin_textdomain(self::DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . "/languages");

    add_action('post_updated', array($this, 'ys_fp_md2pd_post_updated'));
  }

  public function ys_fp_md2pd_post_updated ($post_id) {
    global $wpdb;
    $wpdb->query('UPDATE `wp_posts` SET `post_modified`=`post_date`,`post_modified_gmt`=`post_date_gmt` WHERE `ID`='.$post_id.' and `post_status`="future"');
  }
}
new Ys_Fp_md2pd();

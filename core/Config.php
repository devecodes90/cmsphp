<?php
namespace Core;
class Config
{
  private static $config = [
          'version'            => '0.0.1',
          'root_dir'           => '/cmsphp/', // this will likely be / on a live server
          'default_controller' => 'Blog',    // the default home controller
          'default_layout'     => 'default', // Default layout that will be used
          'default_site_title' => 'Benaichacodes', // Default site title
          'db_host'            => '127.0.0.1', // DB host, please use IP address instead of domain
          'db_name'            => 'php_cms',  // DB name
          'db_user'            => 'root',    // DB user
          'db_pass'            => '',  // DB password
          'login_cookie_name' => 'hakdjri2341l8a' ,    //login_cookies_name
      ];

      public static function get($key){
          return array_key_exists($key, self::$config)? self::$config[$key] : NULL;
      }
}
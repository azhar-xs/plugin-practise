<?php
/**
 * Plugin Name: xpeed-studio
 * Plugin Uri: 
 * Description: Plugin Practise.
 * Version: 1.0.0
 * Author: Azhar uddin
 * Author URI: https://example.com
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: xpeed-studio
 * Domain Path: /languages/
 */
 require_once __DIR__.'/vendor/autoload.php';
 

final class xPeed_Studio{
    const version = '1.0.0';
    public function __construct()
    {
        $this->define_constants();
        register_activation_hook(__FILE__,[$this,'activate']);

        // $this->init_plugin();
        add_action('plugins_loaded',[$this,'init_plugin']);
    }
    public static function init()
    {
        static $instance=false;
        if(!$instance)
        {
            $instance = new self();
        }
        return $instance;
    }
    public function define_constants()
    {
        define('XPEED_STUDIO_VERSION',self::version);
        define('XPEED_STUDIO_FILE',__FILE__);
        define('XPEED_STUDIO_PATH',__DIR__);
        define('XPEED_STUDIO_URL',plugins_url('',XPEED_STUDIO_FILE));
        define('XPEED_STUDIO_ASSETS',XPEED_STUDIO_URL.'/assets');
    }
    public function init_plugin()
    {
        if ( is_admin() ) {
            new Azhar\XpeedStudio\Admin();
        }else {
            new Azhar\XpeedStudio\Frontend(); 
        }
    }
    public function activate()
    {
        $installer = new  Azhar\XpeedStudio\Installer();
        $installer->run();
    }
}
$obj = xPeed_Studio::init();

<?php
namespace Azhar\XpeedStudio;

class Installer
{
    
    public function run()
    {
        $this->add_version();
        $this->create_tables();
    }

    public function add_version()
    {
        $installed = get_option('xpeed_studio_installed');
        if(!$installed){
            update_option('xpeed_studio_installed',time());
        }
        update_option('xpeed_studio_version',XPEED_STUDIO_VERSION);
    }
    public function create_tables()
    {
       global $wpdb;
       $charset_collate = $wpdb->get_charset_collate(); 
      
       $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}xs_address` (
        `id` int NOT NULL,
        `name` varchar(100) NOT NULL,
        `address` varchar(255) DEFAULT NULL,
        `phone` varchar(30) DEFAULT NULL,
        `created_by` bigint NOT NULL,
        `created_at` datetime NOT NULL
      ) $charset_collate";
      if ( !function_exists('dbDalata') ) {
        require_once ABSPATH.'wp-admin/includes/upgrade.php';
      }
      dbDelta($schema);
    }
}





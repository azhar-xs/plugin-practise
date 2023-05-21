<?php
namespace Azhar\XpeedStudio\Admin;

class Menu
{
    function __construct()
    {
        add_action('admin_menu',[$this,'admin_menu']);    
    }    
    public function admin_menu()
    {
        $parent_slug = 'xpeed-studio';
        $capability  = 'manage_options';
        add_menu_page(__('xpeed studio','xpeed-studio'),__('xpeed','xpeed-studio'),$capability,$parent_slug,[$this,'address_book'],'dashicons-admin-multisite');
        add_submenu_page( $parent_slug, __('Address Book','xpeed-studio'),__('Address Book','xpeed-studio') ,$capability, $parent_slug, [$this,'address_book'] );
        add_submenu_page( $parent_slug, __('Settings','xpeed-studio'),__('Settings','xpeed-studio') ,$capability, 'addressbook-settings', [$this,'address_book_settings'] );
    }
    public function address_book()
    {
       $addressbook =  new Addressbook();
       $addressbook->plugin_page();
    }
   
    public function address_book_settings()
    {
        echo "settings adddress book";
    }

}

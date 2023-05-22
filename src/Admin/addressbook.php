<?php
namespace Azhar\XpeedStudio\Admin;

class Addressbook{
    public $errors = [];

    public function plugin_page()
    {
        $action = isset($_GET['action'])? $_GET['action'] : 'list';
        switch ($action) {
            case 'new':
                $template = __DIR__.'/views/address-new.php';
                break;
            case 'edit':
                $template = __DIR__.'/views/address-edit.php';
                break;
            case 'view':
                $template = __DIR__.'/views/address-view.php';
                break;
            
            default:
                $template = __DIR__.'/views/address-list.php';
                break;
        }
        if (file_exists($template)) {
            include $template;
        }
    }
    public function form_handler()
    {
        if (! isset($_POST['submit_address'])) {
            return;
        }
        if (! wp_verify_nonce($_POST['_wpnonce'],'new-address') ) {
            die('are you cheating?');
        }
        if (! current_user_can('manage_options')) {
            die('are you cheating?');
        }
        $name = isset( $_POST['name']) ? sanitize_text_field($_POST['name'])  : '';
        $address = isset( $_POST['address']) ? sanitize_textarea_field($_POST['address'])  : '';
        $phone = isset( $_POST['phone']) ? sanitize_text_field( $_POST['phone'])  : '';
        if (empty($name)) {
            $this->errors['name'] = __('please provid a name','xpeed-studio');
        }
        if (empty($phone)) {
            $this->errors['phone'] = __('please provid a phone','xpeed-studio');
        }
        if( ! empty( $this->errors )){
            return;
        }
      
        $insert_id = wp_insert_address([
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
        ]);

        if (is_wp_error( $insert_id )) {
            wp_die( $insert_id->get_error_message() );
        }

        $redirected_to = admin_url( 'admin.php?page=xpeed-studio&inserted=true');
        wp_redirect( $redirected_to );
        var_dump(wp_insert_address());
        var_dump($_POST);
        exit;
    }
}








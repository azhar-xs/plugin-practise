<?php

namespace Azhar\XpeedStudio;

class Admin
{
    function __construct()
    {
        $addressbook = new Admin\Addressbook;
        $this->dispatch_actions( $addressbook );

        new Admin\menu($addressbook );
    }
    public function dispatch_actions( $addressbook )
    {
        //$addressbook object and form_handaler class
        add_action('admin_init',[$addressbook,'form_handler']);
    }
}



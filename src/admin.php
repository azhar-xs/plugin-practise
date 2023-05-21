<?php

namespace Azhar\XpeedStudio;

class Admin
{
    function __construct()
    {
        $this->dispatch_actions();
        new Admin\menu();
    }
    public function dispatch_actions()
    {
        //$addressbook object and form_handaler class
        $addressbook = new Admin\Addressbook;
        add_action('admin_init',[$addressbook,'form_handler']);
    }
}



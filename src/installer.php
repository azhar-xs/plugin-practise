<?php
namespace Azhar\XpeedStudio;

class Installer
{
    function run()
    {
        public function run()
        {
            $this->add_version();
            $this->create_table();
        }
    }
    public function add_version()
    {
        $installed = get_option('xpeed_studio_installed');
        if(!$installed){
            update_option('xpeed_studio_installed',time());
        }
        update_option('xpeed_studio_version',XPEED_STUDIO_VERSION);
    }
    public function create_table()
    {
       
    }
}





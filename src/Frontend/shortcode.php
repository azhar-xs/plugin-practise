<?php
namespace Azhar\XpeedStudio\Frontend;

class Shortcode
{
    function __construct()
    {
        add_shortcode('xpeed-studio',[$this,'render_shortcode']);
    }
    public function render_shortcode($atts,$content= '')
    {
        echo "render shortcode";
    }
}


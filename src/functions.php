<?php

function wp_insert_address( $args = [] )
{
    global $wpdb;
    
    if (empty($args['name'])) {
        return new \WP_Error('no-name',__('you must provide a name','xpeed-studio'));
     }

    $defaults = [
        'name'       =>  '',
        'phone'      =>  '',
        'address'    =>  '',
        'created_by' => get_current_user_id(),
        'created_at' => 'mysql',
    ];

    $data = wp_parse_args( $args, $defaults );
   

    $inserted = $wpdb->insert( 
        "{$wpdb->prefix}xs_address", 
         $data, 
         [
            '%s',
            '%s',
            '%s',
            '%d',
            '%d'
         ]
    );
    if(!$inserted)
    {
        return new \WP_Error('failed-to-insert',__('Failed to inserted','xpeed-studio'));
    }
    $wpdb->insert_id;
}
function wp_get_address($args = [])
{
    global $wpdb;
    $defaults=[
        'number' => 20,
        'offset' => 0,
        'orderby' =>'id',
        'order' => 'ASC'
    ];
    $args = wp_parse_args( $args, $defaults );
    $items = $wpdb->get_results(
        $wpdb->prepare(
            SELECT * FROM {$wpdb->prefix}xs_address
            ORDER BY %s %s 
            LIMIT %d %d,
            $args['orderby'],$args['order'],$args['offset'],$args['number']
        );
    );
    return $items;
}
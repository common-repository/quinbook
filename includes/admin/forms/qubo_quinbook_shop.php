<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $qubo_options;

$add_to_script = $qubo_options['qubo_script'];

echo wp_get_script_tag(
    array(
        'src'      => 'https://cdn.quinbook.com/shop.js',
        'data-shopid' => esc_attr( $add_to_script ),
    )
);
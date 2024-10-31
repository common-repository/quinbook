<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function qubo_quinbook_shop( ) {
    ob_start();

    include( QUBO_ADMIN_DIR.'/forms/qubo_quinbook_shop.php' );
    
    $html = ob_get_clean();

    return $html;
}

add_shortcode( 'quinbook_shop', 'qubo_quinbook_shop' );
?>
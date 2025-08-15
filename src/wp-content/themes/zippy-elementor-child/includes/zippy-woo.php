<?php
add_filter( 'woocommerce_get_price_html', 'custom_price_display', 10, 2 );

function custom_price_display( $price, $product ) {
    // Example: Add "Our Price:" before the price
    $price_html = $price;

    // Example: Display "On Sale!" if the product is on sale
    if ( !is_user_logged_in() ) {
        $price_html = ' <span class="sale-indicator">On Sale!</span>';
    }

    return $price_html;
}


    add_action( 'woocommerce_before_add_to_cart_button', 'my_custom_content_before_button' );
    function my_custom_content_before_button() {
        echo '<p>Some custom text before the button.</p>';
    }
<?php
add_filter('woocommerce_get_price_html', 'replace_price_with_login_message', 10, 2);

function replace_price_with_login_message($price, $product) {
    $price_html = $price;
    global $myaccount_url;
    if (!is_user_logged_in()) {
        $price_html = "<p><a class='login-required-mess' href='$myaccount_url'>" . __('Login to see price', 'woocommerce') . "</a></p>";
    }
    return $price_html;
}

// hide add to cart button if not logged in
function hide_add_to_cart_if_not_logged_in() {
    if (!is_user_logged_in()) {
        // hide Add to Cart product loop
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        
        // hide Add to Cart product detail
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    }
}
add_action('init', 'hide_add_to_cart_if_not_logged_in');


// Prevent Add to Cart if not logged in
function disable_add_to_cart_if_not_logged_in($is_purchasable, $product) {
    if (!is_user_logged_in()) {
        return false;
    }
    return $is_purchasable;
}
add_filter('woocommerce_is_purchasable', 'disable_add_to_cart_if_not_logged_in', 10, 2);


// redirect to login page if try to add to cart
function add_to_cart_redirect_if_not_logged_in() {
    global $myaccount_url;
    if (!is_user_logged_in() && isset($_REQUEST['add-to-cart'])) {
        wc_add_notice(__('You need to login to add your product to cart.', 'woocommerce'), 'error');
        wp_redirect($myaccount_url);
        exit;
    }
}
add_action('template_redirect', 'add_to_cart_redirect_if_not_logged_in');
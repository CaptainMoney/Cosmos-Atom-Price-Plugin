<?php
/*
Plugin Name: Atom Spot Price
Plugin URI: https://cosmosnews.zone/
Description: Displays the spot price of ATOM on your website.
Version: 1.1
Author: Justin Werner
Author URI: https://cosmosnews.zone/
License: GPL2
*/

function atom_spot_price_shortcode() {
    $url = "https://api.coingecko.com/api/v3/simple/price?ids=cosmos&vs_currencies=usd";
    $response = wp_remote_get( $url );
    $body = wp_remote_retrieve_body( $response );
    $data = json_decode( $body );
    $price = $data->cosmos->usd;
    return "Current price for ATOM: $" . $price;
}
add_shortcode( 'atom_spot_price', 'atom_spot_price_shortcode' );
?>
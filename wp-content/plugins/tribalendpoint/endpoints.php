<?php
add_action('rest_api_init', 'wp_rest_cupones_endpoints');

function wp_rest_cupones_endpoints($request) {
    /**
     * Handle Register User request.
     */

    register_rest_route('wp/v2', 'get/resources', array(
        'methods' => 'GET',
        'callback' => 'wc_show_resources_handler',
        'permission_callback' => '__return_true',
    ));
}

//Cupones canjeados by user id
function wc_show_resources_handler($request=null){
    $params = $request->get_params();
    $curlItunes = curl_init();

    curl_setopt_array($curlItunes, array(
        CURLOPT_URL => "https://itunes.apple.com/search?term=jack+johnson",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    
    $responseItunes = curl_exec($curlItunes);
    echo $responseItunes;
    curl_close($curlItunes);

    $curltvmaze = curl_init();
    curl_setopt_array($curltvmaze, array(
        CURLOPT_URL => "http://api.tvmaze.com/singlesearch/shows?q=girls",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    
    $responsetvmaze = curl_exec($curltvmaze);
    
    curl_close($curltvmaze);
    
    $response = array_merge($responseItunes,$responsetvmaze);

    echo $response;

}
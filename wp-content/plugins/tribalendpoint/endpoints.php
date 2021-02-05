<?php
add_action('rest_api_init', 'wp_rest_cupones_endpoints');

function wp_rest_cupones_endpoints($request) {
    register_rest_route('wp/v2', 'get/resources', array(
        'methods' => 'GET',
        'callback' => 'wc_show_resources_handler',
        'permission_callback' => '__return_true',
    ));
}

function wc_show_resources_handler($request=null){
    $params = $request->get_params();
    $searchTerm = $params['term'];

    if(count(get_itunes($searchTerm)) > 0){
        $response = get_itunes($searchTerm);
        array_push($response, "Itunes");
        echo $response;
    }elseif(count(get_tvshow($searchTerm)) > 0){
        $response = get_tvshow($searchTerm);
        array_push($response, "TVmaze");
        echo $response;
    }
}


function get_itunes($searchTerm){
    $curlItunes = curl_init();
    $urlItunes = "https://itunes.apple.com/search?term=".$searchTerm;

    curl_setopt_array($curlItunes, array(
        CURLOPT_URL => $urlItunes,
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
}

function get_tvshow($searchTerm){
    $urlTVmaze = "http://api.tvmaze.com/search/shows?q=". $searchTerm;
    $curltvmaze = curl_init();
    curl_setopt_array($curltvmaze, array(
        CURLOPT_URL => $urlTVmaze,
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

    echo $responsetvmaze;
}
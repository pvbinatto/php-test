<?php

require __DIR__."/vendor/autoload.php";
use Algolia\AlgoliaSearch\SearchClient;

function getData($str){

    # Connect and authenticate with your Algolia app
    $client = SearchClient::create("JOQH7FRJIP", "0238b5e396a156206da3d50232386070");

    # Search the index and print the results
    $index = $client->initIndex("dev_chef");
    $results = $index->search($str);
    return json_encode($results["hits"]);
}

$postData = filter_input(INPUT_POST, 'str', FILTER_SANITIZE_STRING);

echo getData($postData);


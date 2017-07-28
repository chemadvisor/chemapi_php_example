/*
 * Copyright (c) 2017 ChemADVISOR, Inc. All rights reserved.
 * Licensed under The MIT License (MIT)
 * https://opensource.org/licenses/MIT
 */

<?php

// set base address
$baseAddress = "https://sandbox.chemadvisor.io/chem/rest/v2/";

// set resource
$api = "regulatory_lists";

// set query parameters:q,limit,offset
$q      = '{"tags.tag.name":"Government Inventory Lists"}';
$limit  = 10;
$offset = 0;

$getdata = http_build_query(array(
    'q' => $q,
    'limit' => $limit,
    'offset' => $offset
));

$opts = array(
    'http' => array(
        'method' => "GET",
        'header' => 
        // set app_key header
            "app_key:your_app_key\r\n" . 
		// set app_id header
            "app_id:your_app_id\r\n" .
        // set accept header
            "accept:application/json\r\n"
    )
);

$context = stream_context_create($opts);
$file = file_get_contents($baseAddress . $api . '?' . $getdata, false, $context);
print_r($file);
?>

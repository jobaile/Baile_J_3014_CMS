<?php

function filterBySearch($searchRequest){

    include('script/connect.php');

    // fetching searched for products

    if (isset($searchRequest)){
        $searchRequest = htmlentities($searchRequest);
        $get_searched_products = 'SELECT prod_id, prod_name, prod_pic, prod_price FROM tbl_products WHERE prod_name LIKE "%'.$searchRequest.'%"';
        $get_searched_set = $pdo->prepare($get_searched_products);
        $get_searched_set->execute();  

        $results = $get_searched_set->fetchAll(PDO::FETCH_ASSOC);
        $filtered_products = json_encode($results);

        return $filtered_products;
    }

}

$response = filterBySearch($_GET["searchRequest"]);

echo $response;

?>
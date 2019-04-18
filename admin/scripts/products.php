<?php

function addProduct($pic, $name, $text, $price) {
    try {
        include 'connect.php';

        //Validate File
        $file_type      = pathinfo($pic['name'], PATHINFO_EXTENSION);
        $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png');
        if (!in_array($file_type, $accepted_types)) {
            throw new Exception('Wrong file type!');
        }

        //Image target path
        $target_path = '../images/' . $pic['name'];
        if (!move_uploaded_file($pic['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $th_copy = '../images/TH_' . $pic['name'];
        if (!copy($target_path, $th_copy)) {
            throw new Exception('Failed to move copy file, check permission!');
        }

        $insert_prod_query = 'INSERT INTO tbl_products(prod_pic, prod_name, prod_text, prod_price)';
        $insert_prod_query .= ' VALUES(:pic, :name, :text, :price)';

        $insert_prod   = $pdo->prepare($insert_prod_query);
        $insert_result = $insert_prod->execute(
            array(
                ':pic'       => $pic['name'],
                ':name'      => $name,
                ':text'      => $text,
                ':price'     => $price,
            )
        );

        if (!$insert_result) {
            throw new Exception('Failed to insert a new product!');
        }
        
        $last_id = $pdo->lastInsertId();

        $insert_cat_query = 'INSERT INTO tbl_prod_cat(prod_id, cat_id) VALUES(:prod_id, :cat_id)';
        $insert_cat       = $pdo->prepare($insert_cat_query);
        $insert_cat->execute(
            array(
                ':prod_id' => $last_id,
                ':cat_id'  => $cat,
            )
        );

        if (!$inser_cat->rowCount()) {
            throw new Exception('Failed to set category!');
        }

        redirect_to('index.php');
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

function editUserOne($id, $name, $text, $price){
    include('connect.php');

    $update_prod_query = 'UPDATE tbl_products SET prod_name = :name, prod_text = :text, prod_price = :price ';
    $update_prod_query .= 'WHERE prod_id = :id';

    $update_prod_set = $pdo->prepare($update_prod_query);
    $update_prod_set->execute(
        array(
            ':name'=>$name,
            ':text'=>$text,
            ':price'=>$price,
            ':id'=>$id
        )
    );
    
    if($update_prod_set->rowCount()){
        redirect_to('index.php');
    }else{
        $message = 'Something went wrong!';
        return $message;
    }
}

function deleteProduct($id){
	include('connect.php');
	$delete_prod_query = 'DELETE FROM tbl_products WHERE prod_id = :id';
	$delete_prod = $pdo->prepare($delete_prod_query);
	$delete_prod->execute(
		array(
			':id'=>$id
		)
	);

	if($delete_prod){
		redirect_to('../index.php');
	}else{
		$message = 'Not deleted yet..';
		return $message;
	}
}
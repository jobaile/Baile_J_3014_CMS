<?php

function addProduct($pic, $name, $text, $price) {
    try {
        include 'connect.php';

        //Validate File
        $file_type      = pathinfo($pic['prod_name'], PATHINFO_EXTENSION);
        $accepted_types = array('jpg', 'gif', 'jpeg', 'png');
        if (!in_array($file_type, $accepted_types)) {
            throw new Exception('Wrong file type!');
        }

        //Image target path
        $target_path = '../images/' . $pic['prod_name'];
        if (!move_uploaded_file($pic['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $insert_prod_query = 'INSERT INTO tbl_products(prod_pic, prod_name, prod_text, prod_price)';
        $insert_prod_query .= ' VALUES(:pic, :name, :text, :price)';

        $insert_prod   = $pdo->prepare($insert_prod_query);
        $insert_result = $insert_prod->execute(
            array(
                ':pic'       => $pic['prod_name'],
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

        header("Location: index.php");

    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}
function editProduct($id, $name, $pic, $cat_id) {
    try {
        include 'connect.php';

        if($pic){
            //Validate the file type
            $file_type      = pathinfo($pic['prod_name'], PATHINFO_EXTENSION);
            $accepted_types = array('gif', 'jpg', 'jpeg', 'png');
            if (!in_array($file_type, $accepted_types)) {
                throw new Exception('Wrong file type!');
            }

            //Moving the image
            $target_path = '../images/' . $pic['prod_name'];
            if (!move_uploaded_file($pic['tmp_name'], $target_path)) {
                throw new Exception('Failed to move uploaded file, check permission!');
            }

            $update_product_query = 'UPDATE tbl_products SET prod_pic = :pic, prod_name = :name WHERE prod_id = :id';
            $update_product_set = $pdo->prepare($update_product_query);
            $update_product_set->execute(
                array(
                    ':pic' => $pic['prod_name'],
                    ':name' => $name,   
                    ':id' => $id
                )
            );

        } else {
            $update_product_query = 'UPDATE tbl_products SET prod_name = :name WHERE prod_id = :id';
            $update_product_set = $pdo->prepare($update_product_query);
            $update_product_set->execute(
                array(
                    ':name' => $name,
                    ':id' => $id
                )
            );
			 
			if($update_product_set->execute())
			{
                header("Location: admin_editproduct.php");                
            }
        }

        if($cat_id) {
            $change_cat_query = 'UPDATE tbl_prod_cat SET cat_id = :cat_id WHERE prod_id = :prod_id';
            $change_cat_set = $pdo->prepare($change_cat_query);
            $change_cat_set->execute(
                array(
                    ':prod_id' => $prod_id,
                    ':cat_id' => $cat_id
                )
            );
        }

    } catch(PDOException $e) {
        echo $e->getMessage();
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
        unlink("../images/".$row['prod_pic']);
		redirect_to('../index.php');
	}else{
		$message = 'Not deleted yet..';
		return $message;
	}
}

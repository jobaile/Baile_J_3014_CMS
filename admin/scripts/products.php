<?php

function addProduct($pic, $name, $text, $price, $cat) {
    try {
        include 'connect.php';

        // //Validate File
        $file_type      = pathinfo($pic['name'], PATHINFO_EXTENSION);
        $accepted_types = array('gif', 'jpg', 'jpeg', 'png');
        if (!in_array($file_type, $accepted_types)) {
            throw new Exception('Wrong file type!');
        }

        //Image target path
        $target_path = '../images/' . $pic['name'];
        if (!move_uploaded_file($pic['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        //Query
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
        
        //Category query
        $last_id = $pdo->lastInsertId();
        $insert_cat_query = 'INSERT INTO tbl_prod_cat (prod_id, cat_id) VALUES ("'. $last_id.'", :cat_id)';
        $insert_cat       = $pdo->prepare($insert_cat_query);
        $insert_cat->execute(
            array(
                ':cat_id'  => $cat,
            )
        );

        header("Location: index.php");

    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

function editProduct($pic, $name, $desc, $price, $category) {
      
      try {
          include 'connect.php';
        
        if (isset($_GET['update_id'])) {
          $edit_cat = $_GET['update_id'];
        }

        if($pic){
            //! image file information
            $product_image_type = $pic['type'];

            $file_type      = pathinfo($pic['name'], PATHINFO_EXTENSION);
            $accepted_types = array('gif', 'jpg', 'jpeg', 'png');
            if (!in_array($file_type, $accepted_types)) {
                throw new Exception('Wrong file type!');
            }

            //Image target path
            $target_path = '../images/' . $pic['name'];
            if (!move_uploaded_file($pic['tmp_name'], $target_path)) {
                throw new Exception('Failed to move uploaded file, check permission!');
            }

            $query = "UPDATE tbl_products SET prod_name = :product_name, prod_pic = :product_image, prod_text = :product_text, prod_price = :product_price; WHERE prod_id = :product_id";

            $edit_product = $pdo->prepare($query);
            $edit_product->execute(
            array(
                ':product_image' => $pic,
                ':product_name' => $name,
                ':product_price' => $price,
                ':product_text' => $desc,
                ':product_id' => $edit_cat,
            )
            );


            if (!$edit_product) {
            throw new Exception('Failed to update product');
            }

        } else {
            $query = "UPDATE tbl_products SET prod_name = :product_name, prod_price = :product_price, prod_text = :product_text WHERE prod_id = :product_id";

            $edit_product = $pdo->prepare($query);
            $edit_product->execute(
            array(
                ':product_name' => $name,
                ':product_price' => $price,
                ':product_text' => $desc,
                ':product_id' => $edit_cat,
            )
            );

        }

    if($category){

        $change_cat_query = "UPDATE tbl_prod_cat SET cat_id = :cat_id WHERE prod_id = :product_id";
        $change_cat = $pdo->prepare($change_cat_query);
        $change_cat->execute(
            array(
                ':product_id' => $edit_cat,
                ':cat_id' => $category
            )
        );
        if (!$change_cat) {
            throw new Exception('Failed to change categories');
        }
    }

        header("Location:admin_editproduct.php");

    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }

    header("Location:admin_editproduct.php");
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

<?php

function addProduct($pic, $name, $text, $price, $cat) {
    try {
        include 'connect.php';

        // //Validate File
        // $file_type      = pathinfo($pic['name'], PATHINFO_EXTENSION);
        // $accepted_types = array('gif', 'jpg', 'jpeg', 'png');
        // if (!in_array($file_type, $accepted_types)) {
        //     throw new Exception('Wrong file type!');
        // }

        //Image target path
        $target_path = '../images/' . $pic['name'];
        if (!move_uploaded_file($pic['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file, check permission!');
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
        $insert_cat_query = 'INSERT INTO tbl_prod_cat (prod_id, cat_id) VALUES ("' . $last_id . '", :cat_id)';
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

function editProduct($id, $prod_name, $prod_pic) {
    try {
        include 'connect.php';
		$prod_name	=$_REQUEST['name'];	//textbox name "txt_name"
		
		$prod_pic	= $_FILES["pic"]["name"];
		$type		= $_FILES["pic"]["type"];	//file name "txt_file"
		$size		= $_FILES["pic"]["size"];
		$temp		= $_FILES["pic"]["tmp_name"];
			
		$path="upload/".$prod_pic; //set upload folder path
		
		$directory="upload/"; //set upload folder path for update time previous file remove and new file upload for next use
		
		if($prod_pic)
		{
			if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
			{	
				if(!file_exists($path)) //check file not exist in your upload folder path
				{
					if($size < 5000000) //check file size 5MB
					{
						unlink($directory.$row['prod_image']); //unlink function remove previous file
						move_uploaded_file($temp, "upload/" .$prod_pic);	//move upload file temperory directory to your upload folder	
					}
					else
					{
						$errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
					}
				}
				else
				{	
					$errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
				}
			}
			else
			{
				$errorMsg="Upload JPG, JPEG, PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
			}
		}
		else
		{
			$prod_pic=$row['prod_pic']; //if you not select new image than previous image sam it is it.
		}
	
		if(!isset($errorMsg))
		{
			$update_stmt=$pdo->prepare('UPDATE tbl_products SET prod_name=:name_up, prod_pic=:file_up WHERE prod_id=:id'); //sql update query
			$update_stmt->bindParam(':name_up',$prod_name);
			$update_stmt->bindParam(':file_up',$prod_pic);	//bind all parameter
			$update_stmt->bindParam(':id',$id);
			 
			if($update_stmt->execute())
			{
                header("Location: index.php");                 
			}
		}
    }
    
	catch(PDOException $e)
	{
		echo $e->getMessage();
    }

    header("Location: index.php");                
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

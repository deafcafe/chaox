<?php

require 'functions.php';

if(isset($_POST['create']))
{
	if(!empty($_FILES['image']) && $_FILES['image']['error'] == 0 && !empty($_POST['cg_desc']) && !empty($_POST['cg_title']))
	{
		$upload_directory = '/opt/lampp/uploads/';
		$description = htmlspecialchars($_POST['cg_desc']);
		$title = htmlspecialchars($_POST['cg_title']);
		$key = generate_key();
        $verify_image = getimagesize($_FILES['image']['tmp_name']);

        /* Checking MIME Type*/
        $pattern = "#^(image/)[^\s\n<]+$#i";

        if(!preg_match($pattern, $verify_image['mime'])){
            die("Only image files are allowed!");
        }

        /* Rename name and extenstion*/
        $upload_file = tempnam_sfx($upload_directory, ".tmp");

        /* Upload the file with new name and extension */
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
    	    $name = basename($uploadfile);
            $real_name = basename($_FILES['image']['name']);
            $mime_type = $_FILES['image']['type'];

    		if(App::get('database')->insert('groups', ['group_title' => $title, 'group_desc' => $description, 'group_key' => $key, 'g_picname' => $name, 'gpic_original_name' => $real_name, 'gpic_mime_type' => $mime_type]))
    		{
    			$session = new Session();
    			$session->set('key', $key);
    			header('Location: http://localhost/chatox/');
    		}	
    		else
    			unlink($upload_file);
       
	   }
    }
}
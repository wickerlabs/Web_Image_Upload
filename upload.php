<?php

// Turn display error off
ini_set('display_errors','off');

// the directory to save uploaded images
$target_dir = "uploads/";

if(isset($_FILES["imageFile"])) {

    $tmp_image_file = $_FILES["imageFile"]["tmp_name"];
    $image_file = $_FILES["imageFile"]["name"];

    // Upload if file is a valid image
    if(getimagesize($tmp_image_file)) {

        $target_file = $target_dir . basename($image_file);  // path on where to save the image file

        // Create the 'target_dir' directory if it does not exists.
        if (!is_dir($target_dir)) {
            mkdir($target_dir);
        }

        // Move the uploaded image file to the 'target_dir'
        if (move_uploaded_file($tmp_image_file, $target_file)) {
            header("Location: index.html?s=1");
            die();
        } else {
            header("Location: index.html?s=0");
            die();
        }
    } else {
        header("Location: index.html?s=0");
        die();
    }
}
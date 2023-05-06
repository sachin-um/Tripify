<?php
    function uploadImage($img,$img_name,$location){
        $target=PUBROOT.$location.$img_name;

        return move_uploaded_file($img,$target);
    }

    function updateImage($old,$img,$img_name,$location){
        unlink($old);
        $target=PUBROOT.$location.$img_name;

        return move_uploaded_file($img,$target);
    }

    function deleteImage($img)
    {
        if (unlink($img)) {
            return true;
        }
        else {
            return false;
        }
    }

    function updateImageGallary($old_images, $new_images, $image_names, $location) {
        $num_images = count($new_images['name']);
        $uploaded_image_names = array();

        $flag=true;

        foreach ($old_images as $old_image) {
            unlink(PUBROOT . $location . $old_image);
        }
    
        for ($i = 0; $i < $num_images; $i++) {
            $name = $image_names[$i];
            $uploaded_image_names[] = $name;
            if (!move_uploaded_file($new_images['tmp_name'][$i], PUBROOT . $location . $name)) {
                // handle error and return
                $flag=false;
            }
        }

        return $flag;
    
    }

    function uploadImageGallary($image_names,$new_images, $location) {
        $num_images = count($new_images['name']);
        $uploaded_image_names = array();

        $flag=true;
    
        for ($i = 0; $i < $num_images; $i++) {
            $name =  $image_names[$i];
            $uploaded_image_names[] = $name;
            if (!move_uploaded_file($new_images['tmp_name'][$i], PUBROOT . $location . $name)) {
                // handle error and return
                $flag=false;
            }
        }

        return $flag;
    
    }
    

?>
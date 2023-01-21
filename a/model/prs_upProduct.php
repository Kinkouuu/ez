<?php
require_once("../control/head.php");
?>
<?php
$p_id = post('p_id');
// echo $p_id;
$p = $db->query("SELECT * FROM `product` WHERE `p_id` = '$p_id'")->fetch();
// Client ID of Imgur App 
$IMGUR_CLIENT_ID = "21cc7d2a74b1ed5";
$statusMsg = '';
$imgurData = array();

// If the form is submitted 
if (isset($_POST['submit'])) {

    // Check whether user inputs are empty 
    if (!empty($_FILES["image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Source image 
            $image_source = file_get_contents($_FILES['image']['tmp_name']);

            // API post parameters 
            $postFields = array('image' => base64_encode($image_source));

            if (!empty($_POST['title'])) {
                $postFields['title'] = $_POST['title'];
            }

            if (!empty($_POST['description'])) {
                $postFields['description'] = $_POST['description'];
            }

            // Post image to Imgur via API 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image');
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            $response = curl_exec($ch);
            curl_close($ch);

            // Decode API response to array 
            $responseArr = json_decode($response);

            // Check image upload status 
            if (!empty($responseArr->data->link)) {
                $imgurData = $responseArr;
                $p_img = $imgurData->data->link;
                // echo $p_img;
            
            } else {
                $p_img = $p['p_img'];
                $msg = 'Image upload failed, please try again after some time.';
                echo '<script>alert("Image upload failed, please try again after some time."); window.location = "../view/upProduct.php?p_id=' . $p_id . ' ";</script>';
            }
        } else {
            $p_img = $p['p_img'];
            $msg = 'Sorry, only an image file is allowed to upload.';
            echo '<script>alert("Sorry, only an image file is allowed to upload."); window.location = "../view/upProduct.php?p_id=' . $p_id . ' ";</script>';
        }
    } else {
        $p_img = $p['p_img'];
    }
    //information
                $name = post('name');
                $c_id = post('type');
                $f_id = post('f_id');
                $specs = post('specs');
                $p_gb = post('p_gb');
                $p_stock = post('p_stock');
                $p_50 = post('p_50');
                $p_10 = post('p_10');
                $m_id = post('m_id');
                $remain = post('remain');
                $video = post('video');
                // echo $video;
                $db->exec("UPDATE `product` SET `p_name` = '$name', `c_id` = '$c_id', `f_id` = '$f_id',`p_img` = '$p_img', `specs` = '$specs',`remain` = '$remain',`video` = '$video' WHERE `p_id` = '$p_id'");
                $up = $db->query("UPDATE `price` SET `p_gb` = '$p_gb',`p_stock` = '$p_stock',`p_50` = '$p_50',`p_10` = '$p_10' WHERE `p_id` = '$p_id'");
                //  var_dump($up);
                echo '<script>alert("Update product\'s infomation successfully"); window.location = "../view/upProduct.php?p_id= '.$p_id.' ";</script>';
}
?>
<?php
require_once("../control/end.php");

?>
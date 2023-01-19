<?php
require_once("../control/head.php");
?>
<?php
// Client ID of Imgur App 
$IMGUR_CLIENT_ID = "21cc7d2a74b1ed5";


$statusMsg = $valErr = '';
$status = 'danger';
$imgurData = array();

// If the form is submitted 
if (isset($_POST['save'])) {

    // Validate form input fields 
    if (empty($_FILES["image"]["name"])) {
        $valErr .= 'Please select a file to upload.<br/>';
    }

    // Check whether user inputs are empty 
    if (empty($valErr)) {
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
            //information
                $name = post('name');
                $c_id = post('type');
                $f_id = post('f_id');
                $specs = post('spec');
                $p_gb = post('p_gb');
                $p_stock = post('p_stock');
                $p_50 = post('p_50');
                $p_10 = post('p_10');
                $m_id = post('money');
                $remain = post('remain');
                $video = post('video');
                $db->query("INSERT INTO `product` (`p_img`, `p_name`,`f_id`, `c_id`,`specs`,`remain`,`video`) VALUES ('$p_img','$name','$f_id','$c_id','$specs','$remain','$video')");
                $p_id = $db->lastInsertId();
                $insert = $db->exec ("INSERT INTO `price` (`p_id`,`m_id`,`p_gb`,`p_stock`,`p_10`,`p_50`) VALUES ('$p_id','$m_id','$p_gb','$p_stock','$p_10','$p_50')");
                echo '<script>alert("Add new product infomation successfully"); window.location = "../product.php ";</script>';
            } else {
                $msg = 'Image upload failed, please try again after some time.';
                header("location:../view/addProduct.php?msg='$msg'");
            }
        } else {
            $msg = 'Sorry, only an image file is allowed to upload.';
            header("location:../view/addProduct.php?msg='$msg'");
        }
    } else {
        $msg = 'Please add an image file';
        header("location:../view/addProduct.php?msg='$msg'");
    }
}
?>
<?php
require_once("../control/end.php");

?>
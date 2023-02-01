<?php
require_once("../control/head.php");
if (!isset($_SESSION['admin'])){
    echo '<script>alert("You must login with admin account");window.location = "http:/ez/a/index.php";</script>';
  }else{
    $a_id = $_SESSION['admin'];
  }
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
                $sm_id = post('smt');
                $specs = post('specs');
                $p_gb = post('p_gb');
                $p_stock = post('p_stock');
                $p_50 = post('p_50');
                $p_10 = post('p_10');
                $m_id = post('m_id');
                $remain = post('remain');
                $video = post('video');
                $check = $db->query("SELECT * FROM (`product` INNER JOIN `price` ON `product`.p_id = `price`.p_id) INNER JOIN `money` ON `price`.m_id = `money`.m_id WHERE `product`.p_id = '$p_id'")->fetch();

                if($name != $check['p_name']){
                    $p_name = $check['p_name']; 
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi tên của sản phẩm `$p_id - $p_name` thành `$name`')");
                }if($c_id != $check['c_id']){
                    $cid = $check['c_id'];
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi mã phân loại của sản phẩm `$p_id - $name` từ `$cid` thành `$c_id`')");
                }if($f_id != $check['f_id']){
                    $fid = $check['f_id'];
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi mã phân loại của sản phẩm `$p_id - $name` từ `$fid` thành `$f_id`')");
                }if($sm_id != $check['sm_id']){
                    $smid = $check['sm_id'];
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi mã lô hàng của sản phẩm `$p_id - $name` từ `$smid` thành `$sm_id`')");
                }if($specs != $check['specs']){
                    $spec = $check['specs'];
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi mô tả của sản phẩm `$p_id - $name` từ `$spec` thành `$specs`')");
                }if($p_gb != $check['p_gb'] || $m_id != $check['m_id']){
                    $pgb = $check['p_gb'];
                    $money = $db->query("SELECT * FROM `money` WHERE `m_id` = '$m_id'")->fetch();
                    $signal = $money['sign'];
                    $sign = $check['sign'];
                    // echo $pgb . ' ' . $sign . '=>' . $p_gb . ' ' . $signal;
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi giá mở gb của sản phẩm `$p_id - $name` từ `$pgb.$sign` thành `$p_gb.$signal`')");
                }if($p_stock != $check['p_stock']){
                    $stock = $check['p_stock'];
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi giá stock của sản phẩm `$p_id - $name` từ $stock VND thành `$p_stock` VND')");
                }if($p_50 != $check['p_50']){
                    $p50 = $check['p_50'];
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi giá gia tăng 50% của sản phẩm `$p_id - $name` từ `$p50` VND thành `$p_50` VND')");
                }if($p_10 != $check['p_10']){
                    $p10 = $check['p_10'];
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi giá gia tăng 10% của sản phẩm `$p_id - $name` từ `$p10` VND thành `$p_10` VND')");
                }if($remain != $check['remain']){
                    $con= $check['remain'];
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi số lượng của sản phẩm `$p_id - $name` từ `$con` thành `$remain`')");
                }if($video != $check['video']){
                    $db->exec("INSERT INTO `history` (`a_id`,`action`) VALUES ('$a_id','Đã thay đổi link review của sản phẩm `$p_id - $name` thành `$video`')");
                }
                $db->exec("UPDATE `product` SET `p_name` = '$name', `c_id` = '$c_id',`sm_id` = '$sm_id', `f_id` = '$f_id',`p_img` = '$p_img', `specs` = '$specs',`remain` = '$remain',`video` = '$video' WHERE `p_id` = '$p_id'");
                $db->query("UPDATE `price` SET `p_gb` = '$p_gb',`p_stock` = '$p_stock',`p_50` = '$p_50',`p_10` = '$p_10' WHERE `p_id` = '$p_id'");
                //  var_dump($up);
                echo '<script>alert("Update product\'s infomation successfully"); window.location = "../view/upProduct.php?p_id= '.$p_id.' ";</script>';
}
?>
<?php
require_once("../control/end.php");

?>
<?php
require_once("../control/head.php");
?>
<!-- up anh -->
<?php
// Client ID of Imgur App 
$IMGUR_CLIENT_ID = "21cc7d2a74b1ed5";
$statusMsg = $valErr = ''; 
$imgurData = array(); 
 
// If the form is submitted 
if(isset($_POST['save'])){ 
     
    // Validate form input fields 
    if(empty($_FILES["image"]["name"])){ 
        $valErr .= 'Please select a file to upload.<br/>'; 
    } 
     
    // Check whether user inputs are empty 
    if(empty($valErr)){ 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Source image 
            $image_source = file_get_contents($_FILES['image']['tmp_name']); 
             
            // API post parameters 
            $postFields = array('image' => base64_encode($image_source)); 
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
            if(!empty($responseArr->data->link)){ 
                $imgurData = $responseArr; 
                $img = $imgurData->data->link;
                
                $name = post('name');
                $mail = post('mail');
                $phone = post('phone');
                $represent = post('represent');
                $rep_phone = post('rep_phone');
                $street = post('street');
                $ward = post('ward');
                $district = post('district');
                $city = post('city');
                $nation = post('nation');
                $license = post('license');
                $db->exec("INSERT INTO `factory` (`f_name`, `f_img`,`f_mail`, `f_phone`, `represent`,`rep_phone`,`f_street`,`f_ward`,`f_district`,`f_city`,`f_nation`,`license`) VALUES ('$name','$img','$mail','$phone','$represent','$rep_phone','$street','$ward','$district','$city','$nation','$license')" );
                echo '<script>alert("Add new fatory infomation successfully"); window.location = "../factory.php ";</script>';
            }else{ 
                $msg = 'Image upload failed, please try again after some time.';
                header("location:../view/addFact.php?msg='$msg'");
            } 
        }else{ 
            
            $msg = 'Sorry, only an image file is allowed to upload.';
            header("location:../view/addFact.php?msg='$msg'");
        } 
    }else{  
        // header("location:../view/addFact.php");
        $msg = 'Please add an image file';
        header("location:../view/addFact.php?msg='$msg'");
    } 
} 
 
?>

<?php
require_once("../control/end.php");
?>
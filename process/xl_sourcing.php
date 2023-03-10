
<?php
require_once ("../template/core.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';


$IMGUR_CLIENT_ID = "21cc7d2a74b1ed5";

$statusMsg = $valErr = '';
$status = 'danger';
$imgurData = array();

// If the form is submitted 
if (isset($_POST['send'])) {

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

                $name = post('name');
                $email = post('email');
                $phone = post('phone');
                $brand = post('brand');
                $item = post('item');
                $spec = post('spec');
                $request = post('request');
                $price = post('price');
                $quantity = post('quantity');
                $deposit = post('deposit');
                $open = post('open');
                echo $name;
                $mail = new PHPMailer(true);   
                try {
                    //Server settings
                    $mail->SMTPDebug = 0; // Enable verbose debug output
                    $mail->isSMTP(); // g???i mail SMTP
                    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'startsourcingEzsupply@gmail.com'; // SMTP username
                    $mail->Password = 'jwwyujfymapywkin'; // SMTP password
                    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Mailer = "smtp";
                    $mail->Port = 465; // TCP port to connect to
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    $mail->CharSet = 'UTF-8'; // SMTP charset
                    //Recipients
                    $mail->setFrom('startsourcingEzsupply@gmail.com', 'EZSUPPLY');

                    $mail->addAddress('cedric.mquangtr@gmail.com','CSKH'); // Add a recipient

                    $mail->addReplyTo('cedric.mquangtr@gmail.com', 'CSKH');

                    $mail->addCC($email);


                    // Content
                    $mail->isHTML(true);   // Set email format to HTML
                    $mail->Subject = 'GB REQUEST';
                    $mail->Body = 'Ch??ng t??i ???? nh???n ???????c y??u c???u c???a b???n v???i n???i dung nh?? sau: <br>
                        - T??n kh??ch h??ng:' . $name .
                        '<br>- S??? ??i???n tho???i: ' . $phone .
                        '</br><br>- Email: ' . $email . 
                        '</br><br>- T??n s???n ph???m: ' . $item .
                        '</br><br>- Nh??n hi???u: ' . $brand .
                        '</br><br>- M?? t??? s???n ph???m: ' . $spec .
                        '</br><br>- Y??u c???u v??? s???n ph???m: ' . $request .
                        '</br><br>- Gi?? khuy???n ngh???: ' . $price .
                        '</br><br>- S??? l?????ng mu???n ?????t mua: ' . $quantity .
                        '</br><br>- S??? l?????ng s???n ph???m ???? ???????c c???c: ' . $deposit .
                        '</br><br>- Ng??y d??? ki???n m??? b??n: ' . $open .
                        '</br><br>- H??nh ???nh s???n ph???m: ' . $p_img.
                        '</br><br> Ch??ng t??i s??? t??m ki???m nh?? cung c???p ph?? h???p v???i y??u c???u c???a b???n v?? s??? ph???n h???i s???m t???i b???n.';
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    if ($mail->send()) {
                        $statusMsg = 'Y??u c???u c???a b???n ???? ???????c g???i ??i!';
                    }
                } catch (Exception $e) {
                    $statusMsg ='???? c?? l???i x???y ra. Vui l??ng th??? l???i sau ??t ph??t';
                }
            } else {
                $statusMsg = 'Vui l??ng ch???n l???i h??nh ???nh s???n ph???m m???u.';
            }
        } else {
            $statusMsg = '?????nh d???ng file ???nh kh??ng ph?? h???p.';
        }
    } else {
        $statusMsg =  trim($valErr, '<br/>');
    }
    echo $statusMsg;
    echo '<script>window.location="../index.php?action=timnguonhang&status='.$statusMsg .'"</script>';
}
?>
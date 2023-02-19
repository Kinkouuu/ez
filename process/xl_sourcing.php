
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
                    $mail->isSMTP(); // gửi mail SMTP
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
                    $mail->Body = 'Chúng tôi đã nhận được yêu cầu của bạn với nội dung như sau: <br>
                        - Tên khách hàng:' . $name .
                        '<br>- Số điện thoại: ' . $phone .
                        '</br><br>- Email: ' . $email . 
                        '</br><br>- Tên sản phẩm: ' . $item .
                        '</br><br>- Nhãn hiệu: ' . $brand .
                        '</br><br>- Mô tả sản phẩm: ' . $spec .
                        '</br><br>- Yêu cầu về sản phẩm: ' . $request .
                        '</br><br>- Giá khuyến nghị: ' . $price .
                        '</br><br>- Số lượng muốn đặt mua: ' . $quantity .
                        '</br><br>- Số lượng sản phẩm đã được cọc: ' . $deposit .
                        '</br><br>- Ngày dự kiến mở bán: ' . $open .
                        '</br><br>- Hình ảnh sản phẩm: ' . $p_img.
                        '</br><br> Chúng tôi sẽ tìm kiếm nhà cung cấp phù hợp với yêu cầu của bạn và sẽ phản hồi sớm tới bạn.';
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    if ($mail->send()) {
                        $statusMsg = 'Yêu cầu của bạn đã được gửi đi!';
                    }
                } catch (Exception $e) {
                    $statusMsg ='Đã có lỗi xảy ra. Vui lòng thử lại sau ít phút';
                }
            } else {
                $statusMsg = 'Vui lòng chọn lại hình ảnh sản phẩm mẫu.';
            }
        } else {
            $statusMsg = 'Định dạng file ảnh không phù hợp.';
        }
    } else {
        $statusMsg =  trim($valErr, '<br/>');
    }
    echo $statusMsg;
    echo '<script>window.location="../index.php?action=timnguonhang&status='.$statusMsg .'"</script>';
}
?>
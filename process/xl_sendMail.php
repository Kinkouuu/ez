
<?php 

use PHPMailer\PHPMailer\PHPMailer;
if (isset($_POST['send'])) {
            // echo $name . ' ' . $email . ' ' . $subject;
            function sendmail(){
                $name = $_POST['name'];  // Name of your website or yours
                $to =  $_POST['email'];// mail of reciever
                $subject =  $_POST['subject'];
                $body = $_POST['mess'];

                // $name = 'name';  // Name of your website or yours
                // $to =  'chuckinkou2k1@gmail.com';// mail of reciever
                // $subject = 'subject';
                // $body = 'mess';
                $from = "startsourcingEzsupply@gmail.com";  // you mail
                $password = "jwwyujfymapywkin";  // your mail password
        
                // Ignore from here
        
                require_once "PHPMailer/PHPMailer.php";
                require_once "PHPMailer/SMTP.php";
                require_once "PHPMailer/Exception.php";
                $mail = new PHPMailer();
        
                // To Here
        
                //SMTP Settings
                $mail->isSMTP();
                // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
                $mail->Host = "smtp.gmail.com"; // smtp address of your email
                $mail->SMTPAuth = true;
                $mail->Username = $from;
                $mail->Password = $password;
                $mail->Port = 25;  // port
                $mail->SMTPSecure = "tls";  // tls or ssl
                $mail->smtpConnect([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    ]
                ]);
        
                //Email Settings
                $mail->isHTML(true);
                $mail->setFrom($from,'EZSUPPLY');
                $mail->addAddress($to, $name); // enter email address whom you want to send
                $mail->addReplyTo('cedric.mquangtr@gmail.com', 'CSKH');
                // $mail->addCC('cedric.mquangtr@gmail.com', 'CSKH');
                $mail->Subject = ("$subject");
                $mail->Body = 
                'Cảm ơn bạn đã gửi phản hồi tới EZSUPPLY. Chúng tôi xin ghi nhận phản hồi của bạn như sau: <br>'
                .$body.
                '<br> Ezsupply sẽ liên lạc với bạn nhanh nhất có thể. ';
                if ($mail->send()) {
                    $statusMsg = 'Đã gửi thành công';
                    echo '<script>window.location="../index.php?action=homthugopy&status='.$statusMsg .'"</script>';
                } else {
                    $statusMsg = 'Đã có lỗi xảy ra. Vui lòng thử lại sau ít phút.';
                    echo '<script>window.location="../index.php?action=homthugopy&status='.$statusMsg .'"</script>';
                }
            }

                sendmail();
            }
        
    ?>

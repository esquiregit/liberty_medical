<?php
    require_once 'conn.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once 'src/PHPMailer.php';
    require_once 'src/SMTP.php';
    require_once 'src/Exception.php';

    define('EMAIL_ACCOUNT', 'liberty.medical.labs@gmail.com');
    define('EMAIL_PASSWORD', 'pa$$word123456');
    define('SMTP_HOST', 'smtp.gmail.com');
    define('SECURE_SOCKET', 'ssl');
    define('PORT', 465);
    
    class Email {

        public static function send_email($email_address, $subject, $html_message, $message){
            try{
                $mail             = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host       = SMTP_HOST;
                $mail->SMTPAuth   = true;
                $mail->Username   = EMAIL_ACCOUNT;
                $mail->Password   = EMAIL_PASSWORD;
                $mail->SMTPSecure = SECURE_SOCKET;
                $mail->Port       = PORT;

                $mail->setFrom(EMAIL_ACCOUNT, 'Liberty Medical Laboratories');
                $mail->addAddress($email_address, $email_address);

                $mail->isHTML(true);
                $mail->Subject    = $subject;
                $mail->Body       = $html_message;
                $mail->AltBody    = $message;

                $mail->send();
                return  true;
            }catch(Exception $ex){
                return false;
            }
        }

        public static function get_password_reset_message($staff_id, $name, $reset_code) {
            $message  = "Good day <strong>$name</strong><br /><br />";
            $message .= "You requested a password reset of your account on <strong>Liberty Medical Lab System</strong>.<br />";
            $message .= "Click this <a target='_target' href='http://localhost:3000/password-change/$staff_id/$reset_code'>Link</a> to reset your password. If you didn't request this action please ignore this message.";
            $message .= "<br /><br /><br /><br />Thank you and have a good day.<br />The <strong>Liberty Medical Lab System</strong> Support Team";

            return $message;
        }
        
    }
?>
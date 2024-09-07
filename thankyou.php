<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Composer autoload

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $company = htmlspecialchars(trim($_POST['company']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Tạo đối tượng PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP Server
        $mail->isSMTP();                                            // Sử dụng SMTP
        $mail->Host       = 'smtp.gmail.com';                       // SMTP server của bạn (ở đây là Gmail)
        $mail->SMTPAuth   = true;                                   // Bật xác thực SMTP
        $mail->Username   = 'khangnm2804@gmail.com';                 // Địa chỉ email của bạn
        $mail->Password   = 'bxoq sbzr yaui ijcz';                  // Mật khẩu ứng dụng (App Password) hoặc mật khẩu email của bạn
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Bật mã hóa TLS
        $mail->Port       = 587;                                    // Cổng kết nối SMTP của Gmail

        // Cấu hình email người gửi và người nhận
        $mail->setFrom('khangnm2804@gmail.com', 'Nguyễn Minh Khang');
        $mail->addAddress($email, $name);                           // Gửi email tới người dùng

        // Nội dung email
        $mail->isHTML(true);                                        // Định dạng email HTML
        $mail->Subject = 'Thank You for Contacting Us!';
        $mail->Body    = "
            <h2>Thank you for contacting us, $name!</h2>
            <p>We have received your message and will get back to you shortly.</p>
            <h4>Here is the information you provided:</h4>
            <ul>
                <li><strong>Name:</strong> $name</li>
                <li><strong>Email:</strong> $email</li>
                <li><strong>Phone:</strong> $phone</li>
                <li><strong>Company:</strong> $company</li>
                <li><strong>Message:</strong> $message</li>
            </ul>
            <p>Best regards,<br>Your Company Support Team</p>";

        // Gửi email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .thank-you-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0056b3;
            /* Bootstrap Primary Color */
        }

        .thank-you-message {
            margin-top: 15px;
            margin-bottom: 20px;
            font-size: 1.1rem;
            color: #333;
        }

        .contact-details {
            font-size: 1.1rem;
        }

        .contact-details ul {
            list-style: none;
            padding: 0;
        }

        .contact-details ul li {
            margin-bottom: 10px;
        }

        .contact-details ul li strong {
            font-weight: bold;
        }

        .contact-details ul li a {
            color: #0056b3;
            /* Link color */
            text-decoration: none;
        }

        .contact-details ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="thank-you-header">
                    Thank you for contacting us
                </div>
                <div class="thank-you-message">
                    We will be back in touch with you within one business day using the information you just provided below:
                </div>

                <div class="contact-details">
                    <ul>
                        <li><strong>Name:</strong> <?php echo $name; ?></li>
                        <li><strong>Phone:</strong> <?php echo $phone; ?></li>
                        <li><strong>Email Address:</strong> <?php echo $email; ?></li>
                        <li><strong>Company:</strong> <?php echo $company; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
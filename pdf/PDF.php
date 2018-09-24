<?php

require_once './vendor/autoload.php';

use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;

class PDF extends Dompdf {

    public function __construct() {

        parent::__construct();
    }

    public function send($id, $name, $surname, $email, $phone, $policy, $departureDate, $returnDate) {

        $fileName = md5(rand()) . ".pdf";
        
        
        $html = '<body>
            <div class="container">
                <table class="table table-sm table-dark mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Policy holder</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Type of travel</th>
                        <th scope="col">Departure - Return</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . ' ' . $surname . '</td>
                        <td>' . $email . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $policy . '</td>
                        <td>' . $departureDate . ' - ' . $returnDate . '</td>
                    </tr>
                </tbody>
            </table>
        </div>
     </body>';

        $this->load_html($html);
        $this->render();

        $file = $this->output();
        file_put_contents($fileName, $file);

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "you@something.com";
        $mail->Password = "pass";
        $mail->setFrom('you@something.com', 'You');
        $mail->addAddress($email);
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->addAttachment($fileName);
        $mail->Subject = "Policy Insurance Details";
        $mail->Body = "Please, find policy insurance details in attach PDF file.";

        if (!$mail->send()) {

            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {

            unlink($fileName);
        }
    }

}

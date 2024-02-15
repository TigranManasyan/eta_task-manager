<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SendGrid\Mail\Mail;
use SendGrid\Mail\TypeException;
use SendGrid\Mail\EmailAddress;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $apiKey = 'YOUR_SENDGRID_API_KEY';

        $from = new EmailAddress("sender@example.com", "Example Sender");
        $to = new EmailAddress("recipient@example.com", "Example Recipient");
        $subject = "Test Email from SendGrid API";
        $htmlContent = "<p>Hello, this is a test email sent using SendGrid API.</p>";

        $mail = new Mail($from, $subject, $to, null, $htmlContent);

        $sendgrid = new \SendGrid($apiKey);

        try {
            $response = $sendgrid->send($mail);
            echo "Email successfully sent!";
        } catch (TypeException $e) {
            echo "TypeException: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Exception: " . $e->getMessage();
        }
    }
}

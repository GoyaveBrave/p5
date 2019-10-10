<?php require_once 'vendor/autoload.php';

class Mail
{
    public function send(Contact $contactform)
    {
      // Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
->setUsername('majid.web98@gmail.com')
->setPassword('69520latriktkt')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Form My blog'))
->setFrom(['majid.web98@gmail.com' => 'Majid'])
->setTo(['majid.web98@gmail.com', 'other@domain.org' => 'A name'])
->setBody('Name = '.$contactform->getName().'
           Mail = '.$contactform->getEmail().'
           Subject = '.$contactform->getSubject().'
           Message = '.$contactform->getMessage().'
         ')
;

// Send the message
$result = $mailer->send($message);
    }
}
<?php

use Snipworks\Smtp\Email;
require_once(dirname(__FILE__) . '/email.php');

$mail = new Email('shadow.mxrouting.net', 587);
$mail->setProtocol(Email::TLS)
    ->setLogin('support@domain.com', 'password')
    ->setFrom('support@domain.com')
    ->setSubject('Test subject')
    ->setTextMessage('Plain text message')
    ->setHtmlMessage('<strong>HTML Text Message</strong>')
    ->addTo('test@dingtalk.com');

if ($mail->send()) {
    echo 'SMTP Email has been sent' . PHP_EOL;
    exit(0);
}

echo 'An error has occurred. Please check the logs below:' . PHP_EOL;
print_r($mail->getLogs());

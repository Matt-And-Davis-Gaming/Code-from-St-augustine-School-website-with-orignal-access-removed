<?php
require("/pass.php");
function SendCookieToTheMail()
{
    require_once '/var/www/func/swift-mailer/lib/swift_required.php';
    //Create the Transport
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com')
      ->setPort(465)
      ->setEncryption('ssl')
      ->setUsername('mcolekrueger@gmail.com')
      ->setPassword(GMAIL_PASS)
      ;

    //Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);

    //Create a message
    $message = Swift_Message::newInstance('Test')
      ->setFrom(array('no_reply@staugustineschool.org' => 'New Bully report recieved'))
      ->setTo(array('mcolekrueger@gmail.com'))
      ->setBody('Bully report...')
      ;

    //Send the message
    $result = $mailer->send($message);

    /*
    You can alternatively use batchSend() to send the message

    $result = $mailer->batchSend($message);
    */ 
}

SendCookieToTheMail();
<?php

class MailSender {
    
	public static function Send($toEmail,$subject,$body, $type, $attach='', $attach2=''){
	    Yii::import('ext.phpmailer.JPhpMailer');
        $mail = new JPhpMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = "78.46.163.200";
        $mail->Port = 587; // or 587
        $mail->IsHTML(true);
        $mail->Username = 'noreply@barattson.com';
        $mail->Password = 'noreply0011';
        $mail->SetFrom('noreply@barattson.com', $type);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($toEmail);
        if($attach!=''){
            $mail->AddAttachment('/var/www/barattson/pdf/'.$attach);
        }
        if($attach2!=''){
            $mail->AddAttachment('/var/www/barattson/pdf/'.$attach2);
        }
        if(!$mail->Send())
        {
            //echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        }
        else
        {
            return true;
        }
	}
}

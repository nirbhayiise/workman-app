
<?php


       $to = 'nirbhayiise@gmail.com,deepak.sanadiamond@gmail.com';
               $subject = 'Test Email';
               $from = 'noreply@theconsulateng.org';

               $headers  = 'MIME-Version: 1.0' . "\r\n";
               $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

               $headers .= 'From: '.$from."\r\n".
               'Reply-To: '.$from."\r\n" .
               'X-Mailer: PHP/' . phpversion();

          // Compose a simple HTML email message

               $message = 'Hello,'.'<br/>';
               $message .= 'Nirbhay Pratap Singh !!';
                    
        mail($to, $subject, $message, $headers); 
    

?>
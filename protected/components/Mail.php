<?php
	class Mail{
		
		public static function send($to,$contents,$subject,$alternative) {
			require_once('libs/phpmailer/class.phpmailer.php');
			$mail	= new PHPMailer();
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->SMTPAuth   = true; // enable SMTP authentication
			$mail->SMTPSecure = "tls"; // sets the prefix to the servier
			$mail->Host       = "smtp.gmail.com"; // sets GMAIL as the SMTP server
			$mail->Port       = 587; // set the SMTP port for the GMAIL server
			$mail->Username   = "robot@eksimail.com"; // GMAIL username
			$mail->Password   = "robot;123"; // GMAIL password
			$mail->SetFrom('robot@eksimail.com', 'Ekşimail Robotu');
			$mail->AddReplyTo("robot@eksimail.com","Ekşimail Robotu");	
			$mail->Subject    = $subject;
			$mail->AltBody    = $alternative; 
			$mail->CharSet = 'UTF-8';
			//$mail->SMTPDebug  = 2; // enables SMTP debug information (for testing)			
			$mail->MsgHTML($contents);	
			foreach($to as $t){
				$mail->AddAddress($t);
			}
			
			if (!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Message sent!";
			}
			
		}

			
	}
	
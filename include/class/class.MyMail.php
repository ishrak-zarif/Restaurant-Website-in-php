<?php
class MyMail{
	var $_err;
	// to, bcc and cc can be array.
	function my_send_mail( $to, $subject = "", $message = "", $from = "", $from_name = "", $bcc = "", $cc = "", $attach_file_name = "", $attach_file_tmp_name = "" )
	{
		global $MyMail;
		$MyMail = new MyMail;
		$MyMail->_err = "";

		if(  $to == "" ) { $MyMail->_err = "Receiver email address is not given<br>"; return false; }
		$mail = new PHPMailer();
		$mail->ClearAddresses();
		$mail->ClearBCCs();
		$mail->ClearCCs();
		$mail->ClearAttachments();
		if ( is_array($to) )
		{
			for($i = 0; $i < count($to); $i++)
			{
				$mail->AddAddress($to[$i]);
			}
		}
		else $mail->AddAddress($to);

		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->From = $from;
		$mail->FromName = $from_name;

		if ( is_array($bcc) )
		{
			for($i = 0; $i < count($bcc); $i++)
			{
				$mail->AddBCC($bcc[$i]);
			}
		}
		elseif ( $bcc != "" ) $mail->AddAddress($bcc);


		if ( is_array($cc) )
		{
			for($i = 0; $i < count($cc); $i++)
			{
				$mail->AddBCC($cc[$i]);
			}
		}
		elseif ( $cc != "" ) $mail->AddAddress($cc);

		if ($attach_file_name != "" && $attach_file_tmp_name != "")
		{
			$mail->AddAttachment($attach_file_tmp_name, $attach_file_name);
		}

		$mail->IsHTML(true);
		$mail->Mailer    = MAIL_TYPE; // type of mail function
		$mail->Host    = 'mail.cybernetikz.com'; // type of mail function

		if(  !$mail->send() ) $MyMail->_err = "Can not send mail<br>";

	}


	function my_send_mail_tx( $to, $subject = "", $message = "", $from = "", $from_name = "", $bcc = "", $cc = "", $attach_file_name = "", $attach_file_tmp_name = "" )
	{
		global $MyMail;
		$MyMail = new MyMail;
		$MyMail->_err = "";

		if(  $to == "" ) { $MyMail->_err = "Receiver email address is not given<br>"; return false; }
		$mail = new PHPMailer();
		$mail->ClearAddresses();
		$mail->ClearBCCs();
		$mail->ClearCCs();
		$mail->ClearAttachments();
		if ( is_array($to) )
		{
			for($i = 0; $i < count($to); $i++)
			{
				$mail->AddAddress($to[$i]);
			}
		}
		else $mail->AddAddress($to);

		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->From = $from;
		$mail->FromName = $from_name;

		if ( is_array($bcc) )
		{
			for($i = 0; $i < count($bcc); $i++)
			{
				$mail->AddBCC($bcc[$i]);
			}
		}
		elseif ( $bcc != "" ) $mail->AddAddress($bcc);


		if ( is_array($cc) )
		{
			for($i = 0; $i < count($cc); $i++)
			{
				$mail->AddBCC($cc[$i]);
			}
		}
		elseif ( $cc != "" ) $mail->AddAddress($cc);

		if ($attach_file_name != "" && $attach_file_tmp_name != "")
		{
			$mail->AddAttachment($attach_file_tmp_name, $attach_file_name);
		}

		$mail->IsHTML(false);
		$mail->Mailer    = MAIL_TYPE; // type of mail function
		$mail->Host    = 'smtpout.secureserver.net'; // type of mail function

		if(  !$mail->send() ) $MyMail->_err = "Can not send mail<br>";

	}

}
?>
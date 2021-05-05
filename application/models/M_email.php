<?php
	/**
	 * @author Pieter
	 */
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'C:\xampp\composer\vendor\autoload.php';
	class M_email extends CI_Model{
	
	/**
	 * @todo mengirimkan kode verifikasi
	 * Code akan melakukan login pada server smtp google dan mengirimkan kode verifikasi 4 digit
	 * Rujukan pada dokumen : Use-case verifikasi_login
	 * @param String $email
	 *  
	 */
		function confirm_login($email){
			$code = rand(1111 , 9999);

			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com'; #host untuk mengirimkan email
			$mail->Port = 587; #port yang digunakan
			$mail->SMTPAuth = true;

			$mail->Username = 'webtix.id@gmail.com'; #email webmaster / pengirim
			$mail->Password = 'hauzanjelek';

			$mail->setFrom('webtix.id@gmail.com'); #email sender / pengirim
			$mail->addAddress($email); #email test

			$mail->Subject = 'Email Confirmation'; #subject email yang dikirim
			#$mail->Body    = 'This is email confirmation for your login on our website Webtix.id, please do not share this code to anyone claiming from Webtix.id';
			$mail->Body = $code;
			$mail->Send();

			if(!$mail->Send()){
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				return $code;	
			}	
		}
	}
?>

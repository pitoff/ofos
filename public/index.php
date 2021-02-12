<?php
	require_once '../app/autoload.php';

	 $init = new Core;

	$mailer = new PHPMailer;
		$mailer->isSMTP();
		$mailer->isSMTP();
		$mailer->Host = 'smtp.gmail.com';
		$mailer->SMTPAuth = true;
		$mailer->SMTPSecure = 'tls';
		$mailer->Port = 587;
		$mailer->Username = 'forum@codecourse.com';
		$mailer->Password = 'c4ts4life';
		$mailer->from = 'forum@codecourse.com';
		$mailer->isHTML(true);

		$mail = new maillibrary\mail\Mailer($mailer);
		$mail->send('app/view/email/welcome.php', ['name' => 'Alex'], function($m){
			$m->to('peteroffodile@gmail.com');
			$m->subject('welcome to ofos');
		});
<?php


namespace App\Helpers;


class Email
{
	public function createMail(
		$recipients = [],
		$subject = 'Testmail',
		$body = 'Dies ist ein Testmail mit <br> einer Zeilenschaltung'
	):void {
		empty($recipients) ? $recipients = [getenv('email.defaultTo')] : null;
		$email = \Config\Services::email();
		$email->setTo($recipients);
		$email->setSubject($subject);
		$email->setMessage($body);
		$email->send();
	}

}
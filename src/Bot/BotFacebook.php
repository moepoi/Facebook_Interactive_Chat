<?php

namespace Bot;

/**
 * @author Ammar Faizi
 * @version 2.0.1
 * @license 
 */

use AI\AI;
use Facebook\Facebook;

class BotFacebook
{
	const VERSION = "2.0.1";

	/**
	 * @var Facebook\Facebook
	 */
	private $fb;

	/**
	 * @param string $email
	 * @param string $pass
	 * @param string $user
	 */
	public function __construct($email, $pass, $user)
	{
		$this->fb = new Facebook($email, $pass, $user);
	}
}
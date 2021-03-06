<?php

namespace Bot;

class Bot
{
	private $email;

	private $pass;

	private $userId;

	public function __construct($email, $pass, $userId = 0)
	{
		$this->email = rawurlencode($email);
		$this->pass  = rawurlencode($pass);
		$this->userId = rawurlencode($userId);
	}

	public static function stream_exec($cmd)
	{
		echo $cmd."\n";
		while (@ob_end_flush());
		$proc = popen($cmd, 'r');
		while (! feof($proc)) {
		    echo fread($proc, 4096);
		    @flush();
		}
		pclose($proc);
		echo "\n";
	}

	public function login()
	{
		self::stream_exec("node run.js login \"{$this->email}\" \"{$this->pass}\"");
		self::stream_exec("node run.js listen ".rawurlencode(json_encode(
			[
				"listen_to" => ["*"],
				"bot_user_id" => $this->userId
			]
		)));
	}

	public function run()
	{
		$this->login();
	}
}

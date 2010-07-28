<?
/*
 * TwitPic API for PHP
 * Copyright 2010 Ryan LeFevre - @meltingice
 * PHP version 5.3.0+
 *
 * Licensed under the New BSD License, more info in LICENSE file
 * included with this software.
 *
 * Source code is hosted at http://github.com/meltingice/TwitPic-API-for-PHP
 */
 
include 'includes/config.php';
include 'includes/TwitPic_API.php';
include 'includes/TwitPicAPIException.php';

require_once 'HTTP/Request2.php';
require_once 'HTTP/OAuth/Consumer.php';

class TwitPic {
	private $api;
	
	public function __construct($api_key = "", $consumer_key = "", $consumer_secret = "", $oauth_token = "", $oauth_secret = "") {
		TwitPic_Config::setAPIKey($api_key);
		TwitPic_Config::setConsumer($consumer_key, $consumer_secret);
		TwitPic_Config::setOAuth($oauth_token, $oauth_secret);
		
		$this->api = new TwitPic_API($this->api_key);
	}
	
	public static function mode() {
		return TwitPic_Config::mode();
	}
	
	/*
	 * Throw the request over to the API class to handle
	 */
	public function __get($key) {
		return $this->api->{$key};
	}
}
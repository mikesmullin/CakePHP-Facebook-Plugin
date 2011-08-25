<?php

App::import('Vendor', 'Facebook.Facebook', array('file' => 'facebook_php_sdk'. DS . 'src'. DS .'facebook.php'));

class FacebookApi extends AppModel {
	var $useTable			= false,
		$Facebook			= null,
		$user_id			= null,
		$user				= null,
		$_insideCanvas		= null,
		$_validUser			= null;

	/**
	 * Constructor.
	 *
	 * @param String $access_token (optional) Pass to manually authenticate, if you have it.
	 */
	function __construct($access_token = null) {
		Configure::load('Facebook.facebook');
		$this->Facebook =	new Facebook(array(
			'appId'	=> Configure::read('Facebook.APP_ID'),
			'secret' => Configure::read('Facebook.API_SECRET'),
			'cookie' => true,
			'domain' => Configure::read('Facebook.COOKIE_DOMAIN')
		));
		if ($access_token) {
			$this->Facebook->setAccessToken($access_token);
		}
		$this->user_id = $this->Facebook->getUser();
	}

	/**
	 * Determine if current request is made via Facebook Canvas IFRAME,
	 * not a page Tab, and definitely not directly (i.e., outside of Facebook).
	 */
	function insideCanvas() {
		// cache answer, since this is a common check (e.g. by TempHelper)
		if (!is_null($this->_insideCanvas)) {
			return $this->_insideCanvas;
		}

		return $this->_insideCanvas = (bool) $this->Facebook->getSignedRequest(); // only provided by Facebook when inside canvas iframe; check present and valid
	}

	/**
	 * Determine if we have a Facebook User Id, and the user's Facebook
	 * OAuth access_token is still valid at the time of this request.
	 */
	function authenticatedUser() {
		if (!is_null($this->_validUser)) {
			return $this->_validUser;
		}

		// first check:
		// user id must be greater than zero
		$this->_validUser = (bool) $this->user_id > 0;

		// second check:
		if ($this->_validUser) {
			// must be able to retrieve a non-empty user profile data
			// without throwing an exception
			try {
				$this->user = $this->Facebook->api('/me');
				$this->_validUser = !empty($this->user);
			}
			catch (FacebookApiException $e) {
				$this->_validUser = false;
			}
		}

		return $this->_validUser;
	}
}
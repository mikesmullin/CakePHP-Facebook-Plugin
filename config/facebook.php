<?php

switch (Configure::read('YourApp.environment')) {
	default:
	case 'production':
		$config['Facebook'] = array(
		  'APP_ID'        => '123415513359764',
		  'APP_URL'       => '',
		  'API_KEY'       => '256172113356114',
		  'API_SECRET'    => '1231289a3fcbaf43a4624953bfa9950f',
		  'COOKIE_DOMAIN' => 'www.yourapp.com'
		);
		break;

	case 'staging':
		$config['Facebook'] = array(
		  'APP_ID'        => '161241511712556',
		  'APP_URL'       => '',
		  'API_KEY'       => '152343245166551',
		  'API_SECRET'    => '110dcdcac33aga37788acf3cb2284d2b',
		  'COOKIE_DOMAIN' => 'dev.yourapp.com'
		);
		break;

	case 'local':
		$config['Facebook'] = array(
		  'APP_ID'        => '247817041971157',
		  'APP_URL'       => 'https://apps.facebook.com/yourapp_local/',
		  'API_KEY'       => '242341243516757',
		  'API_SECRET'    => '4d567af567asdf75a99a8d76657b0169',
		  'COOKIE_DOMAIN' => 'yourapp.local'
		);
		break;
}

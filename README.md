CakePHP Facebook Plugin by Mike Smullin <mike@smullindesign.com>
============

** Lets you interact with Facebook Graph API via Official PHP SDK. Provides CakePHP config and model. **

Installation & Usage
------------

Place this directory in your plugins dir:

    git submodule add git://github.com/mikesmullin/CakePHP-Facebook-Plugin.git ./app/plugins/facebook

Download the latest version of Facebooks's php-sdk into `./app/plugins/facebook/vendors/facebook_php_sdk/`, as well:

    git submodule update --init --recursive

Edit the file `./app/plugins/facebook/config/facebook.php`.

Use the FacebookApi model:

    $this->loadModel('Facebook.FacebookApi');

Credits
------------

CakePHP-Facebook is written by Mike Smullin and is released under the WTFPL.

Facebook PHP-SDK is written by Facebook see https://github.com/facebook/php-sdk

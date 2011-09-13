<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('SITE', 'site');
define('ADMIN', 'admin');

define("USER_AUTHENTIC_COOKIE", "logged_in");
define("USERNAME_LOGIN", "username_login");
define("USERID_LOGIN", "userid_login");
define("USERPERMISSION_LOGIN", 'userpermission_login');
define("USER_AUTHENTIC_SUCCESS_FLAG", 'authorize_success');
define("USER_AUTHENTIC_UNSUCCESS_FLAG", 'authorize_fail');

/*
 * permissions in the system
 */
define("VIDEO_CATEGORY_FULL", 1);
define("PARTNER_FULL", 2);

define("ACCOUNT_FULL", 3);

/* End of file constants.php */
/* Location: ./application/config/constants.php */
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once (APPPATH.'libraries/vendor/autoload.php');

$config['stripe'] = array(
			"secret_key"      => "sk_test_HmrDjVfc3nfHaFTQr4tqDHRt",
			"publishable_key" => "pk_test_VJXmCA25wmAnqgQtZeOe4S2f"
		);

$config["app_id"] = 'mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY';
$config["rest_key"] = 'JTPoJWY6cVUjlTaLT8oTDJsIMPo3Pcs6b0c3TCl5';
$config["master_key"] = 'huaX4chDLe2E3ajH1lT8LGuFd6iCTDc6covbyyPu';
$config["javascript"] = 'M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg';
$config["edmunds"] = "rjhqr7cj3mrhhzdfhju88d22";

$config["paypal_id"] = "AURjgGGxqdEzA5N8oyBrtDZ3LYKf4lA4ciWpmzXxD_juqPHz7SJ9IxZmYhTB7rH5MF1sM7RFJIR1pNjX";
$config["paypal_secret"] = "ED1GqUwlmN4btbzuTTcacj6IgElIJZ5wTIqr9hzZIimCTBfYraRIUr5e7X2SaIXKgnyjOB5Z5L_0vHjL";
$config["paypal_mode"] = "sandbox";

?>
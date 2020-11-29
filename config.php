<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'contact-form');




define('CF_HOST', 'smtp.gmail.com');//your email host here
define('CF_USERNAME', '');//your email here
define('CF_PASSWORD', '');//your password here
define('CF_SECURE', 'tls');
define('CF_PORT', '587');
define('CF_ADDCC', 'cc@example.com');
define('CF_ADDBCC', 'bcc@example.com');

//email from
define('CF_EMAIL_FROM', 'trungstormsix@gmail.com');
define('CF_EMAIL_FROM_NAME', 'c o d e l i s t . c c');
//email that receive email when use click on reply to
define('CF_EMAIL_REPLYTO', 'trungstormsix@gmail.com');
define('CF_EMAIL_REPLYTO_NAME', 'Trung Truong');
//cc email
define('CF_EMAIL_CC', '');
//bcc email
define('CF_EMAIL_BCC', '');

define('CF_CLIENT_EMAIL_TITLE',"Thank you for contacting us!");
define('CF_CLIENT_EMAIL_END_MESSAGE',"We will reply your contact ASAP.");
define('CF_ADMIN_EMAIL_TITLE',"New Contacting Email!");

//sitekey captcha google for http://localhost
define('CF_RECAPTCHA',true);//enable google recaptcha
define('CF_RECAPTCHA_KEY', '6Lc93s8SAAAAAHfqBv-DoE1XSAcFMKYHGk0YBEYV');//'6LeOkhEUAAAAAHW3TSVlq3LAAoBr-QyzyjleJIXq'
 
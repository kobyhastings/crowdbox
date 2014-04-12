<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| EMAIL CONFING
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
| */ 

//the email settings below are for godaddy email hosting
//enter your username and password in the smtp_host and smtp_pass
$config['mailpath'] = "/usr/sbin/sendmail";
$config['protocol'] = "sendmail";
$config['smtp_host'] = "relay-hosting.secureserver.net";
$config['smtp_user'] = "koby@softwaremasters.com";  //this address must not be a public email service provider like yahoo, gmail, hotmail... etc
$config['smtp_pass'] = "";
$config['smtp_port'] = "25";
$config['mailtype'] = "HTML";
$config['validate'] = "TRUE";

/* End of file email.php */
/* Location: ./system/application/config/email.php */ 
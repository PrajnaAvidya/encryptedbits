<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>

<h1>About EncryptedBits</h1>

<p>EncryptedBits is an encrypted note taking web application. It uses the AES algorithm to encrypt your data on a per-entry basis. All data is encrypted and decrypted client-side using JavaScript so your private data is never sent to the server, just the encrypted result. Your account password as well as passwords for individual entries can NOT be recovered and if you lose your passwords, your data is lost forever! Please ensure JavaScript is enabled while browsing this site or your data will not be properly encrypted.</p>
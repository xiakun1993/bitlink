<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
*      This is NOT a freeware, use is subject to license terms
*
*      $Id: modcp.php 32489 2013-01-29 03:57:16Z monkey $
*/
//note modcp��ڹ��� @ Discuz! X2.5

if(!defined('IN_MOBILE_API')) {
	exit('Access Denied');
}

$_GET['mod'] = 'modcp';
include_once 'forum.php';

class mobile_api {
	function common() {

	}

	function output() {
		mobile_core::result(mobile_core::variable());
	}
}
?>
<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$sql = <<<EOF
ALTER TABLE `pre_forum_thread`
DROP COLUMN `ppcount_i`,
DROP COLUMN `ppcount_o`,
DROP COLUMN `ppdate`;
EOF;
runquery($sql);
$finish = TRUE;

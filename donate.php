<?php
require './source/class/class_core.php';//����ϵͳ�����ļ�
$discuz = & discuz_core::instance();//���´���Ϊ��������ʼ������
$discuz->cachelist = $cachelist;
$discuz->init();
include template('diy:forum/donate');//���õ�ҳģ���ļ�
?>
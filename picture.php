<?php
require './source/class/class_core.php';//����ϵͳ�����ļ�
$discuz = & discuz_core::instance();//���´���Ϊ��������ʼ������
$discuz->cachelist = $cachelist;
$discuz->init();
loadcache('diytemplatename');//diyҪ���뻺��
include template('diy:forum/picture');//���õ�ҳģ���ļ�
?>
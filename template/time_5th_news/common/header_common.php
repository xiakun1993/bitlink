<?php echo 'Theme by time  http://www.shishang.net';exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset={CHARSET}" />
	<!--{if $_G['config']['output']['iecompatible']}--><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE{$_G['config']['output']['iecompatible']}" /><!--{/if}-->
	<title><!--{if !empty($navtitle)}-->$navtitle - <!--{/if}--><!--{if empty($nobbname)}--> $_G['setting']['bbname'] - <!--{/if}--> Powered by Discuz!</title>
	$_G['setting']['seohead']

	<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
	<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)} {/if}{if empty($nobbname)},$_G['setting']['bbname']{/if}" />
	<meta name="generator" content="Discuz! $_G['setting']['version']" />
	<meta name="author" content="Discuz! Team and Comsenz UI Team" />
	<meta name="copyright" content="2001-2013 Comsenz Inc." />
	<meta name="MSSmartTagsPreventParsing" content="True" />
	<meta http-equiv="MSThemeCompatible" content="Yes" />
	<base href="{$_G['siteurl']}" />
	<!--{csstemplate}-->
    
    
	<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]', CSSPATH = '$_G[setting][csspath]', DYNAMICURL = '$_G[dynamicurl]';</script>
	<script type="text/javascript" src="{$_G[setting][jspath]}common.js?{VERHASH}"></script>
    
    
    <script type="text/javascript" src="$_G['style'][styleimgdir]/js/jquery.min.js"></script>
    <script type="text/javascript">jq = jQuery.noConflict();</script>

    
	<!--{if empty($_GET['diy'])}--><!--{eval $_GET['diy'] = '';}--><!--{/if}-->
	<!--{if !isset($topic)}--><!--{eval $topic = array();}--><!--{/if}-->
    <!--[if IE 6]>
    <script type="text/javascript" src="$_G['style'][styleimgdir]/js/png.js" ></script>
     <script type="text/javascript">
     DD_belatedPNG.fix('.nav_box, .navi img, .hd_logo img, #maincontent .entry-info, #maincontent .entry-info .entry-title, .slider .slider-more, .slider-nav a, .user_link i, .usernav li .png i, .userinfo .arrow, .user_list .i_qq, .user_list .i_wb, .nav_icon, .blackbg, .comment-bubble, .slider-more, .index_tit .more, .index_tit h3, .index_tit ul li, .index_tit ul li.on, .pgs #newspecial, .pgs #newspecialtmp, #post_reply, #post_replytmp, .slideBox .bd em, .f-slideBox .hd ul li, .f-slideBox .hd ul li.on, .scbar_btn_td, #scbar_btn, .slideBox .hd ul li, #footer .widget .widget-title, #footer .widget p img, .focus_box .hd li, .focus_box .hd .on, .taber .tb a, .taber .tb .a a, .headpost a, .replys, .views, .date, .right_list .v, .right_list .c, i.icon-entypo-clock, i.icon-entypo-eye, i.icon-entypo-chat, .rss_top, .list_focuss2 .hd2 .prev, .list_focuss2 .hd2 .next, .list_focuss2 h3, .blog-date-wrapper, .blog-author, .blog-comment, .small-button, .weixin, .sina, .tencent, .douban, .gzwm .wx, .gzwm .wx:hover');
    </script> 
    <script language='javascript' type="text/javascript">   
    function ResumeError() {  
         return true;  
    }  
    window.onerror = ResumeError;   
    </script> 
    <![endif]-->
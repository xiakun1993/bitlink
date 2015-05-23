<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<style>
<!--
.pattimg {
float: left;
margin: 0 10px 10px 0;
width: {$len}px;
height: {$len}px;
overflow: hidden;
}
.xl4 li {
float: left;
margin: 2px 0;
padding: 0;
width: 25%;
height: 1.5em;
overflow: hidden;
}
-->
</style>
<div class="pattl">
<script type="text/javascript">
function viewlog(op) {
if(op==1) {
$('namelist').style.display = 'none';
$('imagelist').style.display = '';
} else {
$('imagelist').style.display = 'none';
$('namelist').style.display = '';
}
doane();
}
</script>
<div class="bbda cl mtw mbm pbm">
<strong>{$title}</strong>
<a href="javascript:;" onclick="viewlog(1)" class="xi2 attl_m">头像模式</a>
<a href="javascript:;" onclick="viewlog(2)" class="xi2 attl_g">列表模式</a>
</div>
<div id="imagelist" class="pattl_c cl">
EOF;
 if(is_array($userList)) foreach($userList as $k => $user) { 
$return .= <<<EOF
<div class="pattimg"><a class="pattimg_zoom" href="home.php?mod=space&amp;uid={$user['uid']}" title="{$users[$user['uid']]}于{$user['dateline']}访问" target="_blank">{$users[$user['uid']]}于{$user['dateline']}访问</a><img src="{$user['avatar']}" width="{$len}" height="{$len}"></div>

EOF;
 } 
$return .= <<<EOF

</div>
<div id="namelist" class="cl" style="display:none;">
<ul class="mbw xl xl4 cl">
EOF;
 if(is_array($userList)) foreach($userList as $k => $user) { 
$return .= <<<EOF
<li><a href="home.php?mod=space&amp;uid={$user['uid']}" title="{$users[$user['uid']]}于{$user['dateline']}访问" target="_blank" class="xi2 xw1">{$users[$user['uid']]}</a></li>

EOF;
 } 
$return .= <<<EOF

</ul>
</div>
</div>

EOF;
?>
<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if(empty($ajax_edit)) { ?><li id="share_<?php echo $value['sid'];?>_li"><?php } ?>
<div class="h">
<div class="y">
<?php if($value['uid'] != $_G['uid'] && $value['itemid'] && helper_access::check_module('share')) { ?>
<a href="home.php?mod=spacecp&amp;ac=share&amp;type=<?php echo $value['type'];?>&amp;id=<?php echo $value['itemid'];?>" id="k_share" onclick="showWindow(this.id, this.href, 'get', 0);">��Ҳ����</a>
<span class="pipe">|</span>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_share_comment_op'][$k])) echo $_G['setting']['pluginhooks']['space_share_comment_op'][$k];?>
<?php if($value['sid']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=share&amp;id=<?php echo $value['sid'];?>" target="_blank">����</a><?php } if($value['uid']==$_G['uid']) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=spacecp&amp;ac=share&amp;op=delete&amp;sid=<?php echo $value['sid'];?>&amp;handlekey=dellshk_<?php echo $value['sid'];?>" id="s_<?php echo $value['sid'];?>_delete" onclick="showWindow(this.id, this.href, 'get', 0);">ɾ��</a>
<?php } ?>
</div>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" c="1" target="_blank"><?php echo $value['username'];?></a>
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=share&amp;id=<?php echo $value['sid'];?>" target="_blank"><?php echo $value['title_template'];?></a>
<?php if($value['status'] == 1) { ?><span class="xgl">(�����)<?php } ?>
<span class="xg1"><?php echo dgmdate($value[dateline], 'u');?></span>
</div>
<div class="ec cl">
<?php if($value['image']) { ?>
<a href="<?php echo $value['image_link'];?>" target="_blank"><img src="<?php echo $value['image'];?>" class="tn" alt="" /></a>
<?php } ?>
<div class="d">
<?php echo $value['body_template'];?>
</div>
<?php if($value['type'] == 'video') { if(!empty($value['body_data']['imgurl'])) { ?>
<table class="mtm" title="�������" onclick="javascript:showFlash('<?php echo $value['body_data']['host'];?>', '<?php echo $value['body_data']['flashvar'];?>', this, '<?php echo $value['sid'];?>');"><tr><td class="vdtn hm" style="background: url(<?php echo $value['body_data']['imgurl'];?>) no-repeat">
<img src="<?php echo IMGDIR;?>/vds.png" alt="�������" />
</td></tr></table>
<?php } else { ?>
<img src="<?php echo IMGDIR;?>/vd.gif" alt="�������" onclick="javascript:showFlash('<?php echo $value['body_data']['host'];?>', '<?php echo $value['body_data']['flashvar'];?>', this, '<?php echo $value['sid'];?>');" class="tn" />
<?php } } elseif($value['type'] == 'music') { ?>
<img src="<?php echo IMGDIR;?>/music.gif" alt="�������" onclick="javascript:showFlash('music', '<?php echo $value['body_data']['musicvar'];?>', this, '<?php echo $value['sid'];?>');" class="tn" />
<?php } elseif($value['type'] == 'flash') { ?>
<img src="<?php echo IMGDIR;?>/flash.gif" alt="����鿴" onclick="javascript:showFlash('flash', '<?php echo $value['body_data']['flashaddr'];?>', this, '<?php echo $value['sid'];?>');" class="tn" />
<?php } if($value['body_general']) { ?>
<div class="quote<?php if($value['image']) { ?> z<?php } ?>"><blockquote id="quote_<?php echo $id;?>"><?php echo $value['body_general'];?></blockquote></div>
<?php } ?>
</div>
<?php if(empty($ajax_edit)) { ?></li><?php } ?>
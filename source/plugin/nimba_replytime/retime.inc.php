<?php
/*
 * 应用中心主页：http://addon.discuz.com/?@ailab
 * 人工智能实验室：Discuz!应用中心十大优秀开发者！
 * 插件定制 联系QQ594941227
 * From www.ailab.cn
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache('plugin');	
$uids= explode(",",trim($_G['cache']['plugin']['nimba_replytime']['uids']));
if ($_G['uid']==''||!in_array($_G['uid'],$uids)){
	showmessage(lang('plugin/nimba_replytime','error_1'),'javascript:history.back()',array(),array('refreshtime'=>3));	
}
$mod=in_array($_GET['mod'],array('single','term'))? $_GET['mod']:'single';
if($mod=='single'){//单贴
	$plugin_nav=$navtitle=lang('plugin/nimba_replytime','single_nav');
	if(submitcheck('submit')){
		if(!$_POST['newtime']) showmessage(lang('plugin/nimba_replytime','error_4'),'javascript:history.back()',array(),array('refreshtime'=>3));
		$tid=intval($_POST['tid']);
		$pid=intval($_POST['pid']);
		$posturl='plugin.php?id=nimba_replytime:retime&mod=single&tid='.$tid.'&pid='.$pid;
		$oldtime=intval($_POST['oldtime']);
		$newtime=strtotime($_POST['newtime'].' '.intval($_POST['h']).':'.intval($_POST['i']).':'.intval($_POST['s']));//+rand(0,86400)
		post_retime($pid,$newtime);//修改回复时间
		showmessage(lang('plugin/nimba_replytime','do1'),$posturl,array(),array('refreshtime'=>3));
	}else{
		$tid=intval($_GET['tid']);
		$pid=intval($_GET['pid']);
		if($tid&&$pid){
			$data=DB::fetch_first("SELECT subject FROM ".DB::table('forum_thread')." where tid=$tid");
			$post=DB::fetch_first("SELECT message,dateline FROM ".DB::table('forum_post')." where pid=$pid");
			$oldtime=$post['dateline'];
			$post['dateline']=date('Y-m-d H:i:s',$post['dateline']);
			require_once libfile('function/post');
			$post['message']=str_replace(array("\r", "\n"),'', messagecutstr(strip_tags($post['message']),160));
		}else{//来路有误
			showmessage(lang('plugin/nimba_replytime','error_3'),'javascript:history.back()',array(),array('refreshtime'=>3));	
		}
	}
}elseif($mod=='term'){//批量
	//var_dump($_GET);
	showmessage(lang('plugin/nimba_replytime','error_2'),'javascript:history.back()',array(),array('refreshtime'=>3));
}else{//请求错误
	showmessage(lang('plugin/nimba_replytime','error_6'),$posturl,array(),array('refreshtime'=>3));
}

function retime($tid,$start,$end,$replies){
	$len=intval($end)-intval($start);
	$lastpost=0;
	if($len>$replies){
		$len=intval($len/$replies);
		$query=DB::query("SELECT pid FROM ".DB::table('forum_post')." where tid=$tid and first=0 order by pid asc");
		$num=1;
		while($value=DB::fetch($query)){
			$newstart=$start+$len;
			$newtime=rand($start,$newstart);
			post_retime($value['pid'],$newtime);
			$start=$newstart;
			$lastpost=$newtime;
			$num++;
		}
	}else{
		$query=DB::query("SELECT pid FROM ".DB::table('forum_post')." where tid=$tid and first=0 order by pid asc");
		$num=1;
		while($value=DB::fetch($query)){
			$newtime=rand($start,$end);
			if($num>=$lc[0]&&$num<=$lc[1]) post_retime($value['pid'],$newtime);
			$lastpost=$newtime;
			$num++;
		}
	}
	//更新最后回复时间
	DB::query("UPDATE ".DB::table('forum_thread')." SET lastpost=".$lastpost." WHERE tid='$tid'", 'UNBUFFERED');
}
function post_retime($pid,$dateline){
	if($pid&&$dateline)	DB::query("UPDATE ".DB::table('forum_post')." SET dateline=".$dateline." WHERE first!=1 and pid='$pid'", 'UNBUFFERED');
}

include template('nimba_replytime:retime');
?>
<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_iplus_ppcount {
	function __construct(){
		global $_G;
		loadcache('plugin');
		$this->tips = $_G['cache']['plugin']['iplus_ppcount']['tips'];		
		$this->style = intval($_G['cache']['plugin']['iplus_ppcount']['style']);	
	}
	
	function pcount($tid){
		$out=0;
		$in=0;
		$post=DB::fetch_first("select pid,message from ".DB::table('forum_post')." where tid='$tid' and first=1");
		if(preg_match_all("/\[img[^\]]*\](.*)\[\/img\]/isU",$post['message'],$result)){
			$out=count($result[1]);
		}
		$in=DB::result_first("select count(*) from ".DB::table('forum_attachment_'.($tid%10))." where tid='$tid' and pid='".$post['pid']."' and isimage=1");
		return array('in'=>intval($in),'out'=>intval($out));
	}
	
	function pview($in,$out){
		if($this->style==1&&$in) return str_replace('{pcount}',$in,$this->tips);
		elseif($this->style==2&&$out) return str_replace('{pcount}',$out,$this->tips);
		elseif($this->style==3&&($in+$out)) return str_replace('{pcount}',($in+$out),$this->tips);
		else return '';
	}
}

class plugin_iplus_ppcount_forum extends plugin_iplus_ppcount{
	function viewthread_top_output(){//帖内
		global $_G;
		if(!$_G['thread']['ppdate']){
			$pcount=$this->pcount($_G['tid']);
			DB::update('forum_thread',array('ppcount_i'=>$pcount['in'],'ppcount_o'=>$pcount['out'],'ppdate'=>$_G['timestamp']),array('tid'=>$_G['tid']));
			$_G['thread']['subject'].=$this->pview($pcount['in'],$pcount['out']);
		}else{
			$_G['thread']['subject'].=$this->pview($_G['thread']['ppcount_i'],$_G['thread']['ppcount_o']);
		}
	}
	
	function forumdisplay_thread_subject_output(){//列表页
		global $_G;
		$return=array();
		foreach($_G['forum_threadlist'] as $k=>$v){
			if(!$v['ppdate']){
				$pcount=$this->pcount($v['tid']);
				DB::update('forum_thread',array('ppcount_i'=>$pcount['in'],'ppcount_o'=>$pcount['out'],'ppdate'=>$_G['timestamp']),array('tid'=>$v['tid']));
				$return[]=$this->pview($pcount['in'],$pcount['out']);
			}else{
				$return[]=$this->pview($v['ppcount_i'],$v['ppcount_o']);
			}
		}
		return $return;
	}
	
	function post_feedlog_message($var){//编辑和发新帖
		global $_G;
		$tid = $var['param'][2]['tid'];		
		$pid = $var['param'][2]['pid'];
		if($var['param'][0]=='post_newthread_succeed'){//新帖
			DB::update('forum_thread',array('ppcount_i'=>0,'ppcount_o'=>0,'ppdate'=>0),array('tid'=>$tid));
		}elseif($var['param'][0]=='post_edit_succeed'){//编辑
			$first=DB::result_first("select first from ".DB::table('forum_post')." where pid=".intval($pid));
			if($first){
				DB::update('forum_thread',array('ppcount_i'=>0,'ppcount_o'=>0,'ppdate'=>0),array('tid'=>$tid));
			}
		}
	}	
}
class plugin_iplus_ppcount_search extends plugin_iplus_ppcount{
	function forum_top_output(){//搜索页
		global $_G,$threadlist;
		foreach($threadlist as $k=>$v){
			if(!$v['ppdate']){
				$pcount=$this->pcount($v['tid']);
				DB::update('forum_thread',array('ppcount_i'=>$pcount['in'],'ppcount_i'=>$pcount['out'],'ppdate'=>$_G['timestamp']),array('tid'=>$v['tid']));
				$threadlist[$k]['subject'].=$this->pview($pcount['in'],$pcount['out']);
			}else{
				$threadlist[$k]['subject'].=$this->pview($v['ppcount_i'],$v['ppcount_o']);
			}
		}
	}
}
?>
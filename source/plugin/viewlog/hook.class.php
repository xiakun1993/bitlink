<?php
/*
 * 主页：http://addon.discuz.com/?@ailab
 * 人工智能实验室：Discuz!应用中心十大优秀开发者！
 * 插件定制 联系QQ594941227
 * From www.ailab.cn
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_viewlog {

}

class plugin_viewlog_forum extends plugin_viewlog{
	function viewthread_postbottom_output(){
		global $_G;
		loadcache('plugin');
		$vars=$_G['cache']['plugin']['viewlog'];
		C::t('#viewlog#viewlog')->delete_by_time(TIMESTAMP-259200);	
		$title=trim($vars['title']);
		if($_G['uid']){
			$logid=C::t('#viewlog#viewlog')->fetch_logid_by_tid_uid($_G['tid'],$_G['uid']);
			if(!$logid){
				$newData=array(
					'uid'=>$_G['uid'],
					'tid'=>$_G['tid'],
					'ip'=>$_G['clientip'],
					'dateline'=>TIMESTAMP, 
				);
				C::t('#viewlog#viewlog')->insert($newData);
			}else{
				$review=intval($vars['review']);
				if($review==1){//1=更新为最新一次浏览 2=只记录第一次浏览
					$newData=array(
						'uid'=>$_G['uid'],
						'tid'=>$_G['tid'],
						'ip'=>$_G['clientip'],
						'dateline'=>TIMESTAMP, 
					);
					C::t('#viewlog#viewlog')->update_by_logid($newData,$logid);
				}
			}
		}
		$len=48;
		$userList=C::t('#viewlog#viewlog')->fetch_all_by_tid($_G['tid'],intval($vars['num']));
		foreach($userList as $k=>$v){
			$uids[]=$v['uid'];
			$userList[$k]['avatar'] = avatar($v['uid'],'big',true);
			$userList[$k]['dateline']=date('Y-m-d H:i:s',$v['dateline']);
		}
		$users=C::t('common_member')->fetch_all_username_by_uid($uids);
		include template('viewlog:list');
		if($_G['forum_firstpid']) return array($return,'');
		else return array();
	}
}


?>
<?php
/*
 * Ӧ��������ҳ��http://addon.discuz.com/?@ailab
 * �˹�����ʵ���ң�Discuz!Ӧ������ʮ�����㿪���ߣ�
 * ������� ��ϵQQ594941227
 * From www.ailab.cn
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_nimba_replytime {

}

class plugin_nimba_replytime_forum extends plugin_nimba_replytime{
	function viewthread_postheader_output(){
		global $_G,$postlist;
		$return=array();
		loadcache('plugin');
		$uids= explode(",",trim($_G['cache']['plugin']['nimba_replytime']['uids']));
		if ($_G['uid']==''||!in_array($_G['uid'],$uids)){
			return $return;
		}		
		foreach($postlist as $pid=>$post){
			if($post['first']==1) $return[]='<span class="pipe">|</span><a href="plugin.php?id=nimba_replytime:retime&mod=term&tid='.$_G['tid'].'"><font color="red">'.lang('plugin/nimba_replytime','doing_1').'</font></a>';
			else $return[]='<span class="pipe">|</span><a href="plugin.php?id=nimba_replytime:retime&mod=single&tid='.$_G['tid'].'&pid='.$pid.'"><font color="red">'.lang('plugin/nimba_replytime','doing_2').'</font></a></a>';
		}
		return $return;
	}
}

?>
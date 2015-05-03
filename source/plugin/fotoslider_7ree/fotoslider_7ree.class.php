<?php
/*
	ID: fotoslider_7ree
    for DiscuzX 2.X GBK
	[www.7ree.com] (C)2007-2012 7ree.com.
	This is NOT a freeware, use is subject to license terms
	Update: 13:15 2012/9/27
    Agreement: http://www.7ree.com/agreement.html
 */


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}



class plugin_fotoslider_7ree {
	
	function global_header() {
		global $_G;
		$return = '';
		$vars_7ree = $_G['cache']['plugin']['fotoslider_7ree'];
		$list_7ree = array_filter(explode('|||', $vars_7ree[vars_7ree]));

		$num_7ree = count($list_7ree);
		if($num_7ree< 1) return $return;

		foreach($list_7ree as $list_value){
		$slider_7ree[] = explode(',', trim($list_value));
		}

		$where_7ree = $vars_7ree[where_7ree] ? unserialize($vars_7ree[where_7ree]) : array();
		$speed_7ree = $vars_7ree[speed_7ree] ? $vars_7ree[speed_7ree] * 1000 : 3000;

		if($vars_7ree[agreement_7ree] && $vars_7ree[onoff_7ree] && in_array(CURSCRIPT,$where_7ree)){

				if(CURSCRIPT == "forum") {
					if($_G[fid] && !$vars_7ree[inner_7ree]){
						return $return;
					}else{
						include template('fotoslider_7ree:fotoslider_7ree');
					}
				}elseif(CURSCRIPT == "portal"){
					if(in_array($_GET[mod],array("view","list","portalcp")) && !$vars_7ree[artical_7ree]){
						return $return;	
					}else{
						include template('fotoslider_7ree:fotoslider_7ree');
					}
				}else{
					include template('fotoslider_7ree:fotoslider_7ree');
				}

		}

		return $return;

	}



}


class plugin_fotoslider_7ree_forum extends plugin_fotoslider_7ree{
}



?>

<?php echo 'xinglan_w02ģ��';exit;?>

<div id="wp_toptb" class="cl">

  <div class="wp cl">
  
  <div class="z">

      <!--{eval $tpz=1}-->

      <!--{loop $_G['setting']['topnavs'][0] $nav}-->

      <!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><!--{if $tpz!=1}--><span class="pipe">|</span><!--{/if}-->$nav[code]<!--{/if}-->

      <!--{eval $tpz++}-->

      <!--{/loop}-->

      <!--{hook/global_cpnav_extra1}-->

      <!--{loop $_G['setting']['topnavs'][1] $nav}-->

      <!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><span class="pipe">|</span>$nav[code]<!--{/if}-->

      <!--{/loop}-->

      <!--{hook/global_cpnav_extra2}-->

    </div>
	
	
    <div class="y">
      <!--{if $_G['uid']}-->
	  
	  <a href="home.php?mod=space&uid=$_G[uid]" class="wi_ttbat"><!--{avatar($_G[uid],small)}--></a>

      <a href="home.php?mod=space&uid=$_G[uid]" class="top_gly" target="_blank" title="{lang visit_my_space}">{$_G[member][username]}</a>

      <!--{if $_G['group']['allowinvisible']}-->

      <span id="loginstatus">

        <a id="loginstatusid" href="member.php?mod=switchstatus" title="{lang login_switch_invisible_mode}" onClick="ajaxget(this.href, 'loginstatus');return false;"></a>

      </span>

      <!--{/if}-->
      

      <!--{hook/global_usernav_extra2}-->

      <!--{hook/global_usernav_extra3}-->



		<!--{if $_G[member][newpm] || $_G[member][newprompt]}-->
		
		<!--{/if}-->
      

      
		<a href="javascript:;" id="wqmenu" class="showmenu" onMouseOver="showMenu({'ctrlid':'wqmenu','pos':'34!','ctrlclass':'a','duration':2});">����<span class="arrow"></span></a>
      
	  
	  <!--{hook/global_usernav_extra1}-->
	  
	  <a href="home.php?mod=spacecp" class="u31">{lang setup}</a>

      <a href="javascript:;" id="wmn" class="showmenu {if $_G['member']['newpm'] || $_G['member']['newprompt']}new{/if}" onMouseOver="showMenu({'ctrlid':'wmn','pos':'34!','ctrlclass':'a','duration':2});">��Ϣ</a>
	  
	  <a href="home.php?mod=space&do=notice" id="myprompt" {if $_G[member][newprompt]} class="new"{/if}>{lang remind}<!--{if $_G[member][newprompt]}-->($_G[member][newprompt])<!--{/if}--></a><span id="myprompt_check"></span>

      
	  
	  <!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->

      <a href="portal.php?mod=portalcp" class="u32"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a>

  <!--{/if}-->

      
	  
  <!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}--><a href="admin.php" target="_blank"  class="u35">{lang admincp}</a><!--{/if}-->
  
  <!--{if check_diy_perm($topic)}--><a href="javascript:openDiy();" title="{lang open_diy}" class="u36">DIY����</a><!--{/if}-->
	  
	  <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>

      <!--{elseif !empty($_G['cookie']['loginuser'])}-->

      <a id="loginuser"><!--{echo dhtmlspecialchars($_G['cookie']['loginuser'])}--></a>

      <a href="member.php?mod=logging&action=login" onClick="showWindow('login', this.href)">{lang activation}</a>

      <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>

      

      <!--{elseif !$_G[connectguest]}-->

<div class="z"><!--{hook/global_login_extra}--></div>
      <a href="member.php?mod=logging&action=login&referer={echo rawurlencode($dreferer)}" onClick="showWindow('login', this.href);return false;" title="{lang login}">{lang login}</a>
	  
	  <span class="wi_tpipe">|</span>

      <a href="member.php?mod={$_G[setting][regname]}" title="$_G['setting']['reglinkname']">$_G['setting']['reglinkname']</a>
	  
	  <span class="wi_tpipe">|</span>

      <a href="javascript:;" onClick="showWindow('login', 'member.php?mod=logging&action=login&viewlostpw=1')" title="{lang forgotpw}">{lang forgotpw}</a>


      <!--{else}-->

      <strong>{$_G[member][username]}</strong>

      <!--{hook/global_usernav_extra1}-->

      <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a>

      <!--{/if}-->
	  
	  <a id="wist" href="javascript:;" onMouseOver="showMenu({'ctrlid':'wist','pos':'34!','ctrlclass':'a','duration':2});" title="{lang changestyle}" >�л�</a><span class="wi_tpipe"></span>

  </div>
  
  </div>

</div>

<!--{if $_G['uid']}-->

<!--��ݵ���-->

  <ul id="wqmenu_menu" class="wi_pop" style="display: none;">

    <ul>

      <!--{loop $_G['setting']['mynavs'] $nav}-->

        <!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->

          <!--{eval $nav[code] = str_replace('static/image/feed/', 'template/xinglan_w03/xinglan/qmenu/', $nav[code]);}-->

          <li>$nav[code]</li>

        <!--{/if}-->

      <!--{/loop}-->

    </ul>

  </ul>

<!--��Ϣ-->

<ul id="wmn_menu"class="wi_pop"  style="display: none;">

  <li><a href="home.php?mod=space&do=pm" id="pm_ntc" {if $_G[member][newpm]} class="new"{/if}>{if $_G[member][newpm]}������Ϣ{else}{lang pm_center}{/if}</a></li>
  
  <!--{if $_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])}-->

  <li><a href="home.php?mod=task&item=doing" id="task_ntc" class="new">{lang task_doing}</a></li>

  <!--{/if}-->

  <li><a href="home.php?mod=follow&do=follower" class="u31">������</a></li>	
</ul>

<!--�û����Ĺ���-->

<ul id="wmod_menu" class="wi_pop"  style="display: none;">

  <li><a href="home.php?mod=spacecp" class="u31">��������</a></li>

  <!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->

  <li><a href="portal.php?mod=portalcp" class="u32"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a></li>

  <!--{/if}-->

  <!--{if $_G['uid'] && $_G['group']['radminid'] > 1}-->

  <li><a href="forum.php?mod=modcp&fid=$_G[fid]" target="_blank" class="u33">{lang forum_manager}</a></li>

  <!--{/if}-->

  <!--{if $_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']}-->

  <li><a href="admin.php?frames=yes&action=cloud&operation=applist" target="_blank" class="u34">{lang cloudcp}</a></li>

  <!--{/if}-->

  <!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->

  <li><a href="admin.php" target="_blank"  class="u35">{lang admincp}</a></li>

  <!--{/if}-->

  <!--{if check_diy_perm($topic)}-->

  <li><a href="javascript:openDiy();" title="{lang open_diy}" class="u36">DIY����</a></li>

  <!--{/if}-->
</ul>

<!--{/if}-->

<!--{if !IS_ROBOT}-->

  <!--�л����-->

<div id="wist_menu" class="wi_pop" style="display: none;">

  <ul class="wi_skin cl">

    <!--{if !$_G[style][defaultextstyle]}--><li onClick="extstyle('')" title="ʱ�п��"><i></i></li><!--{eval $i=2}--><!--{else}--><!--{eval $i=1}--><!--{/if}-->

    <!--{loop $_G['style']['extstyle'] $extstyle}-->

    <li {if is_int($i/5)}class="end"{/if} onClick="extstyle('$extstyle[0]')" title="$extstyle[1]"><i style='background:$extstyle[2]'></i></li>

    <!--{eval $i++}-->

    <!--{/loop}-->          

  </ul>      

</div>

<!--{/if}-->
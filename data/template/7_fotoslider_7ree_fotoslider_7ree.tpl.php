<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<!--
ID: fotoslider_7ree
(C)2007-2013 [www.7ree.com]
Update: 11:30 2013/5/20
This is NOT a freeware, use is subject to license terms
Agreement: http://addon.discuz.com/?@7.developer.doc/agreement_7ree_html
More Plugins: http://addon.discuz.com/?@7ree
-->
<script type="text/javascript">
!window.jQuery && document.write("<script src=\"source/plugin/fotoslider_7ree/js/jquery-1.7.1.min.js\"></script"+">");
</script>
<script src="source/plugin/fotoslider_7ree/js/jquery-easing-1.3.pack.js" type="text/javascript"></script>
<script src="source/plugin/fotoslider_7ree/js/jquery-easing-compatibility.1.2.pack.js" type="text/javascript"></script>
<script src="source/plugin/fotoslider_7ree/js/coda-slider.1.1.1.pack.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="source/plugin/fotoslider_7ree/css/slider_style_7ree.css" />


<script type="text/javascript">

var theInt = null;
var corsslink_7ree = jQuery("#crosslink");
var navthumb_7ree = jQuery("#navthumb");
var curclicked = 0;

theInterval = function(cur){
clearInterval(theInt);

if( typeof cur != 'undefined' )
curclicked = cur;

corsslink_7ree.removeClass("active-thumb");
navthumb_7ree.eq(curclicked).parent().addClass("active-thumb");
jQuery(".stripNav ul li a").eq(curclicked).trigger('click');

theInt = setInterval(function(){
corsslink_7ree.removeClass("active-thumb");
navthumb_7ree.eq(curclicked).parent().addClass("active-thumb");
jQuery(".stripNav ul li a").eq(curclicked).trigger('click');
curclicked++;
if( {$num_7ree} == curclicked )
curclicked = 0;

}, {$speed_7ree});
};

jQuery(function(){
jQuery("#main-photo-slider").codaSlider();

navthumb_7ree = jQuery(".nav-thumb");
corsslink_7ree = jQuery(".cross-link");

navthumb_7ree
.click(function() {
var this_7ree = jQuery(this);
theInterval(this_7ree.parent().attr('href').slice(1) - 1);
return false;
});

theInterval();


jQuery("#main_gride_7ree").slideToggle();

jQuery("#switch_7ree").click(function(event) {
event.preventDefault();
jQuery("#main_gride_7ree").slideToggle();
});
});
</script>



<div id="main_gride_7ree" class="main_gride_7ree clear" style="height:{$vars_7ree['height_7ree']}px; display:none;">

<div class="slider-wrap" >
<div id="main-photo-slider" class="csw">
<div class="panelContainer">
EOF;
 if(is_array($slider_7ree)) foreach($slider_7ree as $slider_value) { 
$return .= <<<EOF
<div class="panel" title="{$slider_value['0']}">
<div class="wrapper">
<a href="{$slider_value['4']}" 
EOF;
 if($vars_7ree['blank_7ree']) { 
$return .= <<<EOF
target="_blank"
EOF;
 } else { 
$return .= <<<EOF
target="_self"
EOF;
 } 
$return .= <<<EOF
><img src="{$vars_7ree['path_7ree']}{$slider_value['2']}" alt="{$slider_value['0']}" style="height:{$vars_7ree['height_7ree']}px; width:960px;"/></a>
<div class="photo-meta-data line_7ree">
<h2>{$slider_value['0']}</h2>
<span>{$slider_value['1']}</span>
</div>
</div>
</div>

EOF;
 } 
$return .= <<<EOF


</div>
</div>

<div class="thumb_7ree_2 clear">
<div><a href="#1" class="cross-link active-thumb" title="{$slider_7ree['0']['0']}"><img src="{$vars_7ree['path_7ree']}{$slider_7ree['0']['3']}" class="nav-thumb" alt="temp-thumb" /></a></div>
<div id="movers-row">

EOF;
 if($slider_7ree['1']['3']) { 
$return .= <<<EOF

<div><a href="#2" class="cross-link" title="{$slider_7ree['1']['0']}"><img src="{$vars_7ree['path_7ree']}{$slider_7ree['1']['3']}" class="nav-thumb" alt="temp-thumb" /></a></div>

EOF;
 } 
$return .= <<<EOF
	

EOF;
 if($slider_7ree['2']['3']) { 
$return .= <<<EOF

<div><a href="#3" class="cross-link" title="{$slider_7ree['2']['0']}"><img src="{$vars_7ree['path_7ree']}{$slider_7ree['2']['3']}" class="nav-thumb" alt="temp-thumb" /></a></div>

EOF;
 } if($slider_7ree['3']['3']) { 
$return .= <<<EOF

<div><a href="#4" class="cross-link" title="{$slider_7ree['3']['0']}"><img src="{$vars_7ree['path_7ree']}{$slider_7ree['3']['3']}" class="nav-thumb" alt="temp-thumb" /></a></div>

EOF;
 } if($slider_7ree['4']['3']) { 
$return .= <<<EOF

<div><a href="#5" class="cross-link" title="{$slider_7ree['4']['0']}"><img src="{$vars_7ree['path_7ree']}{$slider_7ree['4']['3']}" class="nav-thumb" alt="temp-thumb" /></a></div>

EOF;
 } 
$return .= <<<EOF

</div>						
</div>

  </div>

</div>
</div>
<div>



EOF;
?>

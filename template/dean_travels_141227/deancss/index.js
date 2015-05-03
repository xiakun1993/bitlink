// JavaScript Document

jq(function(){ 
	jq('.deannav li').hover(function(){ 
		jq(this).find('span').stop(true).animate({'top':0},300);
		if(!jq(this).hasClass('deannavThis')){
			jq(this).addClass('deannavThisJs');
		};
	},function(){ 
		jq(this).find('span').animate({'top':82},300).parents('li').removeClass('deannavThisJs');
	});
	
	jq('.weixin').hover(function(){ 
		jq(this).find('span').show();
	},function(){ 
		jq(this).find('span').hide();
	});
	
});





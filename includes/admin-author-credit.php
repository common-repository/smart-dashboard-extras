<?php 
if( !function_exists("st_sd_admin_autor_credit") ) {
	function st_sd_admin_autor_credit() {?>

	<!--Setup author credit-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=581870755197923";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	
	<div class="follow-us" style="background:rgba(3, 155, 229, .1);padding: 10px;margin:20px 20px 0 0;border-radius:4px">
	<p>This plugin brought to you by Nilanchala, <a href="http://stacktips.com" title="stacktips.com">StackTips.com</a>. Stay in touch!</p>
	<div class="fb-like" data-href="https://www.facebook.com/stacktips/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		<a href="https://twitter.com/npanigrahy" class="twitter-follow-button" data-show-count="true">Follow @npanigrahy</a>
		<a href="https://twitter.com/StackTips" class="twitter-follow-button" data-show-count="true">Follow @StackTips</a>
	</div>		
<?php
	}
}?>
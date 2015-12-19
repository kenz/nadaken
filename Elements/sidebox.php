<?php
/**
 * sidebox
 */
?>
<div class="sidemenu">
	<div class="sidebox">
		<div class="logo"><?php $this->BcBaser->logo() ?></div>
		<div class="menu_content">
			<?php $this->BcBaser->element('global_menu') ?>
		</div>
	</div>
	<div class="sidebox connection">
		<p class="company_name">
			nadaken<br />
			ナダケン株式会社
		</p>
		<div class="tel">
			<p><span class="head">TEL </span>092-000-5555</p>
			<p class="description">受付時間 平日9:30〜18:30</p>
			<p><span class="head">FAX </span>092-000-5555</p>
			<p class ="description">受付時間 24時間</p>
		</div>
		<p class="web"><?php $this->BcBaser->link("→Webからお問い合わせ", "/contact/index") ?></p>
	</div>
	<div class="sidebox search">
		<h2>search</h2>
		<?php $this->BcBaser->element('search') ?>
	</div>
	<div class="sidebox sidebox-content">
		<div class="menu_content">
			<?php $this->BcBaser->widgetArea() ?>
		</div>
	</div>

	<!--FB-->
	<div class="fb-root"></div>
	<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>



	<div style="background-color:white;margin-bottom:25px;height:484px;" class="fb-like-box" data-href="http://www.facebook.com/basercms" data-height="484" data-width="280" data-show-faces="true" data-stream="false" data-border-color="#fff" data-header="false"></div>
	<!--FB_END-->
</div><!--sidemenu-->
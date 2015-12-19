<?php
/**
 * ページ全体の処理を行っています
 */
/**
 * トップページに表示する記事の数を設定します
 */
$top_count = 9;
/**
 * BLOGページ内で表示する記事の数を設定します
 */
$blog_count = 9;
?>
<!DOCTYPE html>
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="viewport" content="width=780" />

		<?php $this->BcBaser->charset() ?>
		<?php $this->BcBaser->title() ?>
		<?php $this->BcBaser->metaDescription() ?>
		<?php $this->BcBaser->metaKeywords() ?>
		<?php $this->BcBaser->icon() ?>
		<?php $this->BcBaser->rss('ニュースリリース RSS 2.0', '/news/index.rss') ?>
		<?php $this->BcBaser->css('style') ?>
		<?php $this->BcBaser->css('admin/colorbox/colorbox'); ?>
		<?php
		$this->BcBaser->js(array(
		    'admin/jquery-1.7.2.min',
		    'admin/jquery.colorbox-min-1.4.5',
		    'admin/functions',
		    'startup',
		    'jquery.bxSlider.min',
		    'jquery.easing.1.3',
		    'config',
		    'jquery.masonry.pkgd.js'
		))
		?>
		<?php $this->BcBaser->scripts() ?>
		<?php $this->BcBaser->element('google_analytics') ?>
	</head>
	<body id="<?php $this->BcBaser->contentsName() ?>">
		<?php $this->BcBaser->header() ?>
		<div class="page">
			<div class="main_content">
				<section>
					<?php
					if ($this->BcBaser->isHome()) {
						//	$this->BcBaser->mainImage(array('all' => true, 'num' => 3, 'width' => 770));
						$imageCount = 3;
						$options = array_merge(array('num' => $imageCount, 'all' => true, 'id' => 'MainImage', 'width' => 770), array());
						echo "<ul id=\"MainImage\">";
						for ($i = 1; $i <= $imageCount; $i++) {
							$options['num'] = $i;
							echo "<li style='width:770px'>";
							echo $this->BcBaser->_getThemeImage('main_image', $options);
							echo "</li>";
						}
						echo "</ul>";

						echo "<nav>";
						$this->BcBaser->blogPosts("data", $top_count, array("tag" => "TOP"));
						echo "</nav>";
					} else {
						echo "<div class=\"subpage\">";
						if ($this->BcBaser->isPage()) {
							$this->BcBaser->element('breadcrumb1');
							echo "<div class=\"static\">";
							echo "<h1>";
							$this->BcBaser->contentsTitle();
							echo "</h1>";
						}
						$this->BcBaser->content();
						if ($this->BcBaser->isPage()) {
							echo "</div>"; //static
							$this->BcBaser->element('totop');
							$this->BcBaser->blogPosts("data", $blog_count);
							$this->BcBaser->element('totop');
						}
						flush();
						$this->BcBaser->flash();
						$this->BcBaser->element('contents_navi');
						echo "</div>";
					}
					?>
				</section>
			</div>
			<nav>
				<?php $this->BcBaser->element('sidebox') ?>
			</nav>

		</div><!--Page-->		
		<?php $this->BcBaser->footer() ?>
		<?php $this->BcBaser->func() ?>
		<script>
			$(function() {
				<?php 
				// 画像ファイルを左右の縮尺を合わせて上下をトリミングするための処理
				?>
				$(".img-eye-catch").on("load", function() {
					var ch = 127;
					var ih = ($(this).height() - ch) / 2;
					$(this).css("top", "-" + ih + "px");
				});
				<?php 
				// スマートURLを使用していない時にeye-catchが使用できないバグを回避するロジック
				?>				
				$('.img-eye-catch').error(function() {
					imageUrl = $(this).attr('src');
					i = location.href.lastIndexOf("index.php/");
					if(i===-1){
						imageUrl = "app/webroot"+imageUrl;
					}else{
						imageUrl = "../app/webroot"+imageUrl;
					}
					$(this).attr({
						src: imageUrl
					});
				});
			});
		</script>
	</body>
</html>

<?php
/**
 * ブログ詳細ページ
 */
$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->Blog->getPostContent($post, false, false, 50));
?>
<script type="text/javascript">
	$(function() {
		if ($("a[rel='colorbox']").colorbox)
			$("a[rel='colorbox']").colorbox({transition: "fade"});
	});
</script>
<nav>
<ul class="breadcrumb">
	<li><?php $this->BcBaser->link("home", "/") ?></li>	
	<?php
	$tags = ($post["BlogTag"]);
	$thisTag = false;
	if (!empty($tags)) {
		foreach ($tags as $tag) {
			if ("NEW" != $tag["name"] && "TOP" != $tag["name"]) {
				$thisTag = $tag["name"];
				echo "<li>";
				$this->BcBaser->link($tag["name"], "/data/archives/tag/" . $tag["name"]);
				echo "</li>";
				break;
			}
		}
	}
	?>
	<li ><span class="current"><?php $this->BcBaser->contentsTitle() ?></span></li>	
</ul>
</nav>
<div class="blog_single">
	<span class="date">
<?php $this->Blog->postDate($post) ?>
	</span>	
	<h1 class="with_sns">
<?php $this->BcBaser->contentsTitle() ?>
	</h1>
	<div class="sns">
		<a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja" data-count="none" data-dnt="true">ツイート</a>
		<script>!function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
				if (!d.getElementById(id)) {
					js = d.createElement(s);
					js.id = id;
					js.src = p + '://platform.twitter.com/widgets.js';
					fjs.parentNode.insertBefore(js, fjs);
				}
			}(document, 'script', 'twitter-wjs');</script>	
		<div class="fb-like" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
	</div>
	<div class="eye-catch">
<?php echo $this->Blog->eyeCatch($post) ?>
	</div>
	<div id="post-detail" class="post">
	<?php echo str_replace('<div id="post-detail">','<div class="post-detail">', $this->Blog->getPostContent($post)); ?>
	</div>
	<?php if($thisTag): ?>	
		<hr class ="bottom"/>
		<div class="tag_list">
		<?php $this->BcBaser->element('blog_tag', array('post' => $post)) ?>
		</div>	
	<?php endif ?>
</div>
<nav>
<div class="blog_sequence">
	<div class="prev">
<?php $this->Blog->prevLink($post) ?>
	</div>
	<div class="next">	
<?php $this->Blog->nextLink($post) ?>
	</div>
</div>
<?php
$this->BcBaser->element('totop');
if($thisTag){
	$this->BcBaser->blogPosts("data",9,array("tag"=>$thisTag));
	$this->BcBaser->element('totop');
}
?>
</nav>
<?php
/**
 * ブログアーカイブ一覧
 */
$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->BcBaser->getContentsTitle() . 'のアーカイブ一覧です。');
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
	<li><span class="current"><?php $this->BcBaser->contentsTitle() ?></span></li>		
</ul>
<div class ="blog_archives">
	<?php if (empty($posts)): ?>
	<?php else: ?>
		<div id="container" class="js-masonry" data-masonry-options='{ "columnWidth": 265, "itemSelector": ".article" }'>

			<?php foreach ($posts as $key => $post): ?>
				<div class="article">

					<?php
					/**
					 * 横は縮小 縦はトリミングで取り出し、記事へのリンクを貼るeyeCatch
					 */
					$this->BcBaser->element('eyeCatch2', array("post" => $post));

					// タグのテキストを取り出して配列に格納	
					$tags = split(",", (strip_tags(str_replace(" ", "", $this->Blog->getTag($post)))));
					$tagLinks = split(",", ($this->Blog->getTag($post)));

					$new = false; //NEWタグが付いているか
					$exist = false; //NEWとTOP以外のタグが最低1つ以上あるか
					$tagString = ""; //NEWとTOPを除くタグ一覧の文字列
					if (count($tags) > 0) {
						$first = true;
						foreach ($tags as $tagKey => $tag) {
							if ($tag === "TOP") {
								//トップのタグは表示しない					
							} else if ($tag === "NEW") {
								//NEWタグはタイトルの後で表示する
								$new = true;
							} else {
								$exist = true;
								if ($first) {
									$first = false;
								} else {
									$tagString.= " "; //二回目からは最初に空白スペースを付ける
								}
								$tagString.= $tag;
							}
						}
						if ($exist) {
							echo "<div class=\"tags\">{$tagString}</div>";
						}
					}
					?>
					<div class="title">
						<h2>
							<?php $this->Blog->postTitle($post); ?>
						</h2>
						<?php
						if ($new) {
							echo "<span class=\"new\">NEW</span>";
						}
						?>
					</div>

					<div class="content"><?php $this->Blog->postContent($post, false, true, 40) ?></div>
				</div>

			<?php endforeach; ?>
		</div>
		<?php $this->BcBaser->element('totop'); ?>		
	<?php endif; ?>
<?php $this->BcBaser->pagination('simple'); ?>
</div>
</nav>
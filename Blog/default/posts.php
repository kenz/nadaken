<?php
/**
 * [TOP] トップページタイトル一覧
 */

/**
 * 記事一覧に表示する文字数を入力して下さい
 */
$substr = 35;
?>

<?php if(empty($posts)): ?>
<?php else: ?>
	<div id="container" class="js-masonry" data-masonry-options='{ "columnWidth": 265, "itemSelector": ".article" }'>

	<?php foreach($posts as $key => $post): ?>
		<div class="article">
		<?php 
		/**
		 * 横は縮小 縦はトリミングで取り出し、記事へのリンクを貼るeyeCatch
		 */
		$this->BcBaser->element('eyeCatch2',array("post"=>$post));
		
		// タグのテキストをただ取り出しているだけ・・・		
		$tags = split(",",(strip_tags(str_replace(" ","",$this->Blog->getTag($post)))));
		$new = false;
		if(count($tags)>1){
			echo "<div class=\"tags\">";
			$first = true;
			foreach($tags as $tagKey => $tag){
				if($tag==="TOP"){
					//トップのタグは表示しない					
				}else if($tag==="NEW"){
					//NEWタグはタイトルの後で表示する
					$new = true;
				}else{
					if($first){
						$first = false;
					}else{
						echo " ";
					}
					echo $tag;
				}
			}
			echo "</div>";
		}
		?>
		<div class="title">
			<h2>
			<?php $this->Blog->postTitle($post);?>
			</h2>
			<?php 
				if($new){
					echo "<span class=\"new\">NEW</span>";
				}
			?>
		</div>
			
		<div class="content"><?php $this->Blog->postContent($post,false,true,$substr) ?></div>
	</div>

	<?php endforeach; ?>
	</div>
<?php endif; 


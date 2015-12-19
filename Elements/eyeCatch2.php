<?php
/**
* 記事本文にリンクが貼られDIVタグで囲まれたeyecatchを出力します。
* 引数:$post 記事
*/
$eyeCatch = $this->Blog->getEyeCatch($post, array('link'=>false,"alt"=>$this->Blog->getPostTitle($post,false)."を開く","title"=>"記事を開く"));

if($eyeCatch){
	echo "<div class=\"eyeCatch\">";
	$this->Blog->postLink($post,$eyeCatch);
	echo "</div>";
}
<?php
/**
* ホーム画面と現在のページのみのパンくずリスト
*/
?>
<nav>
<ul class="breadcrumb">
<li><a href="/">home</a></li>
<li><span class="current">
<?php $this->BcBaser->contentsTitle() ?>
</span></li></ul>
</nav>
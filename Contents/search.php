<?php $this->BcBaser->element('breadcrumb1'); 
$blog_count = 9;
?>

<div class="search_result static">
<h1><?php $this->BcBaser->contentsTitle() ?></h1>

<div class="section">
	<?php if (!empty($this->Paginator)): ?>
		<div class="search_result_header">		
			<?php echo $this->Paginator->counter(array('format' => '<strong>' . implode(' ', $query) . '</strong> で検索した結果 <strong>%start%〜%end%</strong>件目 / %count% 件')) ?>
		</div>
	<?php endif ?>
	<!-- list-num -->
	<?php $this->BcBaser->element('list_num') ?>
</div>

<?php if ($datas): ?>
	<?php foreach ($datas as $data): ?>
		<div class="section result">
			<h2><?php $this->BcBaser->link($this->BcBaser->mark($query, $data['Content']['title']), $data['Content']['url']) ?></h2>
			<p><?php echo $this->BcBaser->mark($query, $this->Text->truncate($data['Content']['detail'], 100)) ?></p>
			<p class="url"><?php $this->BcBaser->link(fullUrl($data['Content']['url']), $data['Content']['url']) ?></p>
		</div>
	<?php endforeach ?>
<?php else: ?>
	<div class="section">
		<p class="no-data">該当する結果が存在しませんでした。</p>
	</div>
<?php endif ?>

<div class="clearfix">
	<!-- pagination -->
	<?php $this->BcBaser->pagination('simple', array(), array('subDir' => false)) ?>
</div>
</div>
<?php
$this->BcBaser->element('totop');
$this->BcBaser->blogPosts("data", $blog_count);
$this->BcBaser->element('totop');
						
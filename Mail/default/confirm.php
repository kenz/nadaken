<?php
/**
 * メールフォーム確認ページ
 */
$this->BcBaser->css('admin/jquery-ui/ui.all', array('inline' => true));
$this->BcBaser->js(array('admin/jquery-ui-1.8.19.custom.min', 'admin/i18n/ui.datepicker-ja'), false);
if ($freezed) {
	$this->Mailform->freeze();
}
?>
<?php $this->BcBaser->element('breadcrumb1'); ?>					
<div class="mail mail_confirm">
	<h1><?php $this->BcBaser->contentsTitle() ?></h1>
	<?php if ($freezed): ?>
		<h2>入力内容の確認</h2>
		<p class="section">入力した内容に間違いがなければ「送信する」ボタンをクリックしてください。</p>
	<?php else: ?>
		<h2>入力フォーム</h2>
	<?php endif; ?>
	<div class="section">
		<?php $this->BcBaser->flash() ?>
		<?php $this->BcBaser->element('mail_form') ?>
	</div>
</div>
<?php $this->BcBaser->element('totop'); ?>					
<?php $this->BcBaser->blogPosts("data", 9); ?>
<?php $this->BcBaser->element('totop');
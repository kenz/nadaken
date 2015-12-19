<?php
/**
 * メールフォーム
 */
$this->BcBaser->css('admin/jquery-ui/ui.all', array('inline' => true));
$this->BcBaser->js(array('admin/jquery-ui-1.8.19.custom.min', 'admin/i18n/ui.datepicker-ja'), false);
?>
<?php $this->BcBaser->element('breadcrumb1'); ?>					
<div class="mail mail_index">
	<h1>
		<?php $this->BcBaser->contentsTitle() ?>
	</h1>

	<div class="section mail-description">
		<?php $this->Mail->description() ?>
	</div>

	<div class="section">
		<?php $this->BcBaser->flash() ?>
		<?php $this->BcBaser->element('mail_form') ?>
	</div>	
</div>
<?php $this->BcBaser->element('totop'); ?>					
<?php $this->BcBaser->blogPosts("data", 9); ?>
<?php $this->BcBaser->element('totop');
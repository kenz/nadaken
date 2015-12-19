<?php
/**
 * メールフォーム送信完了ページ
 */
if (Configure::read('debug') == 0) {
	/* プラグインの為か、inlineが動作しない */
	//$this->BcHtml->meta(array('http-equiv'=>'Refresh'),null,array('content'=>'5;url='.$mailContent['MailContent']['redirect_url']),false);
	$this->addScript($this->Html->meta(array('http-equiv' => 'Refresh'), null, array('content' => '5;url=' . $mailContent['MailContent']['redirect_url'])));
}
?>
<?php $this->BcBaser->element('breadcrumb1'); ?>					
<div class="mail mail_submit">
	<h1>
		<?php $this->BcBaser->contentsTitle() ?>
	</h1>
	<div class="mail_submit_message">
		<h2>メール送信完了</h2>

		<p>お問い合わせ頂きありがとうございました。<br />
			確認次第、ご連絡させて頂きます。</p>
		<?php if ($mailContent['MailContent']['redirect_url']): ?>
			<p>※５秒後にトップページへ自動的に移動します。</p>
			<p><a href="<?php echo $mailContent['MailContent']['redirect_url'] ?>">移動しない場合はコチラをクリックしてください。≫</a> </p>
		<?php endif; ?>
	</div>
</div>
<?php $this->BcBaser->element('totop'); ?>					
<?php $this->BcBaser->blogPosts("data", 9); ?>
<?php $this->BcBaser->element('totop');
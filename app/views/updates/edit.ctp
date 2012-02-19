<div class="story index">
<?php echo $this->Form->create('Update');?>
	<fieldset>
 		<legend><?php __('Edit Update'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('content');
		echo $this->Form->input('link');
		echo $this->Form->input('linkDescription');
		echo $this->Form->input('status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
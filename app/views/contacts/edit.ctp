<div class="story index">
<?php echo $this->Form->create('Contact');?>
	<fieldset>
 		<legend><?php __('Edit Contact'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('message');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
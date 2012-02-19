<div class="ramblings view">
<h2><?php  __('Rambling');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rambling['Rambling']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rambling['Rambling']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>


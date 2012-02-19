<div class="updates index">
	<h2><?php __('Updates');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('link');?></th>
			<th><?php echo $this->Paginator->sort('linkDescription');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($updates as $update):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $update['Update']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($update['User']['username'], array('controller' => 'users', 'action' => 'view', $update['User']['id'])); ?>
		</td>
		<td><?php echo $update['Update']['created']; ?>&nbsp;</td>
		<td><?php echo $update['Update']['modified']; ?>&nbsp;</td>
		<td><?php echo $update['Update']['content']; ?>&nbsp;</td>
		<td><?php echo $update['Update']['link']; ?>&nbsp;</td>
		<td><?php echo $update['Update']['linkDescription']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($update['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $update['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $update['Update']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $update['Update']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $update['Update']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $update['Update']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
    
    <?php echo $this->element('pagination') ?>
    

</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
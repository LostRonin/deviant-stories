<div class="stories index">
	<h2><?php __('Stories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo ('id');?></th>
			<th><?php echo ('username');?></th>
			<th><?php echo ('name');?></th>
			<th><?php echo ('content');?></th>
			<th><?php echo ('coverImage');?></th>
			<th><?php echo ('link');?></th>
			<th><?php echo ('created');?></th>
			<th><?php echo ('modified');?></th>
			<th><?php echo ('status_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($storyLists as $story):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $story['Story']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($story['User']['username'], array('controller' => 'users', 'action' => 'view', $story['User']['id'])); ?>
		</td>
		<td><?php echo $story['Story']['name']; ?>&nbsp;</td>
		<td><?php echo $story['Story']['content']; ?>&nbsp;</td>
		<td><?php echo $story['Story']['coverImage']; ?>&nbsp;</td>
		<td><?php echo $story['Story']['link']; ?>&nbsp;</td>
		<td><?php echo $story['Story']['created']; ?>&nbsp;</td>
		<td><?php echo $story['Story']['modified']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($story['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $story['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $story['Story']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $story['Story']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $story['Story']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $story['Story']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
    
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
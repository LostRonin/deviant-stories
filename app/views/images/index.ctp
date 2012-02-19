<div class="images index">
	<h2><?php __('Images');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('large');?></th>
			<th><?php echo $this->Paginator->sort('small');?></th>
			<th><?php echo $this->Paginator->sort('thumb');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
            <th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('username_id');?></th>
            <th><?php echo $this->Paginator->sort('created');?></th>
            <th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($images as $image):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $image['Image']['id']; ?>&nbsp;</td>
		<td><?php echo $image['Image']['large']; ?>&nbsp;</td>
		<td><?php echo $image['Image']['small']; ?>&nbsp;</td>
		<td><?php echo $image['Image']['thumb']; ?>&nbsp;</td>
		<td><?php echo $image['Image']['name']; ?>&nbsp;</td>
        <td><?php echo $image['Image']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($image['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $image['Status']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($image['User']['username'], array('controller' => 'users', 'action' => 'view', $image['User']['id'])); ?>
		</td>
        <td><?php echo $image['Image']['created']; ?>&nbsp;</td>
        <td><?php echo $image['Image']['modified']; ?>&nbsp;</td>
		<td class="actions">
            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $image['Image']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $image['Image']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $image['Image']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $image['Image']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>

    <?php $this->element('pagintor'); ?>

</div>
<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
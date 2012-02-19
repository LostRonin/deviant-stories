<div class="titles index">
	<h2><?php __('Ramblings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
            <th><?php echo $this->Paginator->sort('content');?></th>
            <th><?php echo $this->Paginator->sort('created');?></th>
            <th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ramblings as $rambling):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rambling['Rambling']['id']; ?>&nbsp;</td>
		<td><?php echo $rambling['Rambling']['title']; ?>&nbsp;</td>
        <td><?php echo $rambling['Rambling']['content']; ?>&nbsp;</td>
        <td><?php echo $rambling['Rambling']['created']; ?>&nbsp;</td>
        <td><?php echo $rambling['Rambling']['modified']; ?>&nbsp;</td>        
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $rambling['Rambling']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $rambling['Rambling']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $rambling['Rambling']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rambling['Rambling']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
    
    <?php echo $this->element('pagination'); ?>

</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
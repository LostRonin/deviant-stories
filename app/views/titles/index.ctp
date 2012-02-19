<div class="titles index">
	<h2><?php __('Titles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
            <th><?php echo $this->Paginator->sort('slider_tag');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($titles as $title):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $title['Title']['id']; ?>&nbsp;</td>
		<td><?php echo $title['Title']['name']; ?>&nbsp;</td>
        <td><?php echo $title['Title']['slider_tag']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $title['Title']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $title['Title']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $title['Title']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $title['Title']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>

    
    <?php echo $this->element('tag_cloud'); ?>
    
    <?php echo $this->element('pagination'); ?>

</div>



<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
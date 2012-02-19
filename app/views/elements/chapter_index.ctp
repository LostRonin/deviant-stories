<div class="chapters index">
	<h2><?php __('Chapters');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('story_id');?></th>
			<th><?php echo $this->Paginator->sort('title_id');?></th>
			<th><?php echo $this->Paginator->sort('block');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('image_id');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
            <th><?php echo $this->Paginator->sort('image_class');?></th>
            <th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($chapters as $chapter):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $chapter['Chapter']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chapter['Story']['name'], array('controller' => 'stories', 'action' => 'view', $chapter['Story']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($chapter['Title']['name'], array('controller' => 'titles', 'action' => 'view', $chapter['Title']['id'])); ?>
		</td>
		<td><?php echo $chapter['Chapter']['block']; ?>&nbsp;</td>
		<td><?php echo $chapter['Chapter']['content']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chapter['Image']['name'], array('controller' => 'images', 'action' => 'view', $chapter['Image']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($chapter['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $chapter['Status']['id'])); ?>
		</td>
		<td><?php echo $chapter['Chapter']['image_class']; ?>&nbsp;</td>
		<td><?php echo $chapter['Chapter']['description']; ?>&nbsp;</td>


		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $chapter['Chapter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $chapter['Chapter']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $chapter['Chapter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chapter['Chapter']['id'])); ?>
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
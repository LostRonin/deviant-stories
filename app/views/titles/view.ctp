<div class="titles view">
<h2><?php  __('Title');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $title['Title']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $title['Title']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slider Tag'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $title['Title']['slider_tag']; ?>
			&nbsp;
		</dd>        
	</dl>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>

<div class="related">
	<h3><?php __('Related Chapters');?></h3>
	<?php if (!empty($title['Chapter'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Story Id'); ?></th>
		<th><?php __('Title Id'); ?></th>
		<th><?php __('Block'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Image Id'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Tags'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($title['Chapter'] as $chapter):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $chapter['id'];?></td>
			<td><?php echo $chapter['story_id'];?></td>
			<td><?php echo $chapter['title_id'];?></td>
			<td><?php echo $chapter['block'];?></td>
			<td><?php echo $chapter['content'];?></td>
			<td><?php echo $chapter['image_id'];?></td>
			<td><?php echo $chapter['status_id'];?></td>
			<td><?php echo $chapter['tags'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'chapters', 'action' => 'view', $chapter['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'chapters', 'action' => 'edit', $chapter['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'chapters', 'action' => 'delete', $chapter['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chapter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chapter', true), array('controller' => 'chapters', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

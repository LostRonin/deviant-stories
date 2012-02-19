<?php $html->addCrumb('Gallery', null); ?>
<?php $this->set("title_for_layout","Deviant Gallery | deviant-stories.com"); ?>

<br />
<span class="caption2">Gallery</span>
<span style="color: #760000;"><?php echo '&nbsp&nbsp&nbsp' . $stats['total']; ?>  (Images online)</span>
<br /><br />


<div>
    <?php foreach ($imageLists as $image): ?>

        <?php echo $this->Html->link($html->image($image['Image']['thumb'],
                                    array('class' => 'gallery_border')),
                                    array('controller' => 'images', 'action' => 'comment', $image['Image']['id']),
                                    array('escape' => false)); ?>
    <?php endforeach; ?>

</div>

<br />

<?php echo $this->element('pagination'); ?>

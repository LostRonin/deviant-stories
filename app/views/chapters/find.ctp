<h2><?php __('Tag Results');?></h2>

These items are tagged as 
<br /><br />

<div class="tag_results caption2">
    <?php foreach ($tags as $tag): ?>
        <?php echo pr($tags); ?>
           
        <span><?php echo $this->Html->link($tag['Chapter']['story_id'], array('controller' => 'chapters', 'action' => 'chapteroverview', $tag['Chapter']['story_id']));?></span><br /><br />        
    <?php endforeach; ?>
</div>  
 
  
<div>    
    <?php echo $this->element('pagination') ?>
</div>
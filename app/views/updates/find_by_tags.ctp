<div class="updates index">
	<h2><?php __('Updates');?></h2>

<?php
    foreach ($tags as $tag):
        echo pr($tag);
    endforeach;
?>

<?php echo $this->element('pagination') ?>

</div>


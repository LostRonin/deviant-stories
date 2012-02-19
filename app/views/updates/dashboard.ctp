<div class="addthis_box"><?php echo $this->element('addthis'); ?></div>
<?php $this->set("title_for_layout","Home | deviant-stories.com"); ?>

<!--<h5 class="quiet" style="text-align: center;">Users Online</h5>
<div class="addthis_box">-->
    <?php //echo $this->element('online'); ?>
<!--</div>-->

<h3 class="quiet" style="text-align: center;">News</h3>

<?php foreach ($threeRecords as $update): ?>
    <?php echo $this->element('newsbox', array('update' => $update)); ?>
<?php endforeach; ?>
<?php $html->addCrumb('Ramblings', '/ramblings/ramblingoverview'); ?>
<?php $this->set("title_for_layout","Ramblings | deviant-stories.com"); ?>


<h2 style="margin-top: 40px;">Ramblings about everything</h2>

<div class="textbox3">
<?php foreach ($ramblingLists as $rambling): ?>

    <span class="caption"><?php echo $rambling['Rambling']['title']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="right"><?php echo $time->formattedDate($rambling['Rambling']['modified']); ?></span>

    <div style="margin-top: 20px;">
        <p class="dotTrailsFixed" style="width:600px;">
            <?php echo nl2br(h($rambling['Rambling']['content'])); ?>
        </p>
    </div>

    <div style="margin-top: 30px; margin-bottom: 50px;">
        <?php echo $this->Html->image('plus_16.png', array('alt' => 'plus image')); ?>
        <span style="font-weight: bold; font-size: small;"><?php echo $this->Html->link('View and add comments to this post', array('controller' => 'ramblings', 'action' => 'comment', $rambling['Rambling']['id'])); ?></span>
    </div>

<?php endforeach; ?>
</div>

<?php echo $this->element('pagination'); ?>

<style type="text/css">
    a:hover{color:#760000;}
    .dotTrailsLink, .dotTrailsLink:hover{color:#000;}

    p{
    	-webkit-border-radius: 5px;
    	-moz-border-radius: 5px;
    	border-radius: 5px;
    	border:1px solid #760000;
    	padding:15px;
    }
</style>

<?php $html->addCrumb('Gallery', '/images/gallery'); ?>
<?php $html->addCrumb('Image', null); ?>

<?php $this->set("title_for_layout","Gallery | deviant-stories.com"); ?>

<?php foreach ($imageContent as $image): ?>
    <div class="span-16 last">

        <div style="margin-top: 20px; margin-bottom: 20px; text-align:center"><?php echo $lightbog->img($image['Image']['small'], $image['Image']['large'], array('title' => $image['Image']['name'], 'class' => 'gallery_border')); ?></div>

        <div style="margin-bottom: 20px; text-align:center">(Click on image to enlarge it)</div>
        <div style="margin-bottom: 20px; text-align:center"><span class="caption"><?php echo $image['Image']['name'];?></span>
        <?php echo  '       (by  ' . $image['User']['username'] . ')' ;?></div>
    </div>

<?php
    $last = $stats['Image']['id'];
    $next = $image['Image']['id'] + 1;
    if($next > $last)
    {
        $next = 2;
    }

    $prev = $image['Image']['id'] - 1;

    if($prev < 2)
    {
        $prev = $last;
    }
?>

    <div class="span-3">
        <?php echo $this->Html->link($this->Html->image('button-left-small.png'),
                                    array('controller' => 'images', 'action' => 'comment', $prev),
                                    array('escape' => false)); ?>
    </div>

    <div class="span-6 textbox6">
        <?php echo '...' . $image['Image']['description'] . '...' ;?>
    </div>

    <div class="span-3 last">
        <div class="push-2">
            <?php echo $this->Html->link($this->Html->image('button-right-small.png'),
                                        array('controller' => 'images', 'action' => 'comment', $next),
                                        array('escape' => false)); ?>
        </div>
    </div>

    <br class="clear" />

    <div class="push-6" style="margin-top: 30px;">
        <span class="caption3"><?php echo 'Uploaded: ' . $time->formattedDate($image['Image']['created']); ?>:</span>
    </div>
<?php
endforeach; ?>


<!--
<div class="span-16 last">

    <div class="push-6 rating_box">
-->        <?php //echo $this->element('rating', array('plugin' => 'rating',
                 //                       'model' => 'Image',
                 //                       'id' => $image['Image']['id']));
    ?>
<!--
</div>
</div>
-->




<?php
if(!empty($comments['Comment']['0']['class']))
{
    $cc = $comments['Comment']['0']['class'];
    $fi = $comments['Comment']['0']['foreign_id'];
    $coms = ClassRegistry::init('Comment')->getComment($cc, $fi);
}
?>


<?php
if(!empty($coms))
{
    foreach ($coms as $com): ?>

    <div class="emWrapper">

        <div class="emComment" class="right">
                <span class="caption3"><?php echo '&nbsp&nbsp&nbsp&nbsp' . $com['Comment']['name']; ?></span> says on
                <?php echo $time->formattedDate($com['Comment']['modified']); ?>:<br />
                <br/>
                <?php echo nl2br(h($com['Comment']['body'])); ?>
                <br />
        </div>

        <div class="emGravatar" class="left">
                <?php
                    echo $gravatar->image($com['Comment']['email'], array('size' => 58, 'rating' => 'x'), array('alt' => 'Sidebar Avatar', 'width' => 58, 'height' => 58));
                ?>
        </div>
    </div>

    <?php endforeach;
} ?>

<div class="span-8 last" style="margin-top: 30px;">
    <div class="push-3">
        <?php echo $this->Form->create('Comment',array('url'=>array('controller'=>'images', 'action'=>'comment', $comments['Image']['id'])));?>
        	<fieldset>
        		<span class="emTitle"><?php echo $this->Session->read('Auth.User.username') . ', add your comment:';?></span>

                <?php
            		echo $this->Form->input('Comment.name', array('type' => 'hidden'));
                    echo $this->Form->input('Comment.body', array(
                                        'label' => false,
                                        'cols'  => 60,
                                        'rows'  => 10,
                                        'error' => array(
                                        'notEmpty' => __d('Comment', 'Please specify your comment', true))));
        	   ?>
        	</fieldset>

            <div style="margin-top: 20px; margin-bottom: 20px;"><?php echo $this->Form->end('Submit', true);?></div>
    </div>
</div>
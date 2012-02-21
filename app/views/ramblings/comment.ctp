<?php $html->addCrumb('Ramblings', '/ramblings/ramblingoverview'); ?>
<?php $html->addCrumb('Comment', null); ?>

<?php $this->set("title_for_layout","Ramblings | deviant-stories.com"); ?>

<h2 style="margin-top: 40px;">Comment my Ramblings...</h2>

<div class="textbox3">
        <span class="caption"><?php echo $comments['Rambling']['title']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="fltrt"><?php echo $time->formattedDate($comments['Rambling']['modified']); ?></span><br />
        <br />
        <?php echo nl2br(h($comments['Rambling']['content'])); ?>
</div>

<div style="margin-top: 30px; margin-bottom: 20px; margin-left: 40px;"><p style="width:600px; border-top: 1px solid #760000;"></p></div>


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

        <div class="emCommentRamblings" class="right">
                <span class="caption3"><?php echo '&nbsp&nbsp&nbsp&nbsp' . $com['Comment']['name']; ?></span> says on
                <?php echo $time->formattedDate($com['Comment']['modified']); ?>:<br />
                <br/>
                <?php echo nl2br(h($com['Comment']['body'])); ?>
                <br />
        </div>

        <div class="emGravatarRamblings" class="left">
                <?php
                    echo $gravatar->image($com['Comment']['email'], array('size' => 67, 'rating' => 'x'), array('alt' => 'Sidebar Avatar', 'width' => 67, 'height' => 67));
                ?>
        </div>
    </div>

    <?php endforeach;
} ?>

<div class="span-8 last" style="margin-top: 30px;">
    <div class="push-3">
        <?php echo $this->Form->create('Comment',array('url'=>array('controller'=>'ramblings', 'action'=>'comment', $comments['Rambling']['id'])));?>
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






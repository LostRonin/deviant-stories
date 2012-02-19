<?php $html->addCrumb('Story Overview', '/stories/storyoverview'); ?>
<?php $html->addCrumb('Chapter Overview', null); ?>

<?php $this->set("title_for_layout","Chapters | deviant-stories.com"); ?>

<div class="push-1">
<br />
<span class="caption2 quiet">Chapter Overview</span>
<br /><br />

<?php   $i = 1;
        $tabs = 1;
?>

<?php foreach ($chapterLists as $chapter): ?>
    <div class="story_overview2">

        <?php if($i < 10 )
        {
            $i = '0'.$i ;
        }
        ?>
        <br />
        <span class="caption">Chapter<?php echo ' ' . $i . ':' . '&nbsp'?></span>
        <span class="caption2"><?php echo $this->Html->link($chapter['Title']['name'], array('controller' => 'chapters', 'action' => 'storychapter', $chapter['Story']['id'], $chapter['Title']['id']. '#tab_' . $tabs)); ?></span>
        <br />
        <div style="margin-top: 8px;"><?php echo '(click on chapter name to read this chapter)'?></div>
        <br /><br />

        <?php echo $chapter['Chapter']['description']; ?>
        <br /><br />

        <?php //echo $this->element('rating', array('plugin' => 'rating',
              //                      'model' => 'Chapter',
              //                      'id' => $chapter['Chapter']['id'])); ?>

        <br /><br />
        <?php $i++; $tabs++ ?>
     </div>
<?php endforeach; ?>

<br /><br />

</div>


<!--<div class="span-16 last push-6">
    <span class="inputButton buttonlink">--><?php //echo $html->link('Story Overview', array('controller' => 'stories', 'action' => 'storyoverview'), array('class' => 'inputButton', 'class' => 'buttonlink')); ?></span><br />
<!--</div>-->


<!-- buttonlink - what is it - maybe check out ecsstender for button effects -->
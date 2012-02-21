<?php $html->addCrumb('Story Overview', '/stories/storyoverview'); ?>
<?php $html->addCrumb('Chapter Overview', null); ?>

<?php $this->set("title_for_layout","Chapters | deviant-stories.com"); ?>

<div class="push-1">
<br />
<span class="caption2" style="margin: 1em 0;">Chapter Overview</span>
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

        <div class="textbox1"><?php echo '(click on chapter name to read this chapter)'?></div>

        <div class="textbox1"><?php echo $chapter['Chapter']['description']; ?></div>

        <?php //echo $this->element('rating', array('plugin' => 'rating',
              //                      'model' => 'Chapter',
              //                      'id' => $chapter['Chapter']['id'])); ?>

        <?php $i++; $tabs++ ?>
     </div>
<?php endforeach; ?>



</div>


<!--<div class="span-16 last push-6">
    <span class="inputButton buttonlink">--><?php //echo $html->link('Story Overview', array('controller' => 'stories', 'action' => 'storyoverview'), array('class' => 'inputButton', 'class' => 'buttonlink')); ?></span><br />
<!--</div>-->


<!-- buttonlink - what is it - maybe check out ecsstender for button effects -->
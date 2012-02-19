<?php $html->addCrumb('Story Overview', null); ?>
<?php $this->set("title_for_layout","Stories | deviant-stories.com"); ?>


<div class="push-1">
<br />
<span class="caption2">Story Overview</span>
<span style="color: #760000;"><?php echo '&nbsp&nbsp&nbsp' . $stats['total']; ?>  (Stories online)</span>
<br /><br /><br />

<?php   $i = 1; ?>

<?php foreach ($storyLists as $story): ?>
    <div>
        <div class="story_overview"></div>

        <?php if($i < 10 )
        {
            $i = '0'.$i ;
        }
        ?>

        <span class="caption">Story<?php echo ' ' . $i . ':' . '&nbsp'?></span>
        <span class="caption2"><?php echo $this->Html->link($story['Story']['name'], array('controller' => 'chapters', 'action' => 'chapteroverview', $story['Story']['id'])); ?></span>
        <br />
        <div style="margin-top: 8px;"><?php echo '(click on story name to see chapters)'?></div>

        <br /><br />

        <div class="span-16 last">
            <span class="textbox"><?php echo $story['Story']['content']; ?></span>
            <br /><br />
        </div>

        <div class="span-16 last append-bottom"></div>
        <div class="span-16 last append-bottom"></div>

        <div class="span-8">
            <span style="font-weight: bold;">Published: </span><?php echo '  ' . $time->formattedDate($story['Story']['modified']); ?>
        </div>

        <div class="span-8 last push-1">
            <span style="font-weight: bold;">Author: </span><?php echo '  ' . $story['User']['username']; ?>
        </div>

        <div class="clear"></div>

        <br /><br />

        <?php $i++; ?>

     </div>

<?php endforeach; ?>

</div>


<br /><br />

<?php echo $this->element('pagination'); ?>

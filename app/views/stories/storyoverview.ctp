<?php $html->addCrumb('Story Overview', null); ?>
<?php $this->set("title_for_layout","Stories | deviant-stories.com"); ?>


<div class="push-1">
<div class="caption2" style="margin: 1em 0;">Story Overview
<span style="color: #760000; font-size: .7em; font-weight: normal;"><?php echo '&nbsp&nbsp&nbsp' . $stats['total']; ?>  (Stories online)</span></div>


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

        <div class="textbox1"><?php echo '(click on story name to see chapters)'?></div>

        <div class="span-16 last">
            <span class="textbox"><?php echo $story['Story']['content']; ?></span>
        </div>

        <div class="span-8 textbox1">
            <span style="font-weight: bold;">Published: </span><?php echo '  ' . $time->formattedDate($story['Story']['modified']); ?>
        </div>

        <div class="span-8 last push-1">
            <div class="textbox1">
                <span style="font-weight: bold;">Author: </span><?php echo '  ' . $story['User']['username']; ?>
            </div>
        </div>

        <div class="clear"></div>


        <?php $i++; ?>

     </div>

<?php endforeach; ?>

</div>


<br /><br />

<?php echo $this->element('pagination'); ?>

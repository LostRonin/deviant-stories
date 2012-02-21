<?php $html->addCrumb('Tags'); ?>
<?php $this->set("title_for_layout","Tags | deviant-stories.com"); ?>

<br /><br />

<?php $params = $this->params['named']; ?>

These items are tagged with:&nbsp;&nbsp;<span class="caption3"><?php echo $params['by']; ?></span>
<br /><br />

<?php
    foreach ($tags as $tag):
        //echo pr($tag);
    endforeach;
?>

<?php $chaps = ClassRegistry::init('Chapter')->getChaps($tag['Title']['id']); ?>

<?php
    foreach ($chaps as $chap):
        //echo pr($chap);
    endforeach;
?>


<div class="tag_results">
    <?php foreach ($tags as $tag): ?>

        <table cellpadding="5" cellspacing="10" width="500" align="center">
            <tr>
                <td width="20%"><span class="caption3">Chapter</span></td>
                <td width="80%"><span class="caption"><?php echo $this->Html->link($tag['Title']['name'], array('controller' => 'chapters', 'action' => 'storychapter', $chap['Story']['id'], $chap['Title']['id'] . '#tab_' . $tag['Title']['slider_tag']));?></span></td>
            </tr>

            <tr>
                <td width="20%"><span class="caption3">Story</span></td>
                <td width="80%"><span class="caption3"><?php echo $chap['Story']['name']; ?></span></td>
            </tr>

            <tr>
                <td width="20%"><span class="caption3">Description</span></td>
                <td width="80%"><?php echo $chap['Chapter']['description']; ?></td>
            </tr>
        </table>
        <br />

    <?php endforeach; ?>
</div>


<div>
    <?php echo $this->element('pagination') ?>
</div>
<?php //echo $this->element('contact', array('plugin' => null)); ?>

<?php $this->set("title_for_layout","Deviant-Stories - Message submit"); ?>
<?php $html->addCrumb('Contact', '/contacts/add'); ?>
<?php $html->addCrumb('Submitted Message', null); ?>

<?php $this->set("title_for_layout","Submit | deviant-stories.com"); ?>

<br /><br /><br /><br /><br />

<div style="text-align:center">
    <span class="caption" style="color: #760000;"><?php echo $this->Session->flash(); ?></span>
</div>

<br /><br />
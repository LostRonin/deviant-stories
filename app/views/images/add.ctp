<div class="story index">
    <h1>New Image</h1>
    
    <?php echo $this->Form->create('Image');?>
        <?php echo $this->element('form_images'); ?>
    <?php echo $this->Form->end('Submit', true);?>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
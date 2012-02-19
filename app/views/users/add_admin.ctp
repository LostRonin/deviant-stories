<div class="story index">
    <h1>Add User</h1>
    
    <?php echo $this->Form->create('User');?>
        <?php echo $this->element('form_users'); ?>
    <?php echo $this->Form->end('Submit', true);?>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>
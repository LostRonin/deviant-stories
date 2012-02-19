<div class="span-12 login_box_left">
    <span class="crumbs_font">
    <?php $html->addCrumb('', ''); ?>
    <?php echo $html->getCrumbs(' &gt; ','Home'); ?>
    </span>
</div>

<div class="span-12 last">
    <div class="login_box_right">
        <?php
            if (!$this->Session->read('Auth.User.username'))
            { ?>
                <span class="crumbs_font" style="float: right;"><?php echo 'not logged in'; ?></span>
            <?php }
            else
            { ?>
                <span class="crumbs_font" style="float: right;"><?php echo 'logged in as: ' . $this->Session->read('Auth.User.username'); ?></span>
            <?php }
        ?>
    </div>
</div>
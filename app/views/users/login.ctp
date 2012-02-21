<?php $html->addCrumb('Login', '/users/login'); ?>
<?php $this->set("title_for_layout","Login | deviant-stories.com"); ?>

<?php
if (!$this->Session->read('Auth.User.username'))
{ ?>

    <div style="height: 400px; margin-left: 60px; margin-top: 40px;">

        <div id="login" class="span-11 last">

            <h2 class="quiet" style="text-align: center; margin-top: 20px;">Login</h2>
            <h6 class="quiet" style="text-align: center; margin-top: 20px;">to get access to deviant-stories.com</h6>

                <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login'))); ?>

                <fieldset>
                    <div style="margin-top: 10px;">
                    <?php
                        echo $this->Form->input('User.username', array(
                            'label' => '',
                            'placeholder'   => 'Username',
                            'class' =>  'text',
                            'type'  =>  'text',
                            'size'  => 64));
                    ?>
                    </div>

                    <div style="margin-top: 20px;">
                    <?php
                        echo $this->Form->input('User.password', array(
                            'label' => '',
                            'placeholder' => 'Password',
                            'class' =>  'text',
                            'type'  =>  'password',
                            'size'  => 64));
                    ?>
                    </div>

                    <div style="margin-top: 30px;"><?php echo $this->Form->end('Login'); ?></div>
            </fieldset>
        </div>
    </div>

<?php }
else
{ ?>
    <div style="height: 400px; margin-left: 60px; margin-top: 20px;">

        <div id="login" class="span-11 last">

            <h2 class="quiet" style="text-align: center; margin-top: 20px;">Login</h2>
            <h6 class="quiet" style="text-align: center; margin-top: 20px;">to get access to deviant-stories.com</h6>

                <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login'))); ?>

                <fieldset>

                <div style="margin-top: 10px;">
                <?php
                    echo $this->Form->input('User.username', array(
                        'label' => '',
                        'placeholder'   => 'Username',
                        'class' =>  'text',
                        'type'  =>  'text',
                        'size'  => 64));
                ?>
                </div>

                <div style="margin-top: 20px;">
                <?php
                    echo $this->Form->input('User.password', array(
                        'label' => '',
                        'placeholder' => 'Password',
                        'class' =>  'text',
                        'type'  =>  'password',
                        'size'  => 64));
                ?>
                </div>

                <div style="margin-top: 30px;"><?php echo $this->Form->end('Login'); ?></div>

            </fieldset>

        </div>
    </div>
<?php } ?>

<?php echo $session->flash(); ?>

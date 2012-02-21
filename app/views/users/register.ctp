<?php $html->addCrumb('SignUp', '/users/register'); ?>
<?php $this->set("title_for_layout","Register | deviant-stories.com"); ?>

<?php echo $session->flash(); ?>

<div style="height: 1050px; margin-left: 60px; margin-top: 20px;">
    <div id="registration" class="span-11">
        <h2>Sign-Up</h2>

        <h6>Just a step away to get access</h6>
        <h6>to deviant-stories.com ...</h6>

        <?php echo $this->Form->create('User', array('action' => 'register')); ?>

        <fieldset>

            <p><?php
                echo $this->Form->input('username', array(
                    'label' =>  '',
                    'placeholder'   => 'Username',
                    'class' =>  'text',
                    'type'  =>  'text',
                    'size'  =>  64));
            ?></p>

            <?php echo $this->Form->input('group_id', array('type' => 'hidden', 'value' => '2')); ?>

                <p><?php
                    echo $this->Form->input('passwrd', array(
                        'label' =>  '',
                        'placeholder' => 'Password',
                        'class' =>  'text',
                        'type'  =>  'password',
                        'size'  =>  64));
                ?></p>

                <p><?php
                    echo $this->Form->input('email', array(
                        'label' =>  '',
                        'placeholder' => 'eMail',
                        'class' =>  'text',
                        'size'  =>  64));
                ?></p>

                <p style="margin-top: 30px;">
                <?php echo $this->Form->input('agree', array('type'=>'checkbox', 'checked' => 'false', 'label' => '&nbsp;&nbsp;Agree to the terms of service')); ?>
                </p>

            <p><?php echo $this->Form->end('Create Account'); ?></p>

            <p class="textbox4 quiet" style="margin-top: 30px; margin-bottom: 20px;">The next pages contain adult oriented material with nudity. By continuing to enter you will have released and discharged the providers, owners and creators of this site from any and all liability which might arise. You must be of legal age to enter these pages. (18 or 21 depending on where you live). And you MUST read and agree to the following conditions:<br /><br />

    I understand and affirm the following:<br /><br />

    I understand that this site contains material of a sexual nature and I want to view it. I understand that it is against the law for me to view sexual material unless I am of LEGAL AGE. It is legal for me to view material of a sexual nature in my country, state, city or community. I do NOT hold the webmaster of this web site, nor the web site host, responsible for my entering this site. I will not redistribute this material to anyone nor will I permit any minor to see this material, or any other person who might find such material personally offensive. Bookmarking a page on this server/site whereby this warning page is by-passed shall constitute an implicit acceptance of the foregoing terms herein set forth. I am aware that I am entering under my own free will and will suffer the consequences if I am not of LEGAL AGE, or if it is not legal in my community.</p>

        </fieldset>
    </div>
</div>
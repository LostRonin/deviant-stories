<?php $this->set("title_for_layout","Home | deviant-stories.com"); ?>

<h4><?php echo $html->para('introduction', 'Welcome to Deviant Stories your source for free and regularly updated erotic
                            stories about domination, kinky sex and slave training with a hard touch.', null, false); ?></h4>

<?php echo $this->element('flashmovie'); ?>

<?php
if(!$this->Session->check('Auth.User'))
{?>
    <div class="signupform" style="text-align: center;">
        <h2 class="quiet">Sign Up</h2>
        <p class="caption">It only takes about 30 seconds to <?php echo $html->link('sign up', '/signup'); ?> and it's free.</p>
    </div>
<?php } ?>


<div style="margin-top: 40px; margin-bottom: 30px;"><?php echo $html->para('maintext', 'Feel free to leave any comment through the contact form. I really would like to know
                            what you think and how I can improve my site. This is also the way to let me know about what you
                            would like to read in the future. Just send me a message about your preferred settings or
                            devices that you would like to appear in a story.', null, false); ?></div>

<h2 class="quiet">&nbsp;&nbsp;&nbsp;A word of warning</h2>

<?php echo $html->para('maintext', "This site contains stories and graphics of adult content. If you don't meet the legal
                            age of your state or country to view this kind of content please leave this website.", null, false); ?>

<?php echo $html->para('maintext', 'The stories and images within are of violent nature. Forced sex, slave training,
                            humiliation, gross sexual practices and torture are main themes of these stories. So if you
                            feel uncomfortable with this kind of content I suggest you move on and leave this website.', null, false); ?>

<?php echo $html->para('maintext', "For the readers that like their victims helpless here are the things you won't find:
                            All participants in my stories are adult&nbsp;and of legal age. Nobody is killed or severely
                            mutilated as part of a sexual service and likewise no larger permanent bodily damage is inflicted.", null, false); ?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta name="google-site-verification" content="aF4KdoL0mEaJgqbFcDMV9T635YL-9cyD03rKA5eWSBs" />
	<?php echo $this->Html->charset('utf-8'); ?>
    <?php echo $this->element('meta'); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo $title_for_layout; ?></title>

	<meta name="viewport" content="width=device-width" />
    <?php echo $this->Html->css(array('style')); ?>
    <?php echo $this->Html->script(array('libs/modernizr-2.5.2.min')); ?>
    <?php // echo $this->Html->script(array('live')); ?> <!-- Used for DEVELOPMENT ONLY -->

    <!--
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif' rel='stylesheet' type='text/css' />
-->

    <?php echo $scripts_for_layout; ?>
</head>

<body>

<!-- Start of C O N T A I N E R for blueprint.css-->
<div class="container" id="container"> <!-- showgrid is DISABLED for Grid testing (to activate include "showgrid" in container class)-->


    <!-- Start of H E A D E R -->
    <?php echo $this->element('header'); ?>
    <!-- End of H E A D E R -->


    <!-- Start of L O G I N _ B O X -->
        <?php echo $this->element('loginbox'); ?>
    <!-- End of L O G I N _ B O X -->


    <!-- Start of S I D E B A R 1 -->
    <div class="span-6 sidebar1">
        <?php echo $menu->render($session->read('Menu.main')); ?>

        <!-- Start of P A Y P A L _ B O X -->
        <?php echo $this->element('paypal'); ?>
        <!-- End of P A Y P A L _ B O X -->

        <!-- Start of T A G s -->
        <div class="tag_box tags_border">
            <h5 class="quiet">Tags</h5>
            <?php echo $this->element('tag_cloud'); ?>
        </div>
        <!-- End of T A G s -->
    </div>
    <!-- End of S I D E B A R 1 -->


    <!-- Start of M A I N C O N T E N T -->
    <div class="span-12 mainContent append-bottom">
        <?php echo $this->element('maincontent'); ?>
    </div>
    <!-- End of M A I N C O N T E N T -->


    <!-- Start of S I D E B A R 2 -->
    <div class="span-6 last sidebar2">
        <?php echo $content_for_layout; ?>
    </div>


    <!-- Start #Box 01 - Gallery left -->
    <div class="span-8">
        <p class="main_boxes"><?php echo $html->link($html->image("box_gallery.png",
                                                    array('alt' => 'box gallery image', 'width' => '200', 'height' => '200')),
                                                    array('controller' => 'images', 'action' => 'gallery'),
                                                    array('escape' => false)); ?></p>
    </div>
    <!-- end #Box 01 -->

    <!-- Start #Box 02 - Soon to come -->
    <div class="span-8">
        <p class="main_boxes"><?php echo $html->link($html->image("box_soon.png",
                                                    array('alt' => 'coming soon image', 'width' => '200', 'height' => '200')),
                                                    array('controller' => 'updates', 'action' => 'dashboard'),
                                                    // when ready: array('controller' => 'pages', 'action' => 'soon'),
                                                    array('escape' => false)); ?></p>
    </div>
    <!-- end #Box 02 -->

    <!-- Start #Box 03 - Stories right -->
    <div class="span-8 last">
        <p class="main_boxes"><?php echo $html->link($html->image("box_stories.png",
                                                    array('alt' => 'box stories image', 'width' => '200', 'height' => '200')),
                                                    array('controller' => 'stories', 'action' => 'storyoverview'),
                                                    array('escape' => false)); ?></p>
    </div>
    <!-- end #Box 03 -->


    <!-- Start of F O O T E R -->
    <?php echo $this->element('footer'); ?>
    <!-- End of F O O T E R -->

</div> <!--! end of #container -->



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<?php //echo $this->Html->script(array('hashgrid')); ?> <!-- FOR TESTING ONLY -->

<?php echo $this->element('site-scripts'); ?>
<?php echo $this->element('google-analytics'); ?>

<?php //echo $this->element('sql_dump'); ?> <!-- FOR TESTING ONLY -->

</body>
</html>
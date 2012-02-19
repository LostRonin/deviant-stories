<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
    
    <?php echo $this->element('meta'); ?>
    <?php echo $this->Html->css(array('cake.generic', 'cakephp_tag_cloud')); ?>
</head>

<body class="thrColFixHdr">


<div id="container">                           <!-- Start of C O N T A I N E R -->
	
	<div id="header">                          <!-- Start of H E A D E R -->
		<h1>Deviant Stories - Admin Panel</h1>
	</div>                                     <!-- End of H E A D E R -->

	
 	<div id="content_wrapper">                 <!-- Start of C O N T E N T _ W R A P P E R -->
	
        <div id="mainContent">   
                <?php echo $content_for_layout; ?>
                <br class="clearfloat" />
        </div>                                      <!-- Start of M A I N C O N T E N T -->	
                                                <!-- End of M A I N C O N T E N T -->
	<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

	</div>                                     <!-- End of C O N T E T _ W R A P P E R -->

	                                          <!-- Start of F O O T E R -->
    <?php echo $this->element('footer'); ?>
	                                        <!-- End of F O O T E R -->

</div>                                         <!-- End of C O N T A I N E R -->

</body>
</html>
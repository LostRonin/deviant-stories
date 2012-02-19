<script type="text/javascript">
    jQuery(document).ready(function($){$('.lightbox').lightbox();});

     $(document).ready(function(){
         // horizontal tabs
         $('div#st_horizontal').slideTabs({
             // Your options here
             slideLength: 600,
             contentAnim: 'slideH',
             contentEasing: '',
             tabsAnimTime: 300,
             contentAnimTime: 600,
             autoHeight: true
         });
     });

    $(document).ready(function(){
		$('#fancyGallery').fancygallery({thumbWidth: 170, thumbHeight: 170, titleHeight: 0, boxOptions: {deeplinking: false, overlay_gallery: false}});
    });

</script>
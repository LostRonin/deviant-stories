<script type="text/javascript">
$(function(){
    $.gritter.add({
        title: "Error",
        text: "<?php echo $message;?>",
        image: "<?php echo Dispatcher::baseUrl();?>/img/error.png" // See IE7 note below
        //sticky: true
    });
});
</script>
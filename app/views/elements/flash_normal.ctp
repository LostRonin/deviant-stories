<script type="text/javascript">
$(function(){
    $.gritter.add({
        title: "Info",
        text: "<?php echo $message;?>",
        image: "<?php echo Dispatcher::baseUrl();?>/img/ok.png" // See IE7 note below
        //sticky: true
    });
});
</script>
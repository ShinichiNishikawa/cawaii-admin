<script type="text/javascript">
jQuery('document').ready(function(){
    jQuery('.media-upload').each(function(){
        var rel = jQuery(this).attr("rel");
        jQuery(this).click(function(){
            window.send_to_editor = function(html) {
                imgurl = jQuery('img', html).attr('src');
                jQuery('#'+rel).val(imgurl);
                tb_remove();
            }
            formfield = jQuery('#'+rel).attr('name');
            tb_show(null, 'media-upload.php?post_id=0&type=image&TB_iframe=true');
            return false;
        });
    });
});
</script>
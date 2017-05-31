$(document).ready(function(){
    $(document).foundation();
    // JQUERY UI tabs
    $(function() {
        $("#tabs").tabs();
    });
    // CKEDITOR
    CKEDITOR.replace( 'editor1' );
    // CLIPBOARD
    $('.clip').click(function(){
        // remove and add id for clip-btn
        $('.clip').removeAttr('id', 'clip-btn');
        $(this).attr('id', 'clip-btn');
        const clipBtn = document.getElementById('clip-btn');
        const clipboard = new Clipboard(clipBtn);
        // clipboard is successful
        clipboard.on('success', function(e) {
            $('#clip-btn').css('background', 'green');
            $('#clip-btn').html('URL copied');
            e.clearSelection();
        });
        // clipboard is unsuccessful
        clipboard.on('error', function(e) {
            $('#clip-btn').css('background', 'red');
            $('#clip-btn').html('URL was not copied');
        });
    });
    
})

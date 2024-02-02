// create slug from a input field in jquery

$(document).ready(function(){
    $("#input_title").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        // remove - from start and end of text
        Text = Text.replace(/^-+|-+$/g, '');
        
        $("#slug").val(Text);
    });
});
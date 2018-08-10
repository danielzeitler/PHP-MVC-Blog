
// Wait for document loaded (in jQuery)
$(document).ready(function() {

    // TinyMCE init
    tinymce.init({
        // Disable script-tags
        invalid_elements : "script",

        // Enable tinyMCE on id: post_text
        selector: '#post_text'
    });

});




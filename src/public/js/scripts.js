
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


function readUrl(input) {
    if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.addEventListener('load', () => {
        let imgName = input.files[0].name;
        document.querySelector('.text-upload').classList.add("text-success");
        input.setAttribute("data-title", imgName);
      });

      reader.readAsDataURL(input.files[0]);
    }  
}


$(document).ready(function() { // Wait for the document to be fully loaded before executing the code

    // When a file is selected in the file input field:
    $('#file').change(function() {
      if (this.files.length > 0) { // If a file is selected
        $('#upload-button').prop('disabled', false).css('opacity', 1); // Enable the upload button and make it fully visible
      } else {
        $('#upload-button').prop('disabled', true).css('opacity', 0.5); // Disable the upload button and make it semi-transparent
      }
    });
  
    // When the upload form is submitted:
    $('#upload-form').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission behavior (page reload)
  
      var formData = new FormData(this); // Create a FormData object to handle file data
  
      // Send an AJAX request to upload_ajax.php:
      $.ajax({
        type: 'POST',  // Set the request method to POST
        url: 'upload_ajax.php',  // Specify the URL of the server-side script
        data: formData,  // Send the form data, including the selected file
        cache: false,   // Prevent caching of the request
        contentType: false,  // Let browser handle content type correctly for FormData
        processData: false,  // Prevent jQuery from processing the data
        success: function(response) {  // If the upload is successful
          $('#status').html(response);  // Display the response message in the #status element
        },
        error: function() {  // If there's an error
          $('#status').html('Terjadi kesalahan saat mengunggah file.');  // Display an error message
        }
      });
    });
  });
  
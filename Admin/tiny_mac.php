<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyMCE API Integration Example</title>
    <script src="https://cdn.tiny.cloud/1/<your-api-key>/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'apiIntegration',
            toolbar: 'apiIntegrationButton',
            setup: function (editor) {
                editor.ui.registry.addButton('apiIntegrationButton', {
                    text: 'Call API',
                    onAction: function () {
                        // Get content from the editor
                        var content = editor.getContent();

                        // Send AJAX request to PHP script
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'api_integration.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    // Update the editor with the API response
                                    editor.setContent(xhr.responseText);
                                } else {
                                    console.error('Error:', xhr.statusText);
                                }
                            }
                        };
                        xhr.send(JSON.stringify({ content: content }));
                    }
                });
            }
        });
    </script>
</head>
<body>
    <h1>My TinyMCE Editor</h1>
    <textarea id="myTextarea"></textarea>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Unggah File Dokumen</title>
</head>
<body>
<form id="upload-form" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple="multiple" accept="image/*">
    <input type="submit" value="Upload">
</form>
<div id="status"></div>

</body>
</html>

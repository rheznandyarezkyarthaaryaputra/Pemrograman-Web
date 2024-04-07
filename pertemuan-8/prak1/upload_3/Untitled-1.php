<!DOCTYPE html>
<html>
<head>
  <title>File Upload</title>
</head>
<body>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Choose a file to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
  </form>
  <?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
  <?php endif; ?>
  <?php if (isset($_GET['success'])): ?>
    <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
  <?php endif; ?>
</body>
</html>
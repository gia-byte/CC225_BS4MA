<?php
$connection = new mysqli("localhost", "root", "", "library");
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

$title = $author = $year = $genre = "";
$errorMessage = $successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST["title"];
  $author = $_POST["author"];
  $year = $_POST["year"];
  $genre = $_POST["genre"];

  if (empty($title) || empty($author) || empty($year) || empty($genre)) {
    $errorMessage = "All fields are required.";
  } else {
    $stmt = $connection->prepare("INSERT INTO books (title, author, year, genre) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $title, $author, $year, $genre);
    if ($stmt->execute()) {
      header("Location: index.php");
      exit;
    } else {
      $errorMessage = "Database error: " . $stmt->error;
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Book</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
    <h2>Add New Book</h2>

    <?php if ($errorMessage): ?>
      <div class="alert alert-warning"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
      </div>
      <div class="mb-3">
        <label>Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo $author; ?>">
      </div>
      <div class="mb-3">
        <label>Year</label>
        <input type="number" class="form-control" name="year" value="<?php echo $year; ?>">
      </div>
      <div class="mb-3">
        <label>Genre</label>
        <input type="text" class="form-control" name="genre" value="<?php echo $genre; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Library Catalog</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
    <h2>List of Books</h2>
    <a class="btn btn-primary mb-3" href="create.php" role="button">New Book</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Year</th>
          <th>Genre</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $connection = new mysqli("localhost", "root", "", "library");

        if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM books";
        $result = $connection->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <td>{$row['id']}</td>
              <td>{$row['title']}</td>
              <td>{$row['author']}</td>
              <td>{$row['year']}</td>
              <td>{$row['genre']}</td>
              <td>
                <a class='btn btn-primary btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>
              </td>
            </tr>
          ";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

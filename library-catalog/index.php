<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
    body {
      background-color:rgb(247, 247, 247);
    }

     .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }

  </style>

</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">CLICK LIBRARY</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Bookshelf</a></li>
        <li><a href="#">Browse</a></li>
        <li><a href="#">Community</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  

    <div class="col-sm-8 text-left"> 
      <h1>Welcome!</h1>
      <p>Click Library is a browser-based digital library database management system designed to streamline and modernize the way libraries manage, store, and retrieve book information. Developed using HTML, CSS, and JavaScript for the front end, and PHP with MySQL for the back end, this system provides a user-friendly and efficient interface for managing library records.

The platform allows authorized personnel to perform CRUD (Create, Read, Update, Delete) operations on book entries, making catalog management seamless and organized. Students or users can access the catalog in read-only mode, allowing them to search and browse through available titles without altering any data. The system ensures data consistency, security, and ease of access, making library resources more accessible in academic or institutional settings.</p>  
      <h3>Purpose and Impact</h3>
      <p>Click Library aims to reduce the reliance on manual record-keeping and physical catalogs by providing a convenient and digitized solution for library data management. It enhances the accessibility of book information for both library staff and students, fostering a more organized, efficient, and technology-driven learning environment.</p>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>
          <img src = "library new.jpg"> </img>
        </p>
      </div>
      <div class="well">
 
      </div>
    </div>
  </div>
</div>












  <div class="container my-5">
    <h2 style="color: black;">List of Books</h2>
    <a class="btn btn-secondary mb-3" href="create.php" role="button">New Book</a>

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

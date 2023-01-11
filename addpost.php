<?php
  require('config/db.php');

  if(isset($_POST['submit'])) {
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $query = "INSERT INTO posts (title, author, body) VALUES ('$title', '$author', '$body')";

    if(mysqli_query($conn, $query)) {
      header("Location: index.php");
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
?>

<?php include('inc/header.php'); ?>
    <h1 class="mt-4">Add Post</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group mt-3">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title" placeholder="Enter title here" required>
      </div>
      <div class="form-group mt-3">
        <label for="author">Author</label>
        <input class="form-control" type="text" name="author" id="author" placeholder="Enter author here" required>
      </div>
      <div class="form-group mt-3">
        <label for="body">Body</label>
        <textarea class="form-control" type="text" name="body" id="body" placeholder="Enter post body here" required></textarea>
      </div>

      <input class="btn btn-primary mt-4" type="submit" value="Submit" name="submit">
    </form>
 <?php include('inc/footer.php'); ?>
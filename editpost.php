<?php
  require('config/db.php');

  if(isset($_POST['update'])) {
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $query = "UPDATE posts
              SET title='$title',
              author='$author',
              body='$body'
              WHERE id=$id
    ";

    if(mysqli_query($conn, $query)) {
      header("Location: index.php");
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }

  $id = $_GET['id'];

  $query = "SELECT * FROM posts WHERE ID = $id";

  $result = mysqli_query($conn, $query);

  $post = mysqli_fetch_assoc($result);

  mysqli_free_result($result);

  mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
    <h1 class="mt-4">Edit Post</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group mt-3">
        <label for="title">Title</label>
        <input class="form-control" type="text" value="<?php echo $post['title']; ?>" name="title" id="title" placeholder="Enter title here" required>
      </div>
      <div class="form-group mt-3">
        <label for="author">Author</label>
        <input class="form-control" type="text" value="<?php echo $post['author']; ?>"  name="author" id="author" placeholder="Enter author here" required>
      </div>
      <div class="form-group mt-3">
        <label for="body">Body</label>
        <textarea class="form-control" type="text" name="body" id="body" placeholder="Enter post body here" required><?php echo $post['body']; ?></textarea>
      </div>

      <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
      <input class="btn btn-primary mt-4" type="submit" value="Update" name="update">
    </form>
 <?php include('inc/footer.php'); ?>
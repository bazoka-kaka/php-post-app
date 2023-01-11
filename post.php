<?php
  require('config/db.php');

  $id = $_GET['id'];

  $query = "SELECT * FROM posts WHERE ID = $id";

  $result = mysqli_query($conn, $query);

  $post = mysqli_fetch_assoc($result);

  mysqli_free_result($result);

  mysqli_close($conn);
?>

<?php include("inc/header.php"); ?>
    <h1 class="mt-4">Post</h1>
    <div class="card mt-4">
      <div class="card-body">
        <h4><?php echo $post['title']; ?></h4>
        <small>Post created at <?php echo $post['created_at'] ?> by <?php echo $post['author']; ?></small>
        <p><?php echo $post['body']; ?></p>
        <div>
          <a class="btn btn-primary" href="editpost.php?id=<?php echo $post['id']; ?>">Edit Post</a>
          <a class="btn btn-danger" href="deletepost.php?id=<?php echo $post['id']; ?>">Delete Post</a>
        </div>
      </div>
    </div>
    <a class="btn btn-dark mt-2" href="index.php">Back</a>
<?php include("inc/footer.php"); ?>
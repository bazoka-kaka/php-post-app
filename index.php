<?php
  require('config/db.php');

  $query = "SELECT * FROM posts ORDER BY created_at DESC";

  $result = mysqli_query($conn, $query);

  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
    <h1 class="mt-4">Posts</h1>
    <?php foreach($posts as $post): ?>
    <div class="card mt-4">
      <div class="card-body">
        <h4><?php echo $post['title']; ?></h4>
        <small>Post created at <?php echo $post['created_at'] ?> by <?php echo $post['author']; ?></small>
        <p><?php echo $post['body']; ?></p>
        <a class="btn btn-primary" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
      </div>
    </div>
    <?php endforeach; ?>
<?php include('inc/footer.php'); ?>
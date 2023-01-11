<?php
  require('config/db.php');

  $query = "SELECT * FROM posts";

  $result = mysqli_query($conn, $query);

  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Post</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
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
  </div>
</body>
</html>
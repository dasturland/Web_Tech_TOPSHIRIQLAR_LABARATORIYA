<?php
require_once __DIR__ . '/db.php';
$db = get_db();
// Create post or comment
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['post_title'])){
        $stmt = $db->prepare('INSERT INTO posts (title,body) VALUES (?,?)');
        $stmt->execute([$_POST['post_title'], $_POST['post_body']]);
    } elseif (isset($_POST['comment_post_id'])){
        $stmt = $db->prepare('INSERT INTO comments (post_id,author,body) VALUES (?,?,?)');
        $stmt->execute([$_POST['comment_post_id'], $_POST['author'], $_POST['comment_body']]);
    }
    header('Location: posts.php'); exit;
}
$posts = $db->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html><body>
<h2>Posts & Comments</h2>
<form method="post">
    <input name="post_title" placeholder="Title"><br>
    <textarea name="post_body" placeholder="Body"></textarea><br>
    <button>Create post</button>
</form>
<hr>
<?php foreach ($posts as $post): ?>
    <h3><?php echo htmlspecialchars($post['title']); ?></h3>
    <p><?php echo nl2br(htmlspecialchars($post['body'])); ?></p>
    <h4>Comments</h4>
    <?php $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ?'); $comments->execute([$post['id']]); $coms = $comments->fetchAll(PDO::FETCH_ASSOC); ?>
    <ul>
    <?php foreach ($coms as $c): ?>
        <li><strong><?php echo htmlspecialchars($c['author']); ?>:</strong> <?php echo htmlspecialchars($c['body']); ?></li>
    <?php endforeach; ?>
    </ul>
    <form method="post">
        <input type="hidden" name="comment_post_id" value="<?php echo $post['id']; ?>">
        <input name="author" placeholder="Your name"><br>
        <input name="comment_body" placeholder="Comment"><br>
        <button>Add comment</button>
    </form>
    <hr>
<?php endforeach; ?>
</body></html>
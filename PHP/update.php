
<?php
$conn = mysqli_connect('localhost', 'kihun0422', 'wnsldjdlqslek', 'kihun0422');

$sql = 'SELECT * FROM topic';
$result = mysqli_query($conn, $sql);
$list = '';

while ($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list .= "<li><a
href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = [
'title' => 'Welcome',
'description' => 'Hello, web'];

$update_link = '';
if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);

    $update_link = '<a 
href="update.php?id='.$_GET['id'].'">update</a>';
}
?>

<html>
<head>
<meta charset="utf-8">
<title>WEB</title>
</head>
<body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
                <?php echo $list; ?>
        </ol>
                <form action="process_update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <p><input name="title" placeholder="title" 
                value="<?php echo $article['title']; ?>"></p>
                <p><textarea name="description" 
                placeholder="description"><?php echo $article['description']; ?></textarea></p>
                <p><input type="submit"></p>
        </form>
</body>
</html>

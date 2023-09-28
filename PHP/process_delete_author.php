<?php

$conn = mysqli_connect('localhost', 'kihun0422', 'wnsldjdlqslek', 'kihun0422');

settype($_POST['id'], 'integer');
$filtered = [
'id' => mysqli_real_escape_string($conn, $_POST['id']),
];

$sql = "
DELETE FROM topic
WHERE author_id = {$filtered['id']}
";
mysqli_query($conn, $sql);

$sql = "
DELETE FROM author
WHERE id = {$filtered['id']}
";
mysqli_query($conn, $sql);

$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo '삭제하는 과정에서 문제가 생겼습니다.';
    error_log(mysqli_error($conn));
} else {
    header('Location: author.php');
}

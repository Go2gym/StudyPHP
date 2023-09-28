<?php
$conn = mysqli_connect('localhost', 'kihun0422', 'wnsldjdlqslek', 'kihun0422');

$sql = "
INSERT INTO topic
(title, description, created)
VALUE('MySQL', 'MySQL is..', NOW())";
$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo mysqli_error($conn);
}
?>


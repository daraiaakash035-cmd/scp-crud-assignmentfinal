<?php
include "includes/db.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "DELETE FROM scp_subjects WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?msg=Record deleted successfully");
    exit();
} else {
    header("Location: index.php?msg=Error deleting record");
    exit();
}
?>
<?php include "includes/db.php"; ?>

<?php
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM scp_subjects WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: index.php?msg=Record not found");
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View SCP Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>View SCP Record</h1>
</header>

<nav>
    <a href="index.php">View Records</a>
    <a href="create.php">Add New SCP</a>
</nav>

<div class="container">

    <div class="card">
        <h2><?php echo htmlspecialchars($row['item_number']); ?> - <?php echo htmlspecialchars($row['title']); ?></h2>

        <p><strong>Object Class:</strong> <?php echo htmlspecialchars($row['object_class']); ?></p>

        <h3>Special Containment Procedures</h3>
        <p><?php echo nl2br(htmlspecialchars($row['containment'])); ?></p>

        <h3>Description</h3>
        <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>

        <a class="btn edit" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a class="btn delete" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
        <a class="btn back" href="index.php">Back</a>
    </div>

</div>

<footer>
    <p>COMP.5210 Web Application Implementation</p>
</footer>

</body>
</html>
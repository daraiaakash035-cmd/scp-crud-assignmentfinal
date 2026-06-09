<?php include "includes/db.php"; ?>

<?php
$error = "";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM scp_subjects WHERE id = $id");

if (mysqli_num_rows($result) == 0) {
    header("Location: index.php?msg=Record not found");
    exit();
}

$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $item_number = mysqli_real_escape_string($conn, $_POST['item_number']);
    $object_class = mysqli_real_escape_string($conn, $_POST['object_class']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $containment = mysqli_real_escape_string($conn, $_POST['containment']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    if ($item_number == "" || $object_class == "" || $title == "" || $containment == "" || $description == "") {
        $error = "All fields are required.";
    } else {
        $sql = "UPDATE scp_subjects SET
                item_number = '$item_number',
                object_class = '$object_class',
                title = '$title',
                containment = '$containment',
                description = '$description'
                WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?msg=Record updated successfully");
            exit();
        } else {
            $error = "Error updating record.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit SCP Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Edit SCP Record</h1>
</header>

<nav>
    <a href="index.php">View Records</a>
    <a href="create.php">Add New SCP</a>
</nav>

<div class="container">

    <?php if ($error != "") { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST" class="card">

        <label>Item Number</label>
        <input type="text" name="item_number" value="<?php echo htmlspecialchars($row['item_number']); ?>" required>

        <label>Object Class</label>
        <select name="object_class" required>
            <option value="Safe" <?php if ($row['object_class'] == "Safe") echo "selected"; ?>>Safe</option>
            <option value="Euclid" <?php if ($row['object_class'] == "Euclid") echo "selected"; ?>>Euclid</option>
            <option value="Keter" <?php if ($row['object_class'] == "Keter") echo "selected"; ?>>Keter</option>
            <option value="Thaumiel" <?php if ($row['object_class'] == "Thaumiel") echo "selected"; ?>>Thaumiel</option>
        </select>

        <label>Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>

        <label>Special Containment Procedures</label>
        <textarea name="containment" required><?php echo htmlspecialchars($row['containment']); ?></textarea>

        <label>Description</label>
        <textarea name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>

        <button type="submit" name="update" class="btn save">Update Record</button>
        <a href="index.php" class="btn back">Back</a>

    </form>

</div>

<footer>
    <p>COMP.5210 Web Application Implementation</p>
</footer>

</body>
</html>
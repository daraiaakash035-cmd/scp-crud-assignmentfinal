<?php include "includes/db.php"; ?>

<?php
$error = "";

if (isset($_POST['save'])) {
    $item_number = mysqli_real_escape_string($conn, $_POST['item_number']);
    $object_class = mysqli_real_escape_string($conn, $_POST['object_class']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $containment = mysqli_real_escape_string($conn, $_POST['containment']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    if ($item_number == "" || $object_class == "" || $title == "" || $containment == "" || $description == "") {
        $error = "All fields are required.";
    } else {
        $sql = "INSERT INTO scp_subjects 
        (item_number, object_class, title, containment, description)
        VALUES 
        ('$item_number', '$object_class', '$title', '$containment', '$description')";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?msg=Record created successfully");
            exit();
        } else {
            $error = "Error creating record.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create SCP Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Add New SCP Record</h1>
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
        <input type="text" name="item_number" placeholder="Example: SCP-173" required>

        <label>Object Class</label>
        <select name="object_class" required>
            <option value="">Select Object Class</option>
            <option value="Safe">Safe</option>
            <option value="Euclid">Euclid</option>
            <option value="Keter">Keter</option>
            <option value="Thaumiel">Thaumiel</option>
        </select>

        <label>Title</label>
        <input type="text" name="title" placeholder="Enter SCP title" required>

        <label>Special Containment Procedures</label>
        <textarea name="containment" placeholder="Enter containment procedures" required></textarea>

        <label>Description</label>
        <textarea name="description" placeholder="Enter SCP description" required></textarea>

        <button type="submit" name="save" class="btn save">Save Record</button>
        <a href="index.php" class="btn back">Back</a>

    </form>

</div>

<footer>
    <p>COMP.5210 Web Application Implementation</p>
</footer>

</body>
</html>
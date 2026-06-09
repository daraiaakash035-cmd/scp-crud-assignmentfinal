<?php include "includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP Foundation Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="hero">
    <h1>SCP Foundation Database</h1>
    <p>Secure database-driven CRUD web application</p>
</header>

<nav class="navbar">
    <a href="index.php">Home</a>
    <a href="create.php">Add SCP Record</a>
</nav>

<main class="container">

    <?php if (isset($_GET['msg'])) { ?>
        <div class="message">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php } ?>

    <section class="title-section">
        <h2>SCP Subject Records</h2>
        <p>View, create, update and delete SCP subject entries.</p>
    </section>

    <section class="grid">

        <?php
        $sql = "SELECT * FROM scp_subjects ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="card">
            <div class="card-header">
                <h3><?php echo htmlspecialchars($row['item_number']); ?></h3>
                <span><?php echo htmlspecialchars($row['object_class']); ?></span>
            </div>

            <h4><?php echo htmlspecialchars($row['title']); ?></h4>

            <p>
                <?php echo htmlspecialchars(substr($row['description'], 0, 130)); ?>...
            </p>

            <div class="button-group">
                <a class="btn view" href="view.php?id=<?php echo $row['id']; ?>">View</a>
                <a class="btn edit" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn delete" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
            </div>
        </div>

        <?php } ?>

    </section>

</main>

<footer>
    <p>COMP.5210 Web Application Implementation | SCP CRUD Application</p>
</footer>

</body>
</html>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประเภทเกม</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header">
    <div class="header-inner">
        <h2>Game Shop</h2>
        <div class="nav-links">
            <a href="index.php" class="active">Home</a>
            <a href="add_game.php">Add</a>
            <a href="game_type.php">Type</a>
            <a href="manage_game.php">Manage</a>
        </div>
        </div>
    </div>

    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        include 'action/connect.php';

        $sql = "SELECT * FROM game_types";
        $result = mysqli_query($con, $sql);
    ?>

    <table>
        <thead>
            <tr>
                <th>รหัสประเภท</th>
                <th>ชื่อประเภทเกม</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($result as $type) { ?>
                <tr>
                    <td><?= $type["type_id"] ?></td>
                    <td><?= $type["type_name"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
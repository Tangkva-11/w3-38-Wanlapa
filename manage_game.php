<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลเกม - Game Shop</title>
    <!-- เชื่อมโยง CSS แยก -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        include 'action/connect.php';

        $sql = "SELECT * FROM games";
        $result = mysqli_query($con, $sql);
    ?>

    <!-- Header / Navbar แนวนอน -->
    <div class="header">
        <div class="header-inner">
            <h2>Game Shop</h2>
            <div class="nav-links">
                <a href="index.php" >Home</a>
                <a href="add_game.php">Add</a>
                <a href="game_type.php">Type</a>
                <a href="manage_game.php" class="active">Manage</a>
            </div>
        </div>
    </div>

    <!-- การ์ดตารางข้อมูลหลัก -->
    <div class="container">
        <h1>จัดการข้อมูลเกม 🎮</h1>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th style="width: 10%;">รหัสเกม</th>
                        <th style="width: 25%;">ชื่อเกม</th>
                        <th style="width: 15%;">ราคา</th>
                        <th style="width: 25%;">ภาพปก</th>
                        <th style="width: 12%;">ประเภท</th>
                        <th style="width: 13%; text-align: center;">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $game): ?>
                        <tr>
                            <td><span class="badge"><?= htmlspecialchars($game["game_id"]) ?></span></td>
                            <td><strong><?= htmlspecialchars($game["game_name"]) ?></strong></td>
                            <td class="price-text">฿<?= number_format($game["game_price"], 2) ?></td>
                            <td> 
                                <img src="<?= htmlspecialchars($game["game_cover"]) ?>" 
                                     alt="<?= htmlspecialchars($game["game_name"]) ?>" 
                                     class="cover-img">
                            </td>
                            <td><span class="badge badge-type"><?= htmlspecialchars($game["type_id"]) ?></span></td>
                            <td>
                                <div class="action-group">
                                    <a href="edit_game.php?id=<?= htmlspecialchars($game['game_id']) ?>" class="btn-edit">แก้ไข</a>
                                    <a href="action/delete_game.php?id=<?= htmlspecialchars($game['game_id']) ?>" 
                                       class="btn-delete" 
                                       onclick="return confirm('คุณต้องการลบเกม <?= htmlspecialchars($game['game_name']) ?> ใช่หรือไม่?');">ลบ</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2026 Game Shop ✨ | จัดทำโดย นักศึกษาวิทยาลัยอาชีวศึกษา</p>
        <div class="footer-links">
            <a href="#">ติดต่อ</a>
        </div>
    </footer>

</body>
</html>
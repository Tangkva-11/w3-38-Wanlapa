<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลเกม - Game Shop</title>
    <!-- เชื่อมโยง CSS แยก -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        include 'action/connect.php';

        // ดึงข้อมูลเกมตาม id
        $sql = "SELECT * FROM games WHERE game_id = '$id'";
        $result = mysqli_query($con, $sql);
        $game = mysqli_fetch_assoc($result);
    ?>

    <!-- Header / Navbar แนวนอน -->
    <div class="header">
        <div class="header-inner">
            <h2>Game Shop</h2>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="add_game.php">Add</a>
                <a href="game_type.php">Type</a>
                <a href="edit_game.php" class="active">Edit1</a>
                <a href="manage_game.php">Edit2</a>
            </div>
        </div>
    </div>

    <!-- การ์ดเนื้อหาหลัก -->
    <div class="container">
        <h1>แก้ไขข้อมูลเกม ✏️</h1>

        <?php if($game): ?>
        <form action="action/update_game.php" method="post" class="form-grid">
            
            <div class="form-group">
                <label for="game_id">รหัสเกม (แก้ไขไม่ได้)</label>
                <input type="text" id="game_id" name="game_id" value="<?= htmlspecialchars($game['game_id']) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="game_name">ชื่อเกม</label>
                <input type="text" id="game_name" name="game_name" value="<?= htmlspecialchars($game['game_name']) ?>" required>
            </div>

            <div class="form-group">
                <label for="game_price">ราคา (บาท)</label>
                <input type="number" step="0.01" id="game_price" name="game_price" value="<?= htmlspecialchars($game['game_price']) ?>" required>
            </div>

            <div class="form-group">
                <label for="game_cover">ลิงก์ภาพปก (URL)</label>
                <input type="text" id="game_cover" name="game_cover" value="<?= htmlspecialchars($game['game_cover']) ?>" required>
            </div>

            <?php
                // ดึงประเภทเกมทั้งหมด
                $sql_types = "SELECT * FROM game_types";
                $result_types = mysqli_query($con, $sql_types);
            ?>

            <div class="form-group">
                <label for="type_id">ประเภทเกม</label>
                <select name="type_id" id="type_id" required>
                    <?php foreach($result_types as $type): ?>
                        <option 
                            value="<?= htmlspecialchars($type["type_id"]) ?>" 
                            <?= $type["type_id"] == $game["type_id"] ? "selected" : "" ?>>
                            <?= htmlspecialchars($type["type_name"]) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">อัปเดตข้อมูล</button>
                <a href="index.php" class="btn-cancel">ยกเลิก</a>
            </div>

        </form>
        <?php else: ?>
            <p class="empty-msg">ไม่พบข้อมูลเกมที่ต้องการแก้ไข</p>
            <div class="form-actions-center">
                <a href="index.php" class="btn-cancel">กลับหน้าหลัก</a>
            </div>
        <?php endif; ?>
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
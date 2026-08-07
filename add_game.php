<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลเกม - Game Shop</title>
    <!-- เชื่อมโยงไฟล์ CSS หลัก -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Header / Navbar แนวนอน -->
    <div class="header">
        <div class="header-inner">
            <h2>Game Shop</h2>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="add_game.php" class="active">Add</a>
                <a href="game_type.php">Type</a>
                <a href="edit_game.php">Edit1</a>
                <a href="manage_game.php">Edit2</a>
            </div>
        </div>
    </div>

    <!-- การ์ดฟอร์มสำหรับเพิ่มข้อมูล -->
    <div class="container">
        <h1>เพิ่มข้อมูลเกมใหม่ ✨</h1>

        <form action="action/insert_game.php" method="post" class="form-grid">
            
            <div class="form-group">
                <label for="game_id">รหัสเกม</label>
                <input type="text" id="game_id" name="game_id" placeholder="เช่น G001" required>
            </div>

            <div class="form-group">
                <label for="game_name">ชื่อเกม</label>
                <input type="text" id="game_name" name="game_name" placeholder="ระบุชื่อเกม" required>
            </div>

            <div class="form-group">
                <label for="game_price">ราคา (บาท)</label>
                <input type="number" step="0.01" id="game_price" name="game_price" placeholder="0.00" required>
            </div>

            <div class="form-group">
                <label for="game_cover">ลิงก์ภาพปก (URL)</label>
                <input type="text" id="game_cover" name="game_cover" placeholder="https://example.com/cover.jpg" required>
            </div>

            <?php
                include 'action/connect.php';

                $sql = "SELECT * FROM game_types";
                $result = mysqli_query($con, $sql);
            ?>

            <div class="form-group">
                <label for="type_id">ประเภทเกม</label>
                <select name="type_id" id="type_id" required>
                    <option value="" disabled selected>-- เลือกประเภทเกม --</option>
                    <?php foreach($result as $type): ?>
                        <option value="<?= htmlspecialchars($type["type_id"]) ?>">
                            <?= htmlspecialchars($type["type_name"]) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">บันทึกข้อมูล</button>
                <a href="index.php" class="btn-cancel">ยกเลิก</a>
            </div>

        </form>
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
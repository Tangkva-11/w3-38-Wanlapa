<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตารางข้อมูลเกม</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <h1>✨ ตารางข้อมูลเกม ✨</h1>

        <a href="game_type.php">🔮 ดูตารางประเภทเกม</a>
    <?php
            //แสดง error

        // Report all PHP errors
        error_reporting(E_ALL);

        // Force errors to be displayed on the screen
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        include 'action/connect.php';

        // $con = false
        // !$con = true
    
        // if(!$con){
        //     echo 'Can Not Connect DB.';
        // }
        // else{
        //     echo 'Connect Success.';
        // }

        // เลือกทั้งหมด จาก ตาราง games
        $sql = "SELECT * FROM games";

        $result = mysqli_query($con, $sql);
        // var_dump($sql);
    ?>

    <table border=1>
        <thead>
            <th>รหัสเกม</th>
            <th>ชื่อเกม</th>
            <th>ราคา</th>
            <th>ภาพปก</th>
            <th>ประเภท</th>
        </thead>

        <?php
            foreach($result as $game){
                
                ?>
                    <tr>
                        <td> <?= $game["game_id"]?> </td>
                        <td> <?= $game["game_name"]?> </td>
                        <td> <?= $game["game_price"]?> </td>
                        <td> 
                            <img src= "<?= $game["game_cover"]?>"
                            style = "width:200px"
                        >
                        </td>
                        <td> <?= $game["type_id"]?> </td>
                    </tr>
                <?php
            }

        ?>
    </table>

</body>
</html>
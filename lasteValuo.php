<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>آخر قيمة تم إدخالها</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .input-box {
            background-color: #f2f2f2;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-size: 18px;
        }
        
        .output-box {
            background-color: #e6f2ff;
            padding: 15px;
            border-radius: 6px;
            margin-top: 25px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="input-box">
           : آخر قيمة تم إدخالها 
        </div>
        <div class="output-box">
            <?php
              //توصيل قاعدة البيانات
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "web";

            $conn = new mysqli($servername, $username, $password, $db);

            // تحقق من اتصال قاعدة البيانات
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // استعلام لاسترداد آخر قيمة تم إدخالها
            $sql = "SELECT * FROM control_table ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // عرض البيانات
                while($row = $result->fetch_assoc()) {
                    echo $row["button_value"];
                }
            } else {
                echo "لا توجد بيانات";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
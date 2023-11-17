<?php
include_once "./include/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        .maintext {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <h1 class="maintext">使用者資料</h1>
        <?php
        if (isset($_SESSION["msg"])) {
            echo "<div class='alert alert-warning text-center col-6 m-auto'>";
            echo $_SESSION["msg"];
            unset($_SESSION["msg"]);
            echo "</div>";
        }

        $sql = "select * from users where `acc`='{$_SESSION['user']}'";
        $user = $pdo->query($sql)->fetch();
        ?>

        <header class="nav">
            <div class="nav-item col-4"></div>
            <div class="nav-item col-4">
                <ul class="d-flex justify-content-evenly">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
            <div class="nav-item col-4">
                <?php
                if (isset($_SESSION['user'])) {
                    echo "歡迎光臨 " . $_SESSION['user'];
                    echo "<a href='logout.php' class='btn btn-info mx-2'>登出</a>";
                } else {
                    ?>
                    <a href="reg.php" class="btn btn-primary mx-2">註冊</a>
                    <a href="login_form.php" class="btn btn-success mx-2">登入</a>
                    <?php
                }
                ?>
            </div>
        </header>
        <form action="./update.php" method="post" class="col-4 m-auto">
            <div class="input-group my-1">
                <label class="col-4  input-group-text">帳號:</label>
                <input class="form-control" type="text" name="acc" id="acc" value="<?= $user['acc']; ?>">
            </div>
            <div class="input-group my-1">
                <label class="col-4  input-group-text">密碼:</label>
                <input class="form-control" type="password" name="pw" id="pw" value="<?= $user['pw']; ?>">
            </div>
            <div class="input-group my-1">
                <label class="col-4  input-group-text">姓名:</label>
                <input class="form-control" type="text" name="name" id="name" value="<?= $user['name']; ?>">
            </div>
            <div class="input-group my-1">
                <label class="col-4  input-group-text">電子郵件:</label>
                <input class="form-control" type="text" name="email" id="email" value="<?= $user['email']; ?>">
            </div>
            <div class="input-group my-1">
                <label class="col-4  input-group-text">連絡電話:</label>
                <input class="form-control" type="text" name="address" id="address" value="<?= $user['phone']; ?>">
            </div>
            <br>
            <div class="position-absolute bottom-30 start-50 translate-middle-x">
                <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                <input class="btn-primary mx-2" type="submit" value="更新">
                <input class="btn-warning mx-2" type="reset" value="重置">
                <input class="btn-warning mx-2" type="button" value="刪除"
                    onclick="location.href='del_user.php?id=<?= $user['id']; ?>'">
            </div>
            <!-- submit會觸發form表單 action後的地方 -->
            <!-- <button>在<form>裡面預設的效果等於submit -->

        </form>
    </div>
</body>

</html>
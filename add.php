<form action="http://localhost/rest/add.php" method="POST">
    <input type="text" name="name" placeholder="name"/>
    <input type="text" name="age" placeholder="age"/>
    <input type="submit" name="add"/>
</form>
<?php
if (isset($_POST["add"])) {
    $file = file_get_contents('user.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["users"] = array_values($data["users"]);
    array_push($data["users"], $_POST);
    file_put_contents("user.json", json_encode($data));
    header("Location: http://localhost/rest/index.php");
}
?>
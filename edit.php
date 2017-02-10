<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('user.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["users"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('user.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["users"];
    $jsonfile = $jsonfile[$id];

    $post["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
    $post["age"] = isset($_POST["age"]) ? $_POST["age"] : "";
 



    if ($jsonfile) {
        unset($all["users"][$id]);
        $all["users"][$id] = $post;
        $all["users"] = array_values($all["users"]);
        file_put_contents("user.json", json_encode($all));
    }
    header("Location: http://localhost/rest/index.php");
}
?>
<?php if (isset($_GET["id"])): ?>
    <form action="http://localhost/rest/edit.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <input type="text" value="<?php echo $jsonfile["name"] ?>" name="name"/>
        <input type="text" value="<?php echo $jsonfile["age"] ?>" name="age"/>
       
        <input type="submit"/>
    </form>
<?php endif; ?>
<?php
$getfile = file_get_contents('user.json');
$jsonfile = json_decode($getfile);
?>
<a href="http://localhost/rest/add.php">Add</a>
<table align="center">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th></th>
    </tr>
    <tbody>
        <?php foreach ($jsonfile->users as $index => $obj): ?>
            <tr>
                <td><?php echo $obj->name; ?></td>
                <td><?php echo $obj->age; ?></td>
                
                <td>
                    <a href="http://localhost/rest/edit.php?id=<?php echo $index; ?>">Edit</a>
                    <a href="http://localhost/rest/delete.php?id=<?php echo $index; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
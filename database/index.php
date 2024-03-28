<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['success'])):
?>
<aside>
    <p>
        <?php echo $_GET['success']; ?>
    </p>
</aside>
<?php endif; ?>
<form action="insertData.php" method="POST">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <button type="submit" value="Save">Save</button>
    </div>
</form>
</body>
</html>
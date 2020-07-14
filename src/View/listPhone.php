<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php?page=addProduct">Add Product</a>

<form method="post" action="index.php?page=search">
    <input type="text" placeholder="search" name="search">
    <button type="submit">Search</button>
    <a href="index.php">Pre</a>
</form>

<table>
    <tr>
        <td>STT</td>
        <td>NAME</td>
        <td>PRICE</td>
        <td>COLOR</td>
    </tr>
    <?php if (empty($phones)): ?>
        <tr>
            <td>No data</td>
        </tr>
    <?php else: ?>
        <?php foreach ($phones as $key => $phone): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $phone->getName() ?></td>
                <td><?php echo $phone->getPrice() ?></td>
                <td><?php echo $phone->getColor() ?></td>
                <td><a href="index.php?page=delete&id=<?php echo $phone->getId()?>">Delete</a></td>
                <td><a href="index.php?page=update&id=<?php echo $phone->getId()?>">Update</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>


</body>
</html>
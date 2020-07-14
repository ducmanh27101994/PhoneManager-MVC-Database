<?php
require __DIR__."/vendor/autoload.php";
$controller = new Module2\Controller\PhoneController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;

?>

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

<?php
switch ($page){
    case 'listPhone':
        $controller->viewProduct();
        break;
    case 'addProduct':
        $controller->addProduct();
        break;
    case 'delete':
        $controller->deleteProduct();
        break;
    case 'update':
        $controller->updateProduct();
        break;
    case 'search':
        $controller->searchProduct();
        break;
    default:
        $controller->viewProduct();
}
?>


</body>
</html>

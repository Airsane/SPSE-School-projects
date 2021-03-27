<?
include_once "Product.class.php";
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../userSystem/login.php');
}
$connection = new ProductDB;
$products = $connection->selectProducts();
$_SESSION["userProducts"] = $connection->selectUsersProducts($_SESSION["user"]);
var_dump($_SESSION["userProducts"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eshop - User - Update</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP END -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <? if (empty($_SESSION)) : ?>
            <nav class="navbar justify-content-between">
                <a class="navbar-brand">Eshop</a>
                <div class="header-navigation">
                    <a class="btn btn-light mr-sm-2" href="userSystem/register.">Register</a>
                    <a class="btn btn-light my-2 my-sm-0" href="userSystem/login.">Login</a>
                </div>
            </nav>
        <? else : ?>
            <nav class="navbar justify-content-between">
                <a href="../index.php" class="navbar-brand">Eshop</a>
                <div class="header-navigation mr-sm-2">Logged in:&nbsp<b><?= $_SESSION["user"] ?></b>
                    <div class="dropdown my-2 my-sm-0">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account management
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuLink">
                            <a class="btn dropdown-item" href="../dashboard.php">Your account </a>
                            <a class="btn dropdown-item" href="../userSystem/logout.php">Logout</a>
                            <? if ($_SESSION["user"] == "admin") echo ("<a class=\"btn dropdown-item\" href=\"../userSystem/manager.php\">Manage users</a>"); ?>
                            <? if ($_SESSION["user"] == "admin") echo ("<a class=\"btn dropdown-item\" href=\"manager.php\">Manage products</a>"); ?>
                        </div>
                    </div>
                    <div class="dropdown my-2 my-sm-0">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cart
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuLink">
                            <a class="btn dropdown-item" href="clear.php">Empty Cart</a>
                        </div>
                    </div>
                </div>
            </nav>
        <? endif; ?>
    </header>
    <div align="center">
        <div style=" border: solid 1px #006D9C; " align="left">
            <div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"></div>
            <div class="row md-auto" style="margin: 15px">
                <?
                //var_dump($_SESSION["userProducts"]);
                //var_dump($_SESSION["products"]);
                /*if (isset($_GET["action"])) {
               $_SESSION["userProducts"][$_POST["product-key"]]->productQty++;
               $connection->insertIntoCart($_POST["product-id"], $_SESSION["user"], $_SESSION["userProducts"][$_POST["product-id"]]->productQty);
               header("Location: products.php");
            }*/
                if (isset($_GET["action"])) {
                    if (isset($_SESSION["userProducts"][$_POST["product-id"]])) {
                        $_SESSION["userProducts"][$_POST["product-id"]]->productQty++;
                        $connection->insertIntoCart($_POST["product-id"], $_SESSION["user"], $_SESSION["userProducts"][$_POST["product-id"]]->productQty);
                        unset($_GET["action"]);
                        header("Refresh:0");
                    }
                } ?>
                <?
                /*if(isset($_GET["action"])){
               $connection->insertIntoCart($_POST["product-id"],$_SESSION["user"],$_SESSION["userProducts"][$_POST["product-id"]]->productQty);
            }*/
                foreach ($products as $product) : ?>
                    <div class="card md-col-6" style="width:220px;">
                        <div class="card-body">
                            <h5 class="card-title">name:</h5>
                            <p><?= $product["name"] ?></p>
                            <h5 class="card-title">description: </h5>
                            <p><?= $product["description"] ?></p>
                            <h5 class="card-title">price: </h5>
                            <p><?= $product["price"] ?></p>
                            <form method="post" action="products.php?action=addcart">
                                <button type="submit" class="btn btn-warning">Add To Cart</button>
                                <input type="hidden" name="product-id" value="<?= $product["id"] ?>">
                            </form>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>
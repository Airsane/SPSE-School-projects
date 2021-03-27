<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Text</title>
    <? require_once('./overeni.php');
    $overeni = new Overeni(); 
if($_POST)
{
    if(isset($_POST['password']) && isset($_POST['username']))
    {
        if($overeni->over($_POST['username'],$_POST['password']))
        {
            echo("Přihlášen");
        }
        else
        {
            echo("Chyba");
        }
    }
}
    
    ?>
</head>

<body>
    <?php require_once '../nav.php' ?>
    <div class="container">
        <div class="padding">
            <div class="text-center">
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputUsername">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputUsername" aria-describedby="usernameHelp"
                            placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
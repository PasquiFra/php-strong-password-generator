<?php 
session_start();
$password = $_SESSION['password'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>
        <section id=psw_gen>
            <div class="alert alert-info" role="alert">
                <Strong> La password generata è la seguente: </strong><span><?php echo $password ?></span>
            </div>
        </section>
</body>
</html>
<?php 

    require __DIR__ . '/templates/alert.php';
    require_once __DIR__ . '/utils/functions.php';

    //data
    $alerts=[];
    
    
    $length = $_GET['psw_len'] ?? '';
    $repeat = $_GET['repeat'] ?? '';
    $letters = $_GET['letters'] ?? '';
    $numbers = $_GET['numbers'] ?? '';
    $sybmols = $_GET['sybmols'] ?? '';
    
    $length_err = 'Inserisci un valore corretto';

    $allowed_numbers = str_split('0123456789');
    $allowed_letters = str_split('abcdefghijklmnopqrstuvwxyz');
    $allowed_symbols = str_split('?!&');
    
    $allowed_characters= $set_characters($allowed_numbers, $allowed_letters, $allowed_symbols);
    
    $password = $generate_psw($length, $allowed_characters);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Strong Password Generator</h1>
        <h4>Genera una password sicura</h4>
    </header>
    <main class="container-fluid">
        
        <?php  if (!isset($password)) :?>
            <section id="alert">    
                <?php  if (!isset($alerts)) :?>
                    <div class="alert alert-info" role="alert"> Inserisci dei parametri... </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert"> <?php echo $length_err ?> </div>
                <?php endif ;?>
            </section>
        <?php else :?>
        <section id=psw_gen>
            <div class="alert alert-info" role="alert">
                <Strong> La password generata è la seguente: </strong><span><?php echo $password ?></span>
            </div>
        </section>
        <?php endif ;?>
        
        <form id="params" action="index.php" method="GET" novalidate>
            <div class="d-flex">
                <label for="psw_length">Lunghezza password: </label>
                <input type="number" id="psw_length" name="psw_len" value="<?= $length ?>">
            </div>
            <div class="d-flex">
                <label>Consenti ripetizioni di uno o più caratteri: </label>
                <div>
                    <div class="form-check">
                        <label class="form-check-label" for="opt1">Si</label>
                        <input class="form-check-input" type="radio" name="repeat" id="opt1" value="yes" checked >
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="opt2">No</label>
                        <input class="form-check-input" type="radio" name="repeat" id="opt2" value="no">
                    </div>
                    <div id="more_filt"  class="form-check">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="letters" name="letters"  <?= isset($letters) ? "checked" : "" ?>>
                                <label class="form-check-label" for="letters">Lettere</label>
                        </div>    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="numbers" name="numbers"  <?= isset($numbers) ? "checked" : "" ?>>
                            <label class="form-check-label" for="numbers">Numeri</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="symbols" name="symbols"  <?= isset($symbols) ? "checked" : "" ?>>
                            <label class="form-check-label" for="symbols">Simboli</label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Genera</button>
                <button type="reset" class="btn btn-secondary">Resetta</button>
            </div>
        </formn>
    </main>
</body>
</html>
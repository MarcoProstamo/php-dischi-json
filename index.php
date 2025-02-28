<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <ol class="list-group list-group-numbered">
    <?php
    $dischi = json_decode(file_get_contents("./dischi.json"), true);
    foreach($dischi as $disco){
    ?>

    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
        <div class="fw-bold"><?php echo $disco["titolo"] ?></div>
        Genere: <?php echo "<b>" . $disco["genere"] . "</b>" . "<br>" ?>
        Artista: <?php echo "<b>" . $disco["artista"] . "</b>" . "<br>" ?>
        Anno: <?php echo "<b>" . $disco["anno_pubblicazione"] . "</b>" . "<br>" ?>
        </div>
    </li>

    <?php
    }
    ?>
    
    </ol>

</body>
</html>
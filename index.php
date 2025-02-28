<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="container py-5">

    <form method="POST">
        <h1>Aggiungi un disco</h1>
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="titolo" id="titolo">
        </div>
        <div class="mb-3">
            <label for="artista" class="form-label">Artista</label>
            <input type="text" class="form-control" name="artista" id="artista">
        </div>
        <div class="mb-3">
            <label for="anno_pubblicazione" class="form-label">Anno Pubblicazione</label>
            <input type="text" class="form-control" name="anno_pubblicazione" id="anno_pubblicazione">
        </div>
        <div class="mb-3">
            <label for="url_cover" class="form-label">Cover Link</label>
            <input type="text" class="form-control" name="url_cover" id="url_cover">
        </div>
        <div class="mb-3">
            <label for="genere" class="form-label">Genere</label>
            <input type="text" class="form-control" name="genere" id="genere">
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi Disco</button>
    </form>

    <hr class="my-4">

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

    // Controlla se il form è stato inviato
    // TODO: Aggiungere Controllo sul Campo Vuoto
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $artista = $_POST["artista"] ?? "Sconosciuto";
        $titolo = $_POST["titolo"] ?? "Sconosciuto";
        $anno_pubblicazione = $_POST["anno_pubblicazione"] ?? "Sconosciuto";
        $url_cover = $_POST["url_cover"] ?? "Sconosciuto";
        $genere = $_POST["genere"] ?? "Sconosciuto";

        // Aggiungi il nuovo disco all'array
        $dischi[] = [
            "titolo" => $titolo,
            "artista" => $artista,
            "anno_pubblicazione" => $anno_pubblicazione,
            "url_cover" => $url_cover,
            "genere" => $genere
        ];

        // Salva l'array aggiornato nel file JSON
        file_put_contents("./dischi.json", json_encode($dischi, JSON_PRETTY_PRINT));

        // Ricarica la pagina per aggiornare la lista ed evitare il reinvio del form
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    ?>  
    </ol>

</body>
</html>
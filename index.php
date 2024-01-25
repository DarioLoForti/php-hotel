<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filteredHotel = $hotels;

    if(isset($_GET['parking']) && $_GET['parking'] != ""){
        $tempHotel = [];
        $parcheggio = $_GET['parking'];

        foreach($hotels as $hotel){
            if($hotel['parking'] == $parcheggio){
                $tempHotel [] = $hotel;
            }
        }

        $filteredHotel = $tempHotel;
    }

    if(isset($_GET['vote']) && $_GET['vote'] != ""){
        $tempHotel = [];
        $voto = $_GET['vote'];

        foreach($filteredHotel as $hotel){
            if($hotel['vote'] >= $voto){
                $tempHotel [] = $hotel;
            }
        }
        $filteredHotel = $tempHotel;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Hotel</title>
</head>
<body>
    <?php include_once "./partials/header.php"; ?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="./index.php" method="GET">
                            <div class="row">
                                <div class="col-6 py-5">
                                    <select name="parking" id="parking" class="form-control">
                                        <option value="">Seleziona se preferisci il parcheggio</option>
                                        <option value="true">Si</option>
                                        <option value="false">No</option>
                                    </select>  
                                </div>
                                <div class="col-3 py-5">
                                    <input type="number" name="vote" id="vote" class="form-control" placeholder="Inserisci il voto desiderato">
                                </div>
                                <div class="col-3 p-5">
                                    <button type="submit" class="btn btn-sm btn-success">Invia</button>
                                </div>
                        </form>
                    </div>
                    <div class="col-12 py-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome Hotel</th>
                                    <th class="text-center">Descrizione</th>
                                    <th class="text-center">Parcheggio</th>
                                    <th class="text-center">Votazione</th>
                                    <th class="text-center">Distanza dal centro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($filteredHotel as $hotel){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $hotel['name']; ?></td>
                                        <td class="text-center"><?php echo $hotel['description']; ?></td>
                                        <td class="text-center"><?php echo $hotel['parking'] == true ? 'Si' : 'No'; ?></td>
                                        <td class="text-center"><?php echo $hotel['vote']; ?></td>
                                        <td class="text-center"><?php echo $hotel['distance_to_center']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>  
    <?php include_once "./partials/footer.php"; ?>  
</body>
</html>
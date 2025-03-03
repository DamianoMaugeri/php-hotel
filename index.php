
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

?>

<?php

$filteredHotels = $hotels;

if ( !empty($_GET) ){
    if ( !empty($_GET['parking']) ){
        $parking = $_GET['parking'];

        $filteredHotels = array_filter($filteredHotels, function($hotel){
            return $hotel['parking'] == true;
        });

    
    } 
    if ( !empty($_GET['vote']) ){
        $vote = $_GET['vote'];
        $filteredHotels = array_filter($filteredHotels, function($hotel) use ($vote){
            return $hotel['vote'] == $vote;
        });
    } 
}



    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP HOTEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="container bg-body-secondary">
    <h1 class="text-center my-5">
        HOTEL php
    </h1>

<section>
        <form action="./index.php" method="get" class="row g-3 border border-black p-3 rounded align-items-center" >
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" name="parking" id="parking" class="form-check-input">
                    <label for="parking" class="form-check-label">Parcheggio</label>
                </div>
            </div>
            <div class="col-md-6">
                <label for="vote" class="form-label">Voto</label>
                <input type="number" name="vote" id="vote" min="1" max="5" class="form-control">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary ">Cerca</button>
            </div>
        </form>
    </section>
    <section class="my-5">
    <?php if (!empty($filteredHotels)) : ?>
        <table class="table table-striped table-hover table-bordered">
            <caption class="caption-top mb-3 text-center" >
                i nostri hotel  
            </caption>
            <thead class="table-dark">
                <tr>
                    <th>nome</th>
                    <th>descrizione</th>
                    <th>parcheggio</th>
                    <th>voto</th>
                    <th>distanza dal centro </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredHotels as $hotel) : ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'si' : 'no'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class=" text-center text-danger ">Nessun hotel trovato.</p>
    <?php endif; ?>

        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>
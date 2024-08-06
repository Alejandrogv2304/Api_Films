<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializar una sesión de cURL
$ch = curl_init(API_URL);

// Indicar que el resultado debe ser devuelto y no mostrado en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Deshabilitar la verificación del certificado (no recomendado para producción)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

// Ejecutar la petición
$response = curl_exec($ch);

// // Verificar si la solicitud cURL tuvo éxito
// if ($response === false) {
//     $error_msg = curl_error($ch);
//     $error_no = curl_errno($ch);
//     echo "cURL error ({$error_no}): {$error_msg}";
// } else {
//     // Mostrar la respuesta cruda
//     var_dump($response);

//     // Convertir el resultado a un array asociativo
   $data = json_decode($response, true);
    
//     // Verificar si json_decode tuvo éxito
//     if (json_last_error() === JSON_ERROR_NONE) {
//         // Mostrar los datos obtenidos
// //         
//         echo "Error al decodificar el JSON: " . json_last_error_msg();
//     }
// }

// Cerrar la conexión
curl_close($ch);
?>
<head>
    <meta charset="UTF-8"/>
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>
    <title>La proxima pelicula de Marvel</title>
</head>
<main>
    <!-- <pre style="font-size:8px; overflow:scroll; height:250px;">
        <?php var_dump($data) ?>
    </pre> -->
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?> " 
        style="border-radius:16px;"/>
    </section>
<hgroup>
    <h3> <?= $data["title"];?> se estrena en: <?= $data["days_until"]; ?> días</h3>
    <p> Fecha de estreno: <?= $data["release_date"]; ?> </p>
    <p> La siguiente es: <?= $data["following_production"]["title"]; ?> </p>

</main>

<style>

    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
    }
    hgroup{
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
    img{
        margin: 0 auto;
    }
</style>
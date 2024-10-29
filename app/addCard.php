<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $name = $_POST['name'] ?? '';
    $slug = $_POST['slug'] ?? '';
    $description = $_POST['description'] ?? '';
    $features = $_POST['features'] ?? '';
    $brand_id = $_POST['brand_id'] ?? '1';
    $categories = [$_POST['categories[0]'], $_POST['categories[1]']];
    $tags = [$_POST['tags[0]'], $_POST['tags[1]']];
    $cover = $_FILES['cover']['tmp_name'] ?? null;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'features' => $features,
            'brand_id' => $brand_id,
            'cover' => new CURLFile($cover),
            'categories[0]' => $categories[0],
            'categories[1]' => $categories[1],
            'tags[0]' => $tags[0],
            'tags[1]' => $tags[1]
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 635|dpQ8rIYnu4zuYBZB71sBeAhBrEtTuTZe8M4SGYjQ',
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    echo $response;
} else {
    echo json_encode(["error" => "Método no permitido"]);
}
?>

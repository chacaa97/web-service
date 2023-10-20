<?php

$kataKunci = "corona";
$from = "2023-20-01";
$sortBy = "publishedAt";
$apiKey = "772e903e394d4fe58c9ae341f5f5223a"; /* <-- Silakan register di newsapi.org untuk mendapatkan API_KEY */
$language = "en";
$alamatAPI = "http://newsapi.org/v2/everything?" .
    "q={$kataKunci}&language={$language}&from={$from}" .
    "&sortBy={$sortBy}&apiKey={$apiKey}";

# ambil data json dari $alamatAPI
$data = file_get_contents($alamatAPI);
# parsing variabel $data ke dalam array
$dataBerita = json_decode($data);

if ($dataBerita->status === "ok") {
    # tampilkan menggunakan perulangan
    foreach ($dataBerita->articles as $berita) {
        echo "<h3><a href='{$berita->url}'>{$berita->title}</a></h3>";

        if ($berita->urlToImage) {
            echo "<img style='width: 10rem' src='{$berita->urlToImage}'>";
        }

        echo "<p>{$berita->description}</p>";
        echo "<hr>";
    }
}
?>
<?php
header('Content-Type: application/json');
$data = file_get_contents(__DIR__ . '/penyakit.json');

$json = json_decode($data);
$author = "abdipr";
$main = array(
  "status" => "200",
  "author" => "$author",
  "message" => "Masukkan parameter q, contoh: ?q=asma"
);
$result = array(
  "status" => "200",
  "author" => "$author",
  "result" => array()
);
$error = array(
  "status" => "404",
  "author" => "$author",
  "message" => "Tidak ada penyakit bernama " . (isset($_GET['q']) ? $_GET['q'] : 'Unknown') . ""
);
if (!isset($_GET['q']) || $_GET["q"] == "") {
  echo json_encode($main, JSON_PRETTY_PRINT);
} else {
  $matchedItems = array();
  foreach ($json->data as $item) {
    if (isset($_GET['q']) && strpos(strtolower($item->nama), strtolower($_GET["q"])) !== false) {
      $matchedItems[] = array(
        "id" => $item->id,
        "nama" => $item->nama,
        "gejala" => $item->gejala,
        "penyebab" => $item->penyebab,
        "penularan" => $item->penularan,
        "pencegahan" => $item->pencegahan,
        "diagnosis" => $item->diagnosis,
        "pengobatan" => $item->pengobatan,
        "prognosis" => $item->prognosis,
        "faktor_risiko" => $item->faktor_risiko,
        "komplikasi" => $item->komplikasi,
        "epidemiologi" => $item->epidemiologi,
        "prevalensi" => $item->prevalensi,
        "sumber" => $item->sumber
      );
    }
  }

  if (!empty($matchedItems)) {
    $result["result"] = $matchedItems;
    echo str_replace("\\", "", json_encode($result, JSON_PRETTY_PRINT));
  } else {
    echo json_encode($error, JSON_PRETTY_PRINT);
  }
}
?>

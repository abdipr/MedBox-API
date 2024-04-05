<?php
header('Content-Type: application/json');
$data = file_get_contents(__DIR__ . '/obat.json');

$json = json_decode($data);
$author = "abdipr";
$main = array(
  "status" => "200",
  "author" => "$author",
  "message" => "Masukkan parameter q, contoh: ?q=ambroxol"
);
$result = array(
  "status" => "200",
  "author" => "$author",
  "result" => array()
);
$error = array(
  "status" => "404",
  "author" => "$author",
  "message" => "Tidak ada obat bernama " . (isset($_GET['q']) ? $_GET['q'] : 'Unknown') . ""
);
if (!isset($_GET['q']) || $_GET["q"] == "") {
  echo json_encode($main, JSON_PRETTY_PRINT);
} else {
  $matchedItems = array();
  foreach ($json->data as $item) {
    if (isset($_GET['q']) && strpos(strtolower($item->nama_generik), strtolower($_GET["q"])) !== false) {
      $matchedItems[] = array(
    "id" => $item->id,
    "nama_generik" => $item->nama_generik,
    "nama_merk" => $item->nama_merk,
    "pengertian" => $item->pengertian,
    "golongan" => $item->golongan,
    "kategori" => $item->kategori,
    "bentuk_obat" => $item->bentuk_obat,
    "manfaat" => $item->manfaat,
    "cara_kerja" => $item->cara_kerja,
    "kontraindikasi" => $item->kontraindikasi,
    "efek_samping" => $item->efek_samping,
    "dosis" => $item->dosis,
    "cara_penggunaan" => $item->cara_penggunaan,
    "interaksi_obat" => $item->interaksi_obat,
    "penyimpanan" => $item->penyimpanan,
    "kehamilan" => $item->kehamilan,
    "menyusui" => $item->menyusui,
    "peringatan_khusus" => $item->peringatan_khusus,
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

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penyakit</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      .section {
        margin-bottom: 20px;
      }
      .divTable
      {
      width:100%;
      display:block;
      height:100%!important;
      padding:0px;
      background-color:transparent;
      margin:0px;
      }

      .divRow
      {
      width:100%;
      display:table;
      position:relative;
      }

      .divCell
      {
      width:68%;
      display:block;
      position:relative;
      float:left;
      text-align:left;
      vertical-align:middle;
      letter-spacing:0px;
      word-spacing:0px;
      }

      .divCelln
      {
      width:32%;
      display:block;
      position:relative;
      float:left;
      text-align:left;
      vertical-align:middle;
      letter-spacing:0px;
      word-spacing:0px;
      }
    </style>
  </head>
  <body>
    <h1>Penyakit</h1>
    <p>Cari informasi penyakit.</p>
    <div class="section">
    <form method=get action=/demo/index.php>
    <input type="text" id="penyakit" name="q" placeholder="Nama Penyakit" maxlength="50" oninput="this.value=this.value.slice(0,this.maxLength)" class="input">
    <button type="submit" class="cari">Cari</button>
    </form>
      <br>
  </div>
    <div class="section">
<?php
$data = file_get_contents("api/penyakit/penyakit.json");

$json = json_decode($data);
$author = "abdipr";
$total = 0;
if (!isset($_GET["q"]) || $_GET["q"] == "") {
    echo "Masukkan nama penyakit, contoh: Asma";
} else {
    echo "Penyakit yang mengandung huruf \"" . $_GET["q"] . "\":";
    foreach ($json->data as $item) {
        if (
            isset($_GET["q"]) &&
            strpos(strtolower($item->nama), strtolower($_GET["q"])) !== false
        ) {
            $total = $total + 1;
            echo "<h3>&nbsp;&nbsp;$total. $item->nama</h3>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Gejala</div><div class='divCell'>:  $item->gejala</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Penyebab</div><div class='divCell'>:  $item->penyebab</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Penularan</div><div class='divCell'>:  $item->penularan</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Pencegahan</div><div class='divCell'>:  $item->pencegahan</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Diagnosis</div><div class='divCell'>:  $item->diagnosis</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Pengobatan</div><div class='divCell'>:  $item->pengobatan</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Prognosis</div><div class='divCell'>:  $item->prognosis</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Faktor Risiko</div><div class='divCell'>:  $item->faktor_risiko</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Komplikasi</div><div class='divCell'>:  $item->komplikasi</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Epidemiologi</div><div class='divCell'>:  $item->epidemiologi</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Prevalensi</div><div class='divCell'>:  $item->prevalensi</div></div>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Sumber</div><div class='divCell'>:  <a href='$item->sumber' target='blank'>Alodokter</a></div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
        }
    }
}
if ($total == 0) {
    if (!isset($_GET["q"]) || $_GET["q"] != "") {
        echo "Tidak ada penyakit bernama " .
            (isset($_GET["q"]) ? $_GET["q"] : "Unknown") .
            "";
    }
}
if ($total != 0) {
    if (!isset($_GET["q"]) || $_GET["q"] != "") {
        echo "Total hasil: " . $total;
    }
}
?>
    </div>
  </body>
</html>
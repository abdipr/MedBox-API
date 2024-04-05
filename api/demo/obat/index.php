<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Obat</title>
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
    <h1>Obat</h1>
    <p>Cari informasi obat.</p>
    <div class="section">
    <form method=get action=/api/demo/obat/index.php>
    <input type="text" id="obat" name="q" placeholder="Nama Obat" maxlength="50" oninput="this.value=this.value.slice(0,this.maxLength)" class="input">
    <button type="submit" class="cari">Cari</button>
    </form>
      <br>
  </div>
    <div class="section">
<?php
$data = file_get_contents(__DIR__ . '/obat.json');

$json = json_decode($data);
$author = "abdipr";
$total = 0;
if (!isset($_GET["q"]) || $_GET["q"] == "") {
    echo "Masukkan nama obat, contoh: Ambroxol";
} else {
    echo "Obat yang mengandung huruf \"" . $_GET["q"] . "\":";
    foreach ($json->data as $item) {
        if (
            isset($_GET["q"]) &&
            strpos(strtolower($item->nama_generik), strtolower($_GET["q"])) !== false
        ) {
            $total = $total + 1;
            echo "<h3>&nbsp;&nbsp;$total. $item->nama_generik</h3>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Nama Generik</div><div class='divCell'>$item->nama_generik</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Nama Merk</div><div class='divCell'>$item->nama_merk</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Pengertian</div><div class='divCell'>$item->pengertian</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Golongan</div><div class='divCell'>$item->golongan</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Kategori</div><div class='divCell'>$item->kategori</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Bentuk Obat</div><div class='divCell'>$item->bentuk_obat</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Manfaat</div><div class='divCell'>$item->manfaat</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Cara Kerja</div><div class='divCell'>$item->cara_kerja</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Kontraindikasi</div><div class='divCell'>$item->kontraindikasi</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Efek Samping</div><div class='divCell'>$item->efek_samping</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Dosis</div><div class='divCell'>" . implode("<br>", $item->dosis) . "</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Cara Penggunaan</div><div class='divCell'>$item->cara_penggunaan</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Interaksi Obat</div><div class='divCell'>$item->interaksi_obat</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Penyimpanan</div><div class='divCell'>$item->penyimpanan</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Kehamilan</div><div class='divCell'>$item->kehamilan</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Menyusui</div><div class='divCell'>$item->menyusui</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Peringatan Khusus</div><div class='divCell':  $item->peringatan_khusus</div></div>";
            echo "<hr size='1px' color='#f0f0f0' style='border-radius: 2.5px;'><br>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Sumber</div><div class='divCell'><a href='$item->sumber' target='blank'>Alodokter</a></div></div>";
            echo "<hr size='1px' color='#dddddd' style='border-radius: 5px;'><br>";
        }
    }
}
if ($total == 0) {
    if (isset($_GET["q"]) && $_GET["q"] != "") {
        echo "<br>Tidak ada obat bernama " .
            (isset($_GET["q"]) ? $_GET["q"] : "Unknown") .
            "";
    }
}
if ($total != 0) {
    if (isset($_GET["q"]) && $_GET["q"] != "") {
        echo "Total hasil: " . $total;
    }
}
?>
    </div>
  </body>
</html>

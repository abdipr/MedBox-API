<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Obat</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: rgb(251,250,218);
        padding: 10px;
        color: rgb(67,104,80);
      }
      a {
        text-decoration: none;
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
h1 {
font-weight: bold;
font-size: 60px;
margin-bottom: -10px;
text-align: center;
color: rgb(18,55,42);
}
hr {
color: rgb(18,55,42);
}
p {
text-align: center;
color: rgb(67,104,80);
}
button {
    width: 100px;
    padding: 10px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    border: none;
}

button:focus {
    outline: none;
}

.seven {
    margin-left: 15px;
    background: rgb(67,104,80);
    color: rgb(251,250,218);
    border-radius: 5px;
    transition: all 300ms;
}

.seven:hover {
    transform: scale(1.1);
    letter-spacing: 2px;
    background: white;
    color: rgb(67,104,80);
    box-shadow: 2px 2px 3px rgba(0,0,0,0.57);
}

input{
  margin-bottom: 40px;
  margin-left: 10px;
}

.input-elevated{
font-size: 16px;
line-height: 1.5;
border: none;
background: #FFFFFF;
background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20'><path fill='%23838D99' d='M13.22 14.63a8 8 0 1 1 1.41-1.41l4.29 4.29a1 1 0 1 1-1.41 1.41l-4.29-4.29zm-.66-2.07a6 6 0 1 0-8.49-8.49 6 6 0 0 0 8.49 8.49z'></path></svg>");
background-repeat: no-repeat;
background-position: 10px 10px;
background-size: 20px 20px;
box-shadow: 0 2px 4px 0 rgba(0,0,0,0.08);
border-radius: 5px;
width: 300px;
padding: .5em 1em .5em 2.5em;
} 

.input-elevated::placeholder{
  color: #838D99;
}

.input-elevated:focus {
  outline: none;
  box-shadow: 0 4px 10px 0 rgba(0,0,0,0.16);
}
    </style>
  </head>
  <body>
    <h1>Obat</h1>
    <p>Cari informasi obat.</p>
    <div class="section">
    <form method=get action=/api/demo/obat/index.php>
    <input type="text" id="obat" class="input-elevated" name="q" placeholder="Nama Obat" maxlength="50" oninput="this.value=this.value.slice(0,this.maxLength)" class="input">
    <button type="submit" class="cari seven">Cari</button>
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
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Nama Merk</div><div class='divCell'>$item->nama_merk</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Pengertian</div><div class='divCell'>$item->pengertian</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Golongan</div><div class='divCell'>$item->golongan</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Kategori</div><div class='divCell'>$item->kategori</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Bentuk Obat</div><div class='divCell'>$item->bentuk_obat</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Manfaat</div><div class='divCell'>$item->manfaat</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Cara Kerja</div><div class='divCell'>$item->cara_kerja</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Kontraindikasi</div><div class='divCell'>$item->kontraindikasi</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Efek Samping</div><div class='divCell'>$item->efek_samping</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Dosis</div><div class='divCell'>" . implode("<br>", $item->dosis) . "</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Cara Penggunaan</div><div class='divCell'>$item->cara_penggunaan</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Interaksi Obat</div><div class='divCell'>$item->interaksi_obat</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Penyimpanan</div><div class='divCell'>$item->penyimpanan</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Kehamilan</div><div class='divCell'>$item->kehamilan</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Menyusui</div><div class='divCell'>$item->menyusui</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Peringatan Khusus</div><div class='divCell'>$item->peringatan_khusus</div></div>";
            echo "<hr size='1px' color='#12372a' style='border-radius: 2.5px;'>";
            echo "<div id='divRow1' class='divRow'><div class='divCelln' style='font-weight: bold;'>Sumber</div><div class='divCell'><a href='$item->sumber' target='blank'>Alodokter</a></div></div>";
            echo "<hr size='1px' color='#dddddd' style='border-radius: 5px;'><br><br>";
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

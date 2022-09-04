<?php

if (isset($_POST['tambah'])) {

    $tambah = $_POST['tambah'];
    $mulai = $_POST['mulai'];

    $berakhir = $mulai  +  $tambah;

    $harga_loop = '';

    for ($y = $mulai; $y < $berakhir; $y++) {

        $harga_loop .= '
            <input type="number" name="awal[]" style="width:70px;" required>
            <input type="number" name="akhir[]" style="width:70px;" required>
            <input type="number" name="umum[]" style="width:100px;" required>
            <input type="number" name="pelanggan[]" style="width:100px;" required>
            <br>
            
        ';
    }


    echo json_encode($harga_loop);
}

<?php 

function Base_url($urlparam)
{
    $url = "http://localhost/storecashier/" . $urlparam;
    return $url;
}

function Page($page){

    include "template/partials/_header.php";
    include "template/partials/_navbar.php";
    include "template/partials/_sidebar.php";

    include $page;
    include "template/partials/_footer.php";
}

$koneksi = mysqli_connect("localhost","root","","storecashier");
 
// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

//function query banyak
function querybanyak($query){
    $mysqli = new mysqli("localhost","root","","storecashier");
    // menggunakan foreach
    return $mysqli->query($query);
}

//function query satu data
function querysatudata($query){
    $koneksi = mysqli_connect("localhost","root","","storecashier");
    $query_cek = mysqli_query($koneksi, $query);
    return mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
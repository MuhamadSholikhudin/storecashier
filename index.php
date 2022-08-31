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

//jika halaman http://localhost/201753028/index.php?halaman=
if (isset($_GET['page'])) {
    $hal = $_GET['page'];
    switch ($hal) {
        case 'products':

            Page("product/index.php");
            
            break;

            //kategori    
        case 'products_add':

            Page("product/add.php");
            break;

        default:
            include "kategori.php";

            break;
    }
} else {
    // include "template/partials/_header.php";
    // include "template/partials/_navbar.php";
    // include "template/partials/_sidebar.php";
    // include "product/index.php";
    // include "template/partials/_footer.php";

    Page("product/index.php");
}

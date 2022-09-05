<?php
include 'function.php';

//jika halaman http://localhost/201753028/index.php?halaman=
if (isset($_GET['page'])) {
    $hal = $_GET['page'];
    switch ($hal) {
        case 'products':
            Page("product/index.php");
            break;

        case 'products_add':
            Page("product/add.php");
            break;

        case 'products_edit':
            Page("product/edit.php");
            break;

        default:
        Page("product/add.php");

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

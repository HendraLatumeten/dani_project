<?php
    require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    }
     
    if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];
        $ref = $_GET['ref'];
             
        if ($act == "add") {
            if (isset($_GET['id_produk_supplier'])) {
                $id_produk_supplier = $_GET['id_produk_supplier'];
                if (isset($_SESSION['order'][$id_produk_supplier])) {
                    $_SESSION['order'][$id_produk_supplier] += 1;
                } else {
                    $_SESSION['order'][$id_produk_supplier] = 1; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_GET['id_produk_supplier'])) {
                $id_produk_supplier = $_GET['id_produk_supplier'];
                if (isset($_SESSION['order'][$id_produk_supplier])) {
                    $_SESSION['order'][$id_produk_supplier] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_GET['id_produk_supplier'])) {
                $id_produk_supplier = $_GET['id_produk_supplier'];
                if (isset($_SESSION['order'][$id_produk_supplier])) {
                    $_SESSION['order'][$id_produk_supplier] -= 1;
                }
            }
        } elseif ($act == "del") {
            if (isset($_GET['id_produk_supplier'])) {
                $id_produk_supplier = $_GET['id_produk_supplier'];
                if (isset($_SESSION['order'][$id_produk_supplier])) {
                    unset($_SESSION['order'][$id_produk_supplier]);
                }
            }
        } elseif ($act == "update") {
            if (isset($_GET['id_produk_supplier'])) {
                $id_produk_supplier = $_GET['id_produk_supplier'];
                if (isset($_SESSION['order'][$id_produk_supplier])) {
                    $_SESSION['order'][$id_produk_supplier] += 1;
                }
            }
        } elseif ($act == "clear") {
            if (isset($_SESSION['order'])) {
                foreach ($_SESSION['order'] as $key => $jumlah) {
                    unset($_SESSION['order'][$key]);
                }
                unset($_SESSION['order']);
            }
        } 
         
        header ("location:" . $ref);
    }   
     
?>
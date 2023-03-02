<?php
session_start();

if (isset($_SESSION["userId"])) {
    // logged in
    header("Location: ../../pages/userPage.php");
    exit();
  } else {
    // not logged in
    header("Location: ../../pages/account.php?signup");
    exit();
  }
<?php

session_start();

session_destroy();

header("Location: storefront.php?state=loggedout");
exit;
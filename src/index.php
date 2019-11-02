<?php

require './vendor/autoload.php';

use classes\Application;
use classes\DateAccess;
use classes\File;
use classes\GoogleSearch;
use classes\Image;
use classes\ImageTextCsv;

$app = new Application(new Image(new File(), new GoogleSearch(), new ImageTextCsv(), new DateAccess()));

$app->run();
$app->redirectToImage();

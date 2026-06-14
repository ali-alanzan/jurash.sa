<?php

$certificates = getLatestCertificates($connect);

require './sections/views/latest-certificates.view.php';

?>
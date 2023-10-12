<?php
$totalSteps = 10;
for ($i = 1; $i <= $totalSteps; $i++) {
    usleep(500000);
    $progress = ($i / $totalSteps) * 100;
    echo json_encode(["progress" => $progress]);
    ob_flush();
    flush();
}
?>
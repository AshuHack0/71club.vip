<?php

function run($path)
{
    $php = "/usr/local/bin/php";
    exec("$php $path > /dev/null 2>&1 &");
}

$minute = (int) date('i');

run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_zehn.php");
sleep(30);
run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_zehn.php");
run("/home/dragonlo/public_html/71club.vip/niyamitakelasa.php");
run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_aidudi.php");
run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_kemuru.php");
run("/home/dragonlo/public_html/71club.vip/ktrx.php");

if ($minute % 3 === 0) {
    run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_drei.php");
    run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_aidudi_drei.php");
    run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_kemuru_drei.php");
    run("/home/dragonlo/public_html/71club.vip/ktrx3.php");
}

if ($minute % 5 === 0) {
    run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_funf.php");
    run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_aidudi_funf.php");
    run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_kemuru_funf.php");
    run("/home/dragonlo/public_html/71club.vip/ktrx5.php");
}

if ($minute % 10 === 0) {
    run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_aidudi_zehn.php");
    run("/home/dragonlo/public_html/71club.vip/niyamitakelasa_kemuru_zehn.php");
    run("/home/dragonlo/public_html/71club.vip/ktrx10.php");
}
?>


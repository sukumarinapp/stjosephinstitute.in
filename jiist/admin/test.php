<?php
$date=date("Y-m-d");
echo date('Y-m-d', strtotime($date. ' + 10 days'));
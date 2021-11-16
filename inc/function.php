<?php

function redirect($url){
    ?>
        <script>
            window.location.href = '<?php echo $url ?>'
        </script>
    <?php
}

// mysqli_real_escape_string() function 
function mres($str)
{
	global $con;
	$str = mysqli_real_escape_string($con, $str);
	return $str;
}

// Get Current Date 
function getCurrentDate(){
    $day = date('d');
    $month = date('m');
    $year = date('Y');
    return "$year - $month - $day";
}

use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
function setBorder($cell){
    global $activeSheet;
    $activeSheet->getStyle($cell)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
}

?>
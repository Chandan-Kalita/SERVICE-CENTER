
<?php
include 'inc.php';
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);

$mpdf->SetTitle(COMPANY);
$query = mysqli_query($con, 'select * from vehicle');
if (mysqli_num_rows($query) > 0) {
    $html = "<table style='border:1px solid' cellspacing=0>
                <thead>
                    <tr>
                    <th style='border:1px solid' width='5%'>Order</th>
                    <th style='border:1px solid' width='15%'>Customer</th>
                    <th style='border:1px solid' width='8%'>Mobile</th>
                    <th style='border:1px solid' width='8%'>Vehicle No</th>
                    <th style='border:1px solid' width='10%'>Distance Traveled</th>
                    <th style='border:1px solid' width='8%'>Date</th>
                    <th style='border:1px solid' >Problem</th>
                    <th style='border:1px solid' width='5%'>Entered by</th>
                    </tr>
                </thead>
                <tbody>";
    $i=1;
    while ($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
        $mobile = $row['mobile'];
        $car_no = $row['car_no'];
        $kms = $row['kms'];
        $problem = $row['problem'];
        $date = $row['date'];
        $entered_by = $row['entered_by'];
        $html .= "<tr><td  style='border:1px solid'>$i</td><td  style='border:1px solid'>$name</td><td  style='border:1px solid'>$mobile</td><td  style='border:1px solid'>$car_no</td><td  style='border:1px solid'>$kms</td><td  style='border:1px solid'>$date</td><td  style='border:1px solid'>$problem</td><td  style='border:1px solid'>$entered_by</td></tr>";
        $i++;
    }
    $html .= "</tbody>
    </table>";
} else {
    $html = '';
}
$filename = "data" . date('Y-m-d-h:i:s') . ".pdf";
$mpdf->WriteHTML($html);

$mpdf->Output($filename, 'I');
?>




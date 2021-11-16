<?php
include 'inc.php';

require_once __DIR__ . "/vendor\autoload.php";

// Php Spreed Sheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// mPDF
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);

// GET EXCEL SHEET =============================
if ($_GET['type'] == 'excel') {
    $spreadsheet = new Spreadsheet();
    $Excel_writer = new Xlsx($spreadsheet);

    $spreadsheet->setActiveSheetIndex(0);
    $activeSheet = $spreadsheet->getActiveSheet();

    $activeSheet->getStyle('A1:I1')->getFont()->setBold(true);
    foreach (range('A', 'I') as $col) {
        $activeSheet->getColumnDimension($col)->setAutoSize(true);
    }
    $activeSheet->getStyle('A:I')->getAlignment()->setWrapText(true);

    $activeSheet->setCellValue('A1', 'Name');
    $activeSheet->setCellValue('B1', 'Mobile');
    $activeSheet->setCellValue('C1', 'Car No');
    $activeSheet->setCellValue('D1', 'Distance Traveled');
    $activeSheet->setCellValue('E1', 'Problem');
    $activeSheet->setCellValue('F1', 'Date');
    $activeSheet->setCellValue('G1', 'Entered By');
    $activeSheet->setCellValue('H1', 'Brand');
    $activeSheet->setCellValue('I1', 'Model');

    setBorder('A1');
    setBorder('B1');
    setBorder('C1');
    setBorder('D1');
    setBorder('E1');
    setBorder('F1');
    setBorder('G1');
    setBorder('H1');
    setBorder('H1');

    $sql = "SELECT 
    vehicle.id, vehicle.name, vehicle.mobile, vehicle.car_no, vehicle.date, vehicle.kms,vehicle.problem, vehicle.entered_by, car_model.model, car_brand.brand 
    FROM vehicle 
    INNER JOIN car_model on vehicle.car_model_id=car_model.id 
    INNER JOIN car_brand on vehicle.car_brand_id=car_brand.id";
    $query = mysqli_query($con, $sql);
    $filename = "data" . date('Y-m-d-h:i:s') . ".xlsx";
    if (mysqli_num_rows($query) < 1) {
        $activeSheet->setCellValue('A2', 'No record Found');
    } else {
        $i = 2;
        while ($row = mysqli_fetch_assoc($query)) {
            $mobile = substr($row['mobile'], 0, 5) . '-' . substr($row['mobile'], 5);
            $activeSheet->setCellValue('A' . $i, $row['name']);
            $activeSheet->setCellValue('B' . $i, $mobile);
            $activeSheet->setCellValue('C' . $i, $row['car_no']);
            $activeSheet->setCellValue('D' . $i, $row['kms'] . ' Kms');
            $activeSheet->setCellValue('E' . $i, $row['problem']);
            $activeSheet->setCellValue('F' . $i, $row['date']);
            $activeSheet->setCellValue('G' . $i, $row['entered_by']);
            $activeSheet->setCellValue('H' . $i, $row['brand']);
            $activeSheet->setCellValue('I' . $i, $row['model']);
            setBorder('A' . $i);
            setBorder('B' . $i);
            setBorder('C' . $i);
            setBorder('D' . $i);
            setBorder('E' . $i);
            setBorder('F' . $i);
            setBorder('G' . $i);
            setBorder('H' . $i);
            setBorder('I' . $i);

            $i++;
        }
    }
    // Headers for download 
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename=' . $filename);
    header('Cache-Control: max-age=0');
    $Excel_writer->save('php://output');
    // redirect('index.php');
}

// =============================================

//GET PDF FILE
if ($_GET['type'] == 'pdf') {
    $mpdf->SetTitle(COMPANY);
    $query = mysqli_query($con, "SELECT 
    vehicle.id, vehicle.name, vehicle.mobile, vehicle.car_no, vehicle.date, vehicle.kms,vehicle.problem, vehicle.entered_by, car_model.model, car_brand.brand 
    FROM vehicle 
    INNER JOIN car_model on vehicle.car_model_id=car_model.id 
    INNER JOIN car_brand on vehicle.car_brand_id=car_brand.id");
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
                    <th style='border:1px solid' width='25%'>Problem</th>
                    <th style='border:1px solid' width='5%'>Entered by</th>
                    <th style='border:1px solid' width='8%'>Brand</th>
                    <th style='border:1px solid' width='8%'>Model</th>
                    </tr>
                </thead>
                <tbody>";
        $i = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            $name = $row['name'];
            $mobile = $row['mobile'];
            $car_no = $row['car_no'];
            $kms = $row['kms'];
            $problem = $row['problem'];
            $date = $row['date'];
            $entered_by = $row['entered_by'];
            $brand = $row['brand'];
            $model = $row['model'];
            $html .= "<tr><td  style='border:1px solid'>$i</td><td  style='border:1px solid'>$name</td><td  style='border:1px solid'>$mobile</td><td  style='border:1px solid'>$car_no</td><td  style='border:1px solid'>$kms</td><td  style='border:1px solid'>$date</td><td  style='border:1px solid'>$problem</td><td  style='border:1px solid'>$entered_by</td><td  style='border:1px solid'>$brand</td><td  style='border:1px solid'>$model</td></tr>";
            $i++;
        }
        $html .= "</tbody>
    </table>";
    } else {
        $html = 'No Data Found';
    }
    $filename = "data" . date('Y-m-d-h:i:s') . ".pdf";
    $mpdf->WriteHTML($html);

    $mpdf->Output($filename, 'I');
}

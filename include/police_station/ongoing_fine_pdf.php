<?php
require_once('../TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF
{
    // Load table data from file
    public function LoadData()
    {
        require('../../database/db_conn.php');
        require_once('./remaing_date.php');
        require_once('../../database/Police_station/function_db.php');

        // create an array to store the fine information
        $data = array();
        $result = mysqli_query($con, readOngoinFineDetails());
        while ($row = mysqli_fetch_assoc($result)) {

            // store the fine information in the array
            $fine_info = array(
                'id' => $row['fine_id'],
                'Name' => $row['name'],
                'Licence_No' => $row['licence_no'],
                'violation' => $row['violation'],
                'points' => $row['points'],
                'amount' => $row['amount'],
                'remaining_days' => $row['remaining_days'],
            );
            array_push($data, $fine_info);
        }
        return $data;
    }


    // Colored table
    public function ColoredTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(6, 57, 112);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.1);
        $this->SetFont('', 'B');

        // Header
        $w = array(14, 25, 20, 48, 15, 25, 35);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 6, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        // Data
        $fill = 0;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row['id'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['Name'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['Licence_No'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row['violation'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row['points'], 'LR', 0, 'L', $fill);
            $this->Cell($w[5], 6, number_format($row['amount']), 'LR', 0, 'R', $fill);
            $this->Cell($w[6], 6, $row['remaining_days'] . " Days Remaining", 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}



// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('e-fine payment system');
$pdf->SetTitle('Ongoing Fines');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Ongoing fine details', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('helvetica', '', 8);




// set footer font
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// add a page
$pdf->AddPage();

$pdf->SetFooterData('', 0, 'Generated by e-fine payment system', 'Page {PAGENO} of {NB}');

// column titles
$header = array('FINE ID', 'DRIVER NAME', 'LICENCE NO', 'VIOLATION', 'POINTS', 'AMOUNT(RS)', 'OVERDUE DATE');

// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header, $data);

// Your PDF generation code here
$pdf->Output('Ongoing_fines.pdf', 'I');

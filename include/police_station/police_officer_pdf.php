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
        $result = mysqli_query($con, readPoliceOfficerDetails());
        while ($row = mysqli_fetch_assoc($result)) {

            // store the fine information in the array
            $officer_info = array(
                'id' => $row['officer_id'],
                'name' => $row['name'],
                'police_station' => $row['police_station'],
                'address' => $row['address'],
                'email' => $row['email'],
                'phone_No' => $row['phone_no'],
            );
            array_push($data, $officer_info);
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
        $w = array(15, 35, 35, 30, 40, 25);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 5, $header[$i], 1, 0, 'C', 1);
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
            $this->Cell($w[1], 6, $row['name'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['police_station'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row['address'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row['email'], 'LR', 0, 'L', $fill);
            $this->Cell($w[5], 6, $row['phone_No'], 'LR', 0, 'L', $fill);
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
$pdf->SetAuthor('e-fine Payment System');
$pdf->SetTitle('Police Officer Details');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Police Office's details", PDF_HEADER_STRING);

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
$header = array('ID', 'NAME', 'POLICE_STATION', 'ADDRESS', 'EMAIL', 'PHONE_NO');

// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header, $data);

// Your PDF generation code here
$pdf->Output('police_officers.pdf', 'I');

<?php
require_once('includes/tcpdf/tcpdf.php');

            ob_start();
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

             // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

             // Disable header and footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(_FILE_).'/lang/eng.php')) {
                require_once(dirname(_FILE_).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            $pdf->SetFont('times', 'BI', 14);

            // add a page
            $pdf->AddPage();

            $pdf->Cell(0, 10, 'INDIE ABODE', 0, 1, 'C');
            $pdf->Cell(0, 10, 'Game Publishing Platform', 0, 1, 'C');
            $pdf->Cell(0, 10, 'Gamer\'s Report', 0, 1, 'C');

            $pdf->SetFont('helvetica', '', 12);

            $pdf->Ln(4);
            // $name = $user['firstName'].' '.$user['lastName'];
            $name = 'Name: ' . $user['firstName'] . ' ' . $user['lastName'];
            // $accountStatus = ($user['accountStatus'] == 1) ? "Active" : "Blocked";
            $currentDateTime = date('Y-m-d H:i:s');
            // $pdf->Rect(10, 60, 70, 20, 'D');
            $pdf->MultiCell(0, 10, $name, 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Account Status: Active', 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Downloaded Games', 0, 'L', false);

            // add a table
            $header = array('Game Name', 'Downloaded Date','Price');
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 14);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[2], 1, 1, 'C', 1);
            // $pdf->Cell(40, 7, $header[4], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetLineWidth(0.3); // Set the border width for cells
            $pdf->SetFont('times', '', 12);
            $totalCost = 0;

            $dw_games = $this->model->gamer($userid);
            foreach ($dw_games as $game) {

                $id = $game['gameID'];
                $currentGame = $this->model->dwGames($id);
                // $pdf->Cell(40, 6, 'hi', 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $currentGame[0]['gameName'], 1, 0, 'L', 1);
                $pdf->Cell(40, 6, $game['created_at'], 1, 0, 'C', 1);
                $totalCost = $totalCost + floatval($currentGame[0]['gamePrice']);
                $pdf->Cell(40, 6, '$'.$currentGame[0]['gamePrice'], 1, 1, 'R', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');

            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, 'Total Expenditure:     $'.$totalCost, 0, 1, 'C');
            $pdf->Ln(2); // move down by 2 units
            $pdf->SetLineWidth(0.5); // set line width to 0.5 units
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
            $pdf->Ln(2); // move down by 2 units again
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line

            //PARTICIPATED CROWDFUNDS TABLE

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Participated Crowdfunds', 0, 'L', false);

            // add a table
            $header = array('Game Name', 'Donated Date','Donated Amount');
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 14);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[2], 1, 1, 'C', 1);
            // $pdf->Cell(40, 7, $header[4], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetLineWidth(0.3); // Set the border width for cells
            $pdf->SetFont('times', '', 12);
            $totalCost = 0;

            $donatedcrowdfunds = $this->model->participateCrowdfund($userid);
            foreach ($donatedcrowdfunds as $crowdfund) {

                $id = $crowdfund['crowdFundID'];
                $curr_crowdfund = $this->model->getCrowdfund($id);
                // $pdf->Cell(40, 6, 'hi', 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $curr_crowdfund[0]['gameName'], 1, 0, 'L', 1);
                $pdf->Cell(40, 6, $crowdfund['date'], 1, 0, 'C', 1);
                $totalCost = $totalCost + floatval($crowdfund['donatedAmount']);
                $pdf->Cell(40, 6, '$'.$crowdfund['donatedAmount'], 1, 1, 'R', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');


            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, 'Total Donations:     $'.$totalCost, 0, 1, 'C');
            $pdf->Ln(2); // move down by 2 units
            $pdf->SetLineWidth(0.5); // set line width to 0.5 units
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
            $pdf->Ln(2); // move down by 2 units again
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line
            
            //RATED JAMS TABLE

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Rated Jams', 0, 'L', false);

            // add a table
            $header = array('Jam Name', 'Rated Game','Rates','Rank');
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 14);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[2], 1, 1, 'C', 1);
            // $pdf->Cell(40, 7, $header[4], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetLineWidth(0.3); // Set the border width for cells
            $pdf->SetFont('times', '', 12);
            $totalCost = 0;

            $ratedSubmissions = $this->model->getRatedSubmissions($userid);
            foreach ($ratedSubmissions as $submission) {

                $id = $submission['submissionID'];
                $jam = $this->model->getJam($id);
                $game = $this->model->dwGames($id);
                // $pdf->Cell(40, 6, 'hi', 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $jam[0]['jamTitle'], 1, 0, 'L', 1);
                $pdf->Cell(40, 6, $game[0]['gameName'], 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $submission['rating'], 1, 0, 'C', 1);
                //$pdf->Cell(40, 6, '$'.$crowdfund['donatedAmount'], 1, 1, 'R', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');

            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, 'Total Donations:     $'.$totalCost, 0, 1, 'C');
            $pdf->Ln(2); // move down by 2 units
            $pdf->SetLineWidth(0.5); // set line width to 0.5 units
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
            $pdf->Ln(2); // move down by 2 units again
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line

            // $signature = 'John Doe';
            // $date = date('F j, Y');

            // $pdf->SetY(-30);
            // $pdf->SetFont('helvetica', 'B', 12);
            // $pdf->Cell(0, 10, 'Signature: '.$signature, 0, 1, 'L');
            // $pdf->Cell(0, 10, 'Date: '.$date, 0, 1, 'R');
            // $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

            // print a block of text using Write()
            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

            
            // ---------------------------------------------------------

            ob_clean();
            ob_flush();
            //Close and output PDF document
            $pdf->Output('Gamer.pdf', 'D');

            ob_end_flush();
            ob_end_clean();

?>
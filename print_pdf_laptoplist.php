<?php
// USTAWIENIA
require('core/TFPDF/tfpdf.php');
include('core/config.php');
$pdf = new tFPDF();
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',10);

//Tytuł tabeli
$pdf->Cell(180,10,'WYPOSAŻENIE PRACOWNIKÓW - KOMPUTERY NIESTACJONARNE', 0,1,'C');
$date_now = date("Y-m-d");
$pdf->Cell(180,10, $date_now , 0,1,'C');

//Nagłówek tabeli
$fill = true;
$pdf->SetFillColor(192, 192, 192);
$pdf->Cell(40, 10, 'NAZWA', 1, 0, 'C', $fill);
$pdf->Cell(60, 10, 'PRACOWNIK', 1, 0, 'C', $fill);
$pdf->Cell(40, 10, 'MODEL', 1, 0, 'C', $fill);
$pdf->Cell(40, 10, 'DATA WYDANIA', 1, 1, 'C', $fill);

//Treść tabeli - zapytanie do bazy
$sql = "select 
            k.Nazwa, 
            m.Lista, 
            p.Imię+' '+p.Nazwisko as Pracownik,
            pr.Nazwa+' '+m.Nazwa as Komp, 
            k.Data_Wydania 
        from Kompy as k
	    left join Modele as m on m.Id = k.ModelId
	    left join Pracownicy as p on p.Id = k.PracownikId
	    left join Producenci as pr on pr.Id = m.ProducentId
	    where m.Lista = 1
	    and p.Imię != '**WOLNY**' 
	    and k.Uwagi not like '%tymczasowo%'";
if ($stmt = $pdo->prepare($sql)) {
    if ($stmt->execute()) {
    }
}
//Treść tabeli
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
{
    $pdf->Cell(40, 8, $row['Nazwa'], 1, 0, 'C');
    $pdf->Cell(60, 8, $row['Pracownik'], 1, 0, 'C');
    $pdf->Cell(40, 8, $row['Komp'], 1, 0, 'C');
    $pdf->Cell(40, 8, $row['Data_Wydania'], 1, 1, 'C');

}
$pdf->Output();
?>




<?php
include('core/config.php');

$sql = "select 
            p.Id,
            k.Id,
            p.Imię as Imię,
            p.Nazwisko as Nazwisko,
            p.PlecId as Płeć,
            CASE
                WHEN p.PlecId = 1
                    THEN 'Panem'
                    ELSE 'Panią'
                END as Plec,
            k.Service_tag,
            k.Nazwa as Komp,
            m.Nazwa as Model,
            pr.Nazwa as Producent
            from Pracownicy as p
                left join Kompy as k on k.PracownikId = p.Id
                left join Modele as m on m.Id = k.ModelId
                left join  Producenci as pr on pr.Id = m.ProducentId
            where k.Id = :Id;";
if ($stmt = $pdo->prepare($sql)) {
    if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
    }
}
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; Filename=umowawydaniakomputera.doc");
$date_now = date("Y-m-d");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//PL" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<p class="western" align="center"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;"><strong>Umowa<br /> o powierzenie mienia pracownikowi</strong></span></span></p>
<p class="western"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">zawarta w Głogowie w dniu <?php print $date_now ?> pomiędzy:</span></p>
<ul>
    <li><p class="western" style="margin-bottom: 0cm;" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">WW EKOCHEM Spółka z ograniczoną odpowiedzialnością Spółka komandytowa z siedzibą w Głogowie, ul. Akacjowa 1, 87-123 Dobrzejewice, zwaną dalej Pracodawcą, a </span></span></p></li>
    <li><p class="western" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                print  $row['Plec'];
                print ' ';
                print $row['Imię'];
                print ' ';
                print $row['Nazwisko'];
                print ', ';

                if ($row['Płeć'] == 1){
                    $zwanie='zwanym';
                } else {
                    $zwanie='zwaną';
                }

                print $zwanie;
                print ' dalej Pracownikiem.';
            }
            ?>
    </p></li>
</ul>
<p class="western" align="center"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">&sect;1</span></span></p>
<p class="western" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Pracownik świadczy dla Pracodawcy usługi w oparciu o umowę o pracę. Do wykonania tej pracy niezbędny jest komputer. Przedmiotem umowy jest potwierdzenie faktu przekazania oraz ustalenie warunków użytkowania komputera przez Pracownika w trakcie wykonywania pracy na rzecz Pracodawcy.</span></span></p>
<p class="western" align="center"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">&sect;2</span></span></p>
<p class="western" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Niniejszym Pracodawca powierza Pracownikowi, a Pracownik przyjmuje do używania:</span></span></p>
    <ul>
        <li>
            <?php
            if ($stmt = $pdo->prepare($sql)) {
                if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
                }
            }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                print 'Komputer ' . $row['Producent'] . ' ' .$row['Model'] . ' (numer seryjny: ' . $row['Service_tag'] . ')';
            }
            ?>
        </li>
    </ul>
<p class="western" align="center"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">&sect;3</span></span></p>
<ol>
<li><p class="western" style="margin-bottom: 0cm;" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Pracownik zobowiązuje się użytkować sprzęt wyłącznie w celu wykonania usług, o której mowa w &sect;1 niniejszej umowy. </span></span></p></li>
<li><p class="western" style="margin-bottom: 0cm;" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Pracownik zobowiązuje się nie przekazywać sprzętu osobom trzecim bez zgody Pracodawcy. </span></span></p></li>
<li><p class="western" style="margin-bottom: 0cm;" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Pracownik zobowiązuje się nie instalować w sprzęcie oprogramowania bez zgody Pracodawcy. </span></span></p></li>
</ol>
<p class="western" align="center"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">&sect;4</span></span></p>
<ol>
<li><p class="western" style="margin-bottom: 0cm;" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Pracownik zobowiązuje się nie instalować w sprzęcie oprogramowania, do którego licencji Pracodawca nie nabył odpłatnie. </span></span></p></li>
<li><p class="western" style="margin-bottom: 0cm;" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Pracownik zobowiązuje się nie instalować w sprzęcie oprogramowania rozpowszechnianego nieodpłatnie, jeżeli zgodnie z warunkami umowy licencyjnej oprogramowanie to nie może być wykorzystywane dla celów komercyjnych. </span></span></p></li>
<li><p class="western" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Pracownik zobowiązuje się nie instalować w składnikach sprzęcie oprogramowania mogącego stwarzać zagrożenie w zakresie wirusów itp.</span></span></p></li>
</ol>
<p class="western" align="center"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">&sect;5</span></span></p>
<ol>
<li><p class="western" style="margin-bottom: 0cm;" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Wszelkie zmiany umowy wymagają dla swej ważności formy pisemnej. </span></span></p></li>
<li><p class="western" align="justify"><span style="font-family: Tahoma, sans-serif;"><span style="font-size: small;">Umowę sporządzono w dwóch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron</span></span></p></li>
</ol>
</body>
</html>

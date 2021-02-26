    <?php
    include('core/config.php');
    include('core/phpqrcode/qrlib.php');


    # $sql = "select * from Faktury where NumerFakt = :NumerFakt";
    $sql = "select
                      	p.Id,
                      	p.Imię,
                      	p.Nazwisko,
                      	s.Nazwa AS Stanowisko,
                      	p.Mail,
                      	p.Telefon,
                      	sp.Nazwa AS Spółka,
                        sp.Full_Nazwa,
                      	p.Uwagi
                      from Pracownicy AS p
                        inner join Stanowiska AS s on [s].[Id] = [p].[StanowiskoId]
                      	inner join Spolki AS sp on [sp].[Id] = [p].[SpółkaId]
                    where p.Id = :Id;";
    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute(array(':Id'=>trim($_GET['Id'])))) {
        }
    }
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
    {
        $qr_cont = 'BEGIN:VCARD
VERSION:3.0
FN;CHARSET=UTF-8:' . $row["Imię"] . ' ' . $row["Nazwisko"] . '
EMAIL;CHARSET=UTF-8;type=WORK,INTERNET:' . $row["Mail"] . '
TEL;TYPE=CELL:' . $row["Telefon"] . '
LABEL;CHARSET=UTF-8;TYPE=WORK:' . $row["Full_Nazwa"] . '
TITLE;CHARSET=UTF-8:' . $row["Stanowisko"] . '
ORG;CHARSET=UTF-8:' . $row["Full_Nazwa"] . '
END:VCARD ';
        QRcode::png($qr_cont, 'WIZYTÓWKI/' . $row["Mail"] . '.png'); // creates file
        echo '<img src= "WIZYTÓWKI/' . $row["Mail"] . '.png" />';
    }

    print_r($row);
    sqlsrv_close($conn);
    ?>
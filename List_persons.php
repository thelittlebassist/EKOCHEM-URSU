<html>

  <head>
    <title>Dział IT - Pracownicy</title>
      <?php include('core/bootstrap.php');?>
  </head>

  <body style="font-size:16px">

    <?php
            include('core/navbar.php');
            include('core/config.php');
            include('core/css.php');
    ?>

    <div>
    <h3 align="center">Lista Pracowników</h3>
    </div>

    <form>
      <input class="btn btn-dark" type="button" value="Dodaj pracownika" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_persons_form.php'" />
    </form>

    <!-- NAGŁÓWEK TABELI -->
    <div class="container-fluid">
      <table id="header-fixed" border="1" style="font-size:14px" class="table table-striped table-hover tableFixHead">
        <thead class="thead-dark">
          <tr>
          <th>Imię
          <th>Nazwisko
          <th>Stanowisko
          <th>Komp</th>
          <th>Aktywny
          <th>Opcje
        	</tr>
        </thead>
    <!-- END NAGŁÓWEK TABELI -->

        <?php

            $sql = "select
	                   p.Id,
                       p.Imię,
                       p.Nazwisko,
                       s.Nazwa AS Stanowisko,
                       CASE
                        when p.Aktywny = 1
                        then 'Aktywny'
                        else 'Nieaktywny'
                      END
                      AS Aktywny,
                        k.Nazwa AS Komp,
                        k.Id AS KompId
                    from Pracownicy AS p
                    inner join Stanowiska AS s ON s.Id = p.StanowiskoId
                    left join Kompy as K on k.PracownikId = p.Id

                    order by p.Nazwisko;";
              if ($stmt = $pdo->prepare($sql)) {
                 if ($stmt->execute()) {
                  }
              }
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) // while there are rows
              {
               print "<tr>";
               print "  <td>" . $row["Imię"] . "<br>";
               print "  <td>" . $row["Nazwisko"] . "<br>";
               print "  <td>" . $row["Stanowisko"] . "<br>";
               print "  <td><a href='view_comps.php?Id=" . $row["KompId"] . "'>" . $row["Komp"] . "</a><br>";
               print "  <td>" . $row["Aktywny"] . "<br>";
                  $delete="Czy chcesz usunąć?";
               print " <td><a class='btn btn-outline-dark btn-sm'  href='view_persons.php?Id=".$row['Id']."'>P</a>
                           <a class='btn btn-outline-dark btn-sm'  href='edit_persons_form.php?Id=".$row['Id']."'>E</a>
                           <a class='btn btn-outline-dark btn-sm' href='delete_persons.php?Id=".$row['Id']."' onclick=\"return confirm('".$delete."');\">U</a>";
               print "</tr>";
              }
            	 print_r($row);
             sqlsrv_close($conn);
        ?>
      </table>
      <form>
        <input class="btn btn-dark" type="button" value="Dodaj pracownika" onclick="window.location.href='http://localhost/EKOCHEM-URSU/add_persons_form.php'" />
      </form>
    </div>
  </body>
</html>

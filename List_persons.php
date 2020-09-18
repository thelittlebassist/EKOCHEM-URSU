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

            $sql = "select distinct 
                p.Id,
				p.Imię,
				p.Nazwisko,
                s.Nazwa AS Stanowisko,
                       CASE
                        when p.Aktywny = 1
                        then 'Aktywny'
                        else 'Nieaktywny'
                      END AS Aktywny,
		        replace(replace(replace(SUBSTRING (
		            (
                        select '<a href=view_comps.php?Id='+cast(k.Id as char(2))+'>'+k.Nazwa+'</a><br>' as [text()]
                        from Kompy as k
                        where k.PracownikId = k2.PracownikId
                        order by k.Nazwa
                        for xml path('')
		            ), 2, 1000),'&lt;','<'),'&gt;', '>'),'lt;','<') [Komp]
	            from Pracownicy AS p
		        left join Kompy as k2 on k2.PracownikId = p.Id
		        left join Stanowiska as s on s.Id = p.StanowiskoId
                where p.Aktywny = 1
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
               print "  <td>" . $row["Komp"] . "<br>";
               // print "  <td><a href='view_comps.php?Id=" . $row["KompId"] . "'>" . $row["Komp"] . "</a><br>";
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

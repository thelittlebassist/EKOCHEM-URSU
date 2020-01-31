<?php
				/* config pod PDO i OOP */
	          define('DB_SERVER', 'localhost\SQLEXPRESS');
	          define('DB_USERNAME', 'Rysiu');
	          define('DB_PASSWORD', '@sql^local1249');
	          define('DB_NAME', 'URSU');
	         try {
                $pdo = new PDO("sqlsrv:Server=" . DB_SERVER . ";Database=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
                // Set the PDO error mode to exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("ERROR: Could not connect. " . $e->getMessage());
            }
?>
 
foreach ($item as $itemId) {
                $mysqlrow = "INSERT INTO ValitutJaksot(idTunnus, idKurssi) VALUES('".$myusername."', '".$itemId['id']."')";
                $q = mysqli_query($db, $mysqlrow) or die (mysqli_error());
                }

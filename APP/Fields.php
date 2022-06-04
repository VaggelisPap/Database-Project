<!doctype html>
<html>
   <head>
        <title>Ερευνητικά πεδία </title>
    </head>
    <body>
         <h1 align="center">Ερευνητικά πεδία</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
        
         <th>Πεδίο</th>
         


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "SELECT * FROM Field";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['name']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
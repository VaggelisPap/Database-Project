<!doctype html>
<html>
   <head>
        <title>Στελέχη </title>
    </head>
    <body>
         <h1 align="center">Στελέχη</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>'Ονομα</th>
         <th>Επίθετο</th>


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "SELECT * FROM  Executive order by Executive_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Executive_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
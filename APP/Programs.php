<!doctype html>
<html>
   <head>
        <title>Προγράμματα του ΕΛΙΔΕΚ </title>
    </head>
    <body>
         <h1 align="center">Προγράμματα του ΕΛΙΔΕΚ</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>'Ονομα</th>
         <th>Διεύθυνση ΕΛΙΔΕΚ</th>


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "SELECT * FROM Program order by Program_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Program_id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['sector']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
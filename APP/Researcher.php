<!doctype html>
<html>
   <head>
        <title>Ερευνητές του ΕΛΙΔΕΚ</title>
    </head>
    <body>
         <h1 align="center">Ερευνητές του ΕΛΙΔΕΚ</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Όνομα</th>
         <th>Επίθετο</th>
         <th>Ημερομηνία Γέννησης</th>
         <th>Φύλο</th>
         <th>Όνομα Οργανισμού</th> 
         <th>Συντομογραφία</th>
         <th>Ημερομηνία ένταξης</th>
        


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "SELECT *  FROM (Researcher join Organization on Organization.Organization_id = Researcher.Organization_id) order by Researcher.last_name;";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Researcher_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['date_of_birth']?></td>
            <td><?php echo $row['sex']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['sort_name']?></td>
            <td><?php echo $row['work_date']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
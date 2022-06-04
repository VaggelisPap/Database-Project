<!doctype html>
<html>
   <head>
        <title>Έργα με παραδοτέα</title>
    </head>
    <body>
         <h1 align="center">Έργα με παραδοτέα</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID Έργου</th>
         <th>Τίτλος Έργου</th>
         <th>Ημερομηνία έναρξης</th>
         <th>Ημερομηνία λήξης</th>
         <th>Τίτλος Παραδοτέου</th>
         <th>Ημερομηνία παράδοσης</th>



        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "SELECT Projects.Project_id,Projects.Title as ptitle,Projects.start_date,Projects.end_date,Deliverable.date,Deliverable.Title as dtitle FROM Projects join Deliverable on Deliverable.Project_id = Projects.Project_id order by Projects.Project_id,Deliverable.date;";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Project_id']?></td>
            <td><?php echo $row['ptitle']?></td>
            <td><?php echo $row['start_date']?></td>
            <td><?php echo $row['end_date']?></td>
            <td><?php echo $row['dtitle']?></td>
            <td><?php echo $row['date']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
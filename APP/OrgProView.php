<!doctype html>
<html>
   <head>
        <title>Έργα του ΕΛΙΔΕΚ </title>
    </head>
    <body>
         <h1 align="center">Έργα του ΕΛΙΔΕΚ</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>Project_id</th>
         <th>Title</th>
         <th>start_date</th>
         <th>end_date</th> 
         <th>Organisation name</th>
         <th>Sort name</th>
         <th>Type</th>
         <th>City</th>


         <?php

         include 'connection.php';
         $conn = OpenConn();

        $sql = "SELECT * FROM OrgProj order by Project_id";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Project_id']?></td>
            <td><?php echo $row['Title']?></td>
            <td><?php echo $row['start_date']?></td>
            <td><?php echo $row['end_date']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['sort_name']?></td>
            <td><?php echo $row['Type']?></td>
            <td><?php echo $row['city']?></td>
            </tr>
            <?php

            
            
        }

        
        ?>
        </table>
    </body>
</html>
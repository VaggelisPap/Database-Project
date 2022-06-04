<!doctype html>
<html>
   <head>
        <title>Συχνές Ερωτήσεις</title>
    </head>
    <body>
         <h1 align="center">Ποιοί είναι οι ερευνητές που εργάζονται σε 5 ή περισσότερα έργα που δεν έχουν παραδοτέα;</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Όνομα</th>
         <th>Επίθετο</th>
         <th>Συνολικά έργα</th>
        
        


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "select  Researcher.Researcher_id,Researcher.first_name, Researcher.last_name,COUNT(*) as cnt from (Researcher join Researcher_works_on_Projects on Researcher.Researcher_id = Researcher_works_on_Projects.Researcher_id) where Researcher_works_on_Projects.Project_id not in (select Project_id from Deliverable) group by Researcher.Researcher_id  having COUNT(*) > 4 order by COUNT(*) DESC;";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Researcher_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['cnt']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
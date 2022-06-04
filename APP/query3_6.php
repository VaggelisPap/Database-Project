<!doctype html>
<html>
   <head>
        <title>Συχνές Ερωτήσεις</title>
    </head>
    <body>
         <h1 align="center">Ποιοι νέοι ερευνητές (ηλικία < 40 ετών) εργάζονται στα περισσότερα έργα και πόσα έργα;</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Όνομα</th>
         <th>Επίθετο</th>
         <th>Ηλικία</th>
         <th>Αριθμός έργων</th>
        
        


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "select Researcher.Researcher_id,Researcher.first_name, Researcher.last_name,TIMESTAMPDIFF(YEAR,Researcher.date_of_birth,NOW()) as age,COUNT(*) as cnt FROM (Researcher join Researcher_works_on_Projects on Researcher_works_on_Projects.Researcher_id = Researcher.Researcher_id) WHERE TIMESTAMPDIFF(YEAR,Researcher.date_of_birth,NOW()) < 40 GROUP BY Researcher.Researcher_id order by COUNT(*) DESC;";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Researcher_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['age']?></td>
            <td><?php echo $row['cnt']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
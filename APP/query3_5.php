<!doctype html>
<html>
   <head>
        <title>Συχνές Ερωτήσεις</title>
    </head>
    <body>
         <h1 align="center">Ποιά είναι τα 5 ζεύγη πεδίων που μοιράστηκαν ιστορικά τις περισσότερες επιχορηγήσεις;</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>Ερευνητικό πεδίο 1</th>
         <th>Ερευνητικό πεδίο 2</th>
         <th>Συνολική επιχορήγηση</th>
        
        


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "with temp2(Field1, Field2,TotalBudget) as (with temp(Project_id,F1,F2) as (select Pr.Project_id, Pr.Field_id ,P.Field_id from (Projects_has_Field as P join Projects_has_Field as Pr on Pr.Project_id = P.Project_id) where (Pr.Field_id < P.Field_id)) select temp.F1, temp.F2, sum(Budget) from temp join Projects on temp.Project_id = Projects.Project_id group by temp.F1, temp.F2) select f1.name as Field_1, f2.name as Field_2, temp2.TotalBudget as Total_Budget from temp2 join (Field as f1 join Field as f2 on f1.Field_id < f2.Field_id) on f1.Field_id = temp2.Field1 and f2.Field_id = temp2.Field2 order by temp2.TotalBudget DESC LIMIT 5;";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Field_1']?></td>
            <td><?php echo $row['Field_2']?></td>
            <td><?php echo $row['Total_Budget']. "€"?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
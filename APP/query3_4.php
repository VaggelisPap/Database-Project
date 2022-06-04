<!doctype html>
<html>
   <head>
        <title>Συχνές Ερωτήσεις</title>
    </head>
    <body>
         <h1 align="center">Ποιοι οργανισμοί έχουν λάβει τον ίδιο αριθμό έργων/ επιχορηγήσεων για δύο χρόνια, με τουλάχιστον 10 επιχορηγήσεις ετησίως;</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Όνομα</th>
         <th>Πρώτη χρονία</th>
         <th>Δεύτερη χρονία</th>
         <th>Αριθμός έργων</th>
        
        


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "with temp as(select Organization.Organization_id as org, Organization.name as name, YEAR(Projects.start_date) as year, COUNT(*) as cnt from (Projects join Organization on Projects.Organization_id = Organization.Organization_id) group by Organization.Organization_id, YEAR(Projects.start_date) order by Organization.Organization_id, YEAR(Projects.start_date)) select t1.org, t1.name, t1.year as Str, t2.year as end, t1.cnt from temp as t1, temp as t2 where t1.year = t2.year -1  and t1.cnt = t2.cnt and t2.cnt > 9 and t1.org = t2.org order by t1.org, t1.year;";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['org']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['Str']?></td>
            <td><?php echo $row['end']?></td>
            <td><?php echo $row['cnt']?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
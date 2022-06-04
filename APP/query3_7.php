<!doctype html>
<html>
   <head>
        <title>Συχνές Ερωτήσεις</title>
    </head>
    <body>
         <h1 align="center">Ποιά είναι τα στελέχη που δουλεύουν για το ΕΛ.ΙΔ.Ε.Κ. που έχουν δώσει το μεγαλύτερο ποσό χρημάτων σε μια εταιρεία;</h1>
         <table border = "1" align="center" style="line-height:25px;">
         <tr>
         <th>ID</th>
         <th>Όνομα</th>
         <th>Επίθετο</th>
         <th>Συνολικό ποσό</th>
        
        


        <?php

        include 'connection.php';
        $conn = OpenConn();

        $sql = "select Executive.Executive_id, Executive.first_name, Executive.last_name, SUM(Projects.Budget) as sm from (Executive join Projects on Projects.Executive_id = Executive.Executive_id) join Organization on Organization.Organization_id = Projects.Organization_id where Organization.Type = 'FIRM' group by Executive.Executive_id order by SUM(Projects.Budget) DESC;";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><?php echo $row['Executive_id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['sm'] . "€"?></td>
            </tr>
            <?php

            
            
        }

        ?>
        </table>
    </body>
</html>
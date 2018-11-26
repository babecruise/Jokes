<?php 

$conn = mysqli_connect("localhost", "root", "Green200%", "jokes");
//insert
        if(!$conn) {
            die("Connection failed:". mysqli_connect_error($conn));
            }

 $sql = "SELECT joke_id,  SUM(rating) AS total , COUNT(rating)  as count,
 SUM(rating)/COUNT(rating) as total_rating FROM review
 INNER JOIN jokes ON review.jokes_id=jokes.id
 GROUP BY joke_id ORDER BY total_rating DESC
 LIMIT 10";

$result = mysqli_query($conn, $sql); 

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id']. " ".$row["task"];

}

?>
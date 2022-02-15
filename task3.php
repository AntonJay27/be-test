<?php

  // ================================================================>
  // Task 3.1 (sql injection)
  // ================================================================>
  // Answer : website.com?x=1' OR 'test'='test 


  // ================================================================>
  // Task 3.2 & 3.3
  // ================================================================>
  // Answer :

  $sql = "SELECT short_description,article FROM news WHERE id=?"; 
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("i", $_GET['x']);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc()) 
    {
      echo $row['short_description'];
      echo $row['article'];
    }
  } 
  else 
  {
    header("HTTP/1.0 404 Not Found");
  }
  
?>
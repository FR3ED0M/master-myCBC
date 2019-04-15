<!doctype HTML5>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>myCBC</title>
  <meta name="description" content="myCBC">
  <meta name="author" content="Here Before There">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <link rel="stylesheet" href="css/table.css">

</head>

<body>

  <!-- <script src="js/scripts.js"></script> -->

<div class="container">
  <div class="section-title">
    <h2>Comic Book Database</h2>
  </div>
</div>

<!-- <button type="button" class="btn btn-success">Add Comic Book</button> -->


<!-- <div id="pricing-table" class="clear">
  <div class="plan">
      <h3>Enterprise<span>$59</span></h3>
      <a class="signup" href="">Sign up</a>         
      <ul>
        <li><b>10GB</b> Disk Space</li>
        <li><b>100GB</b> Monthly Bandwidth</li>
        <li><b>20</b> Email Accounts</li>
        <li><b>Unlimited</b> subdomains</li>			
      </ul> 
    </div>
</div> -->



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Publisher</th>
      <th scope="col">Title</th>
      <th scope="col">Issue Date</th>
      <th scope="col">Issue Number</th>
      <th scope="col">Barcode</th>
      <th scope="col">Issue Cost</th>
      <th scope="col">Condition</th>
      <th scope="col">Cover</th>
    </tr>
  </thead>
  <tbody>
  
    

    <?php
      include("js/dbconnection.php");

      $sql = "SELECT * FROM `myCBC` WHERE 1";
    
      $result = $conn->query($sql) or die($conn->error);
      
     
      while($row = $result->fetch_assoc()) {

        echo
          "<tr>
            <td>".$row['Publisher']."</td>".
            "<td>".$row['Title']."</td>".
            "<td>".$row['iDate']."</td>".
            "<td>".$row['iNumber']."</td>".
            "<td>".$row['Barcode']."</td>".
            "<td>".$row['cPrice']."</td>".
            "<td>".$row['Condition']."</td>".
            "<td>".'<img src="data:image/jpeg;base64,'.base64_encode($row['img']).' "height="150" width="100"/>';"</td>".
          "</tr>\n";
      }
      
      $conn->close();
    ?>
    
  </tbody>
</table>

  </div>
</div>
</section>

</body>
</html>

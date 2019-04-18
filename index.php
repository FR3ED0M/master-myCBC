<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>myCBC</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">
  <link href="css/table.css" rel="stylesheet">
  <link href="css/addComic.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="http://lamp.cse.fau.edu/~lgarcia2013/cbc2">myCBC</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://lamp.cse.fau.edu/~lgarcia2013/cbc2">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="post.html">Sample Post</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/bg1080.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <img src="img/myCBC75_logo.png" alt="">
            <span class="subheading">My Comic Book Collection</span>
          </div>
        </div>
      </div>
    </div>
  </header>

<button class="open-button" onclick="openForm()">Add Comic Book</button>

<div class="form-popup" id="myForm">
  <form action="js/insert.php" method="post" class="form-container" enctype="multipart/form-data">
    
    <label for="tag"><b>Publisher Tag</b></label>
    <input type="text" placeholder="Marvel(101),DC(102),..." name="tag" required>

    <label for="title"><b>Title</b></label>
    <input type="text" placeholder="Enter Title" name="Title" required>

    <label for="subTitle"><b>Sub-Title</b></label>
    <input type="text" placeholder="Enter Sub-Title" name="subTitle" required>

    <label for="iNumber"><b>Issue #</b></label>
    <input type="text" placeholder="Issue #" name="iNumber" required>

    <label for="iDate"><b>Issue Date</b></label>
    <input type="text" placeholder="Example: FEB-1974" name="iDate" required>

    <label for="cPrice"><b>Issue Price</b></label>
    <input type="text" placeholder="$ USD" name="cPrice" required>

    <label for="condTag"><b>Condition</b></label>
    <input type="text" placeholder="NM, VF, FN, VG, GD, FR, PR" name="condTag" required>

    <label for="img"><b>Cover Image</b></label>
    <input type="file" name="img" accept="image/*">
    
    <div id="submit-margin"></div>

    <input type="submit" class="btn" value="Insert">
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
  
</div>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="mx-auto">
        <table>
          <thead>
            <tr>
              <th scope="col">Publisher</th>
              <th scope="col">Title</th>
              <th scope="col">Sub-Title</th>
              <th scope="col">Issue</th>
              <th scope="col">Date</th>
              <th scope="col">Price</th>
              <th scope="col">Condition</th>
              <th scope="col">Cover</th>
            </tr>
          </thead>

          <tbody>
            <?php
              //include("js/insert.php");
              include("js/dbconnection.php");

              $sql = "SELECT bookPublisher.name, Title, subTitle, iNumber, iDate, cPrice, CCondition.value, img
              FROM myCBC LEFT JOIN CCondition on myCBC.condTag = CCondition.vTag LEFT JOIN bookPublisher on myCBC.tag = bookPublisher.pubId";

              $result = $conn->query($sql) or die($conn->error);

              while($row = $result->fetch_assoc()) {

              echo
                "<tr align=center>
                  <td>".$row['name']."</td>".
                  "<td>".$row['Title']."</td>".
                  "<td>".$row['subTitle']."</td>".
                  "<td>".$row['iNumber']."</td>".
                  "<td>".$row['iDate']."</td>".
                  "<td>".$row['cPrice']."</td>".
                  "<td>".$row['value']."</td>".
                  "<td>".'<img src="data:image/jpeg;base64,'.base64_encode($row['img']).' "height="250" width="175"/>';"</td>".
                "</tr>\n";
              }
              $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://github.com/FR3ED0M/master-myCBC">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Applied Databases 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>
  <script src="js/addComic.js"></script>

</body>

</html>
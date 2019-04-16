<!doctype HTML5>
<html lang="en">
	<head>
			
		<meta charset="utf-8">

		<title>myCBC</title>
		<meta name="description" content="myCBC">
		<meta name="author" content="Here Before There">

		<link rel="stylesheet" href="css/styles.css?v=1.0">
		<link rel="stylesheet" href="css/table.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/row.css">

	</head>

	<body>

		<!-- <div class="sidenav">
			<a href="http://lamp.cse.fau.edu/~lgarcia2013/cbc001/">Main</a>
			<a href="#services">Search</a>
		</div> -->

		<!-- <script src="js/scripts.js"></script> -->

		<div class="main">
		<div class="section-title">
			<h2>Comic Book Database</h2>
		</div>
		</div>

		<!-- <button type="button" class="btn btn-success">Add Comic Book</button> -->

		<section>
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

				// echo "<div>".

				// 	"<p>"."hello world!"."</p>"

				// ."</div>";



				include("js/dbconnection.php");

				// $sql = "SELECT * FROM `myCBC` WHERE 1";

				$sql = "SELECT bookPublisher.name, Title, subTitle, iNumber, iDate, cPrice, CCondition.value, img
				FROM myCBC LEFT JOIN CCondition on myCBC.condTag = CCondition.vTag LEFT JOIN bookPublisher on myCBC.tag = bookPublisher.pubId";

				$result = $conn->query($sql) or die($conn->error);


				while($row = $result->fetch_assoc()) {

				echo 

				// "<div id=column style=width:50%>".
					
				// 	"<div id=left style=float:left;width:25%;padding-right:5% class=main>"
				// 	.
				// 		"<p>".'<img src="data:image/jpeg;base64,'.base64_encode($row['img']).' "height="250" width="175"/>'."</p>"
				// 		.
				// 		"<p>".$row['name']."</p>"
				// 		.
				// 		"<p>".$row['Title']."</p>"
				// 		.
				// 		"<p>".$row['subTitle']."</p>"
				// 		.
				// 		"<p>".$row['iNumber']."</p>"
				// 		.
				// 		"<p>".$row['iDate']."</p>"
				// 		.
				// 		"<p>".$row['cPrice']."</p>"
				// 		.
				// 		"<p>".$row['value']."</p>"
				// 	."<br>	
				// 	</div>

				// </div>";

				
					"<tr>
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
		</section>
	</body>
</html>

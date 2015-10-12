<!DOCTYPE HTML>
<html>
  <head>
    <title>Stack Exchange</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
  	</head>
  	<body>
  		<div class="container">
			<h1 class="align-center margin-bot">Simple StackExchange</h1>
			<div class="row">
				<div class = "expanse80 expanseleft10">
					<div class="expanse80">
						<input type= "text" class ="form">
					</div>
					<div class="expanse10">
						<button class="button">Search</button>
					</div>
				</div>
			</div>
			<div class="align-center">
				<p>
					Cannot find what you are looking for? <a class ="text-link" href="addQuestion.php"><orange>Ask here</orange></a>
				</p>
			</div>
			<h2>Recently Asked Question</h2>
			<?php
				$conn = mysqli_connect("localhost","root","","stackExchange");
				// Check connection
				if (mysqli_connect_errno()){
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$sql = "SELECT * FROM question";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo'
							<div class="devider">
								<div class="row">
									<div class="expanse10">
										<h4 class="align-center">'.$row["vote"].'</h4>
										<h4 class="align-center">Votes</h4>
									</div>
									<div class="expanse10">
						';
						$sql2 = "SELECT * FROM answer where QID = '$row[QID]'";
						$result2 = $conn->query($sql2);
						$sumAns = mysqli_num_rows($result2);
						$subContent = substr($row["Content"],0,50);
						$cLen = strlen($row["Content"]);
						$scLen = strlen($subContent);
						if ($cLen > $scLen ) {
							$subContent .="....";
						}
						echo'
										<h4 class="align-center">'.$sumAns.'</h4>
										<h4 class="align-center">Answers</h4>
									</div>
									<div class="expanse80">
										<p><b>
											<a class ="text-link" href="answer.php?id=' . $row["QID"].'">' . $row["Topic"]. '</a>
										</b></p>	
										<br>'.$subContent.'</br>
										<p class = "align-right footer">
											asked by <blue>'.$row["Email"].'</blue> | <a class="text-link" href><orange>edit</orange></a> | <a class="text-link" href><red>delete</red></a>
										</p>
									</div>
								</div>
							</div>
						';
					}
				} else {
					echo "0 results";
				}
			?>
		</div>
  	</body>
</html>
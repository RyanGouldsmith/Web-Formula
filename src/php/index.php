<!DOCTYPE html>
<head>
	<title> Web Formula </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript"src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
	MathJax.Hub.Config({
  tex2jax: {
    inlineMath: [['$','$'], ['\\(','\\)']],
    processEscapes: true
  }
});
	</script>
	
</head>
<body>
	<main>
		<header>
			<h1> Web Forumla </h1>
			<p> Find all your math formula in an easy location </p>
		</header>
		<section> 
			<p> Input into the search function to see the formula </p>
			<form method="get" action ="">
				<input type="text" placeholder="Enter the Forumla" id="formula" name="formula"> </input>
				<input type="Submit"></input>
			</form>
		</section>
		<?php
			include 'dbhandler.php';
			include 'equation.php';
			$connection = new dbhandler();
			if(isset($_GET['formula'])){
				$connection->sanitise_query($_GET['formula']);
				$query = "SELECT EquationName, EquationValue FROM ".$connection->get_table()." WHERE EquationName='".$connection->get_stripped_query()."'";
				$result = $connection->send_query_to_db($query);
				for ($i = 0; $i < count($result); $i++){
					foreach($result[$i] as $key => $value){
						echo "<div id='showequation'>";
							if ($key == "EquationValue"){
								echo"<p>$". $value . "$</p>";
							}			
							else { 
								echo "<p>" . $value . "</p>";
							}
						echo "</div>";	
					}
				}
			}
			$connection->connection->close();
		?>
	</main>
</body>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $this->title; ?></title>

<!-- styles upon styles -->
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/font-awesome.css" rel="stylesheet" />
<link href="css/solid.css" rel="stylesheet" />
<link href="css/stylez.css" rel="stylesheet" />

<!-- facivon -->
<link rel="shortcut icon" href="img/favicon.ico" />

</head>
<body>
<?php
$items = [ 
		'HOME' => 'front/home',
		'ABOUT' => 'front/about',
		'SERVICES' => 'front/services',
		'CONTACT' => 'front/contact',
		'LOCATIONS' => [ 
				'FOO' => '',
				'BAR' => '' 
		] 
];
(new View ( [ 
		'items' => $items 
] ))->renderPartial ( "topbar" );
(new View ( $this->template ["params"] ))->renderPartial ( $this->template ["name"] );
(new View ())->renderPartial ( "footer" );
?>
<!-- scripts -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/underscore.js"></script>
	<script src="js/validator.js"></script>
	<script src="js/topbar-activate.js"></script>
</body>
</html>
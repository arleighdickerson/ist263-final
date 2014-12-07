<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="<?php echo $this->description;?>" />
<meta name="keywords" content="<?php echo implode(",",$this->keywords);?>"/>
<meta name="author" content="<?php echo $this->author;?>" />
<title><?php echo $this->title; ?></title>

<!-- library styles -->
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/font-awesome.css" rel="stylesheet" />
<link href="css/solid.css" rel="stylesheet" />
<!-- library scripts -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/underscore.js"></script>
<script src="js/underscore.string.js"></script>
<script src="js/validator.js"></script>

<!-- my styles -->
<link href="css/stylez.css" rel="stylesheet" />
<link rel="shortcut icon" href="img/favicon.ico" />

<!-- my scripts -->
<script>_.mixin(_.str.exports());</script>
<script src="js/ajaxutil.js"></script>
<script src="js/topbar-activate.js"></script>

</head>
<body>
<?php
$items = [ 
		'HOME' => 'front/home',
		'ABOUT' => 'front/about',
		'SERVICES' => [ ],
		'CONTACT' => 'front/contact' 
];
(new View ( [ 
		'items' => $items 
] ))->renderPartial ( "topbar" );
(new View ( $this->template ["params"] ))->renderPartial ( $this->template ["name"] );
(new View ())->renderPartial ( "footer" );
?>
</body>
</html>
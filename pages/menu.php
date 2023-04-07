<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/menu.css">
      <script src="../javascript/menu.js" defer></script>
    </head>
    
    <body>
        <div class="content">
			<div class="colors">
				
			</div>
			<div id="jquery-accordion-menu" class="jquery-accordion-menu">
				<div class="jquery-accordion-menu-header">MENU</div>
				<ul>
					<li class="active"><a href="./index.php"><i class="fa fa-home"></i>Home </a></li>
					<li><a href="#"><i class="fa fa-cog"></i>Profile </a>
						<ul class="submenu">
							<li><a href="#">Account </a></li>
							<li><a href="#">Change a Password</a></li>
							<li><a href="#">Details</a></li>
						</ul>
					</li>
                    <li class="active"><a href="./index.php"><i class="fa fa-home"></i>About </a></li>
				</ul>
				<div class="jquery-accordion-menu-footer">Footer </div>
			</div>
		</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
    </body>
</html>

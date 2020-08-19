<head>
	<title> Add pizza </title>
<?php   include ('db_connect.php') ; ?>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">



    <style type="text/css">
    	.pizza {

    		width: 150px;
    		margin: 20px auto -30px;
    		display: block;
    			padding: 20px;
    	}

    	form {

    		max-width: 460px;
    		margin: 20px auto;
    		padding: 20px;
    	

    	}

    	.brand{


    		background: #cbb09c !important;
    		
    	}

    	.brand-text{

    		color: #cbb09c !important;
    	}

    	 li{


    	 	float: right;
    	 }
    </style>
</head>

<body class="grey lighten-4">
	
  <nav class ="white z-depth-0">

	<div class ="container">

		<a href="#" class = "brand-logo brand-text">The Pizza Shop</a>
		  <ul id="nav-mobile"  class =""></ul>
		     <li><a href="http://localhost/Learn/add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
		



	</div>




  </nav>


</body>
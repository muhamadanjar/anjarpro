<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Laravel 5</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
					<div class="intro-message">
                        <h1>WebApp</h1>
                        <h3>Muhamad Anjar</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="home" class="btn btn-default btn-lg"> <i class="fa fa-chevron-right"></i> <span class="network-name">Masuk</span></a>
                            </li>
                            <li>
                                <a href="#services" class="btn btn-default btn-lg"><i class="fa fa-question-circle"></i> <span class="network-name">Petunjuk</span></a>
                            </li>
                        </ul>
                    </div>
			</div>
			
		</div>
	</body>
</html>

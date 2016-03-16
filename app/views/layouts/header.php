<html>

<head>
    <link href="/app/views/CSS/style.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="/app/views/JavaScript/ajax_search.js"></script>
    <title>Интернет-магазин учебных работ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="favicon.png" />
</head>
<body>
<header>
    <h1>Интернет-магазин учебных работ</h1>
    <div id="dow"><a href="/cabinet/upload">Загрузить роботу</a>  <a href="/set/catalog">Каталог готовых робот</a></div>
    <div id="auth_user">
        <?php if(isset($_SESSION['name'])){Echo "Здрастуйте,<a href=\"/cabinet/index\">$_SESSION[name]</a>";}
        else { echo '<span>Здраствуйте,</span><a href="/user/login">войдите в систему</a>или <a href="/user/register">Зарегестрируйтесь</a><br/>';} ?>
        <div id="block_id" style="display: none;">
            <div class="container">

            </div>
        </div>
    </div>
</header>
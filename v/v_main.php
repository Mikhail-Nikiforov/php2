<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" />
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Главная</a> |
        <?php
        if ($user) {
            echo '<a href="index.php?c=catalog&act=show">Каталог</a>  | <a href="index.php?c=basket&act=show">Корзина</a> | <a href="index.php?c=User&act=info">Личный кабинет</a> | <a href="index.php?c=User&act=logout">Выйти</a>';
        } else {
            echo '<a href="index.php?c=User&act=auth">Авторизация</a> | <a href="index.php?c=User&act=reg">Регистрация</a>';
        }
        if ($_SESSION['user_status'] == 'admin') {
            echo '| <a href="index.php?c=order&act=show">Управление заказами</a>';
        }
        ?>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
    <script type='text/javascript'>
        <?=$scriptJs?>
    </script>

</body>
</html>

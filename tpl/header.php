<?php include_once '../../../settings/settings.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>PHP Level1. Homeworks</title>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <link href='http://fonts.googleapis.com/css?family=Jura&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['PHP_SELF']; ?>/../../../../css/<?php if(isset($_COOKIE['personal_style'])) { 
																  		echo $_COOKIE['personal_style'];
																  } else {
																  		echo "style";
																  }
															  ?>.css">
							
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--[if lt IE 9]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>

<div id="menu">
	<ul>
		<li class="drop" data-file="menu1">Php 1.0
			<ul style="display: none;">
				<?php 
					for ($i=1; $i <= 8; $i++) { 
						echo '<li><a href="/../../../ШП/php_project/php/lesson' . $i . '/hw' . $i . '/index.php">Homework' . $i . '</a></li>';
					}
				?>
			</ul>
		</li>
		<li class="drop" data-file="menu2">Php 2.0
			<ul style="display: none;">
				<?php 
					for ($i=1; $i <= 8; $i++) { 
						echo '<li><a href="/../../../ШП/php_project/php2/lesson' . $i . '/hw' . $i . '/index.php">Homework' . $i . '</a></li>';
					}
				?>
			</ul>
		</li>
		<li class="drop personal_style" data-file="menu3">
			<ul class="dop_menu">
				<li><a href="/../../../php/logout.php">logout</a></li>
				<li><a href="/../../../php/cookie_clean.php">clean cookie</a></li>
				<li><a href="/../../../php/personal_style/new/style.php">style</a></li>
			</ul>
		</li>
	</ul>
</div>
<?php 
	$php_level = explode('/', $_SERVER['REQUEST_URI']);
	$current_php_level = $php_level[4];
	if ($current_php_level == 'php2'):
?>

<div id="articles_sub_menu">
	<ul>
		<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>/../index.php">Главная</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>/../Admin/all">Администрирование статей</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>/../Articles/new">Добавление статьи</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>/../Articles/one/<?php echo rand(1,4); ?>">Случайная статья</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>/../User/signUp">Регистрация</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>/../User/signIn">Вход</a></li>
	</ul>
</div>

<?php endif; ?>

<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>

<script>
    $(function(){
        $('#menu ul li').hover(
            function() {
                if ($(this).find('ul').length == 0) {
                    // var file = $(this).data('file');
                    var li = $(this);
                    $.ajax({
                        url: '../ajax/' + file + '.html',
                        beforeSend: function(){
                             li.addClass('loading');
                        },
                        success: function(data){
                             li.append(data);
                             li.find('ul').stop(true, true);
                             li.find('ul').slideDown();
                             li.removeClass('loading');
                        }
                    });
                } else {
                    $(this).find('ul').stop(true, true);
                    $(this).find('ul').slideDown();
                }
                $(this).addClass("active");
            },
            function() {
                $(this).find('ul').slideUp(600);
                $(this).removeClass("active");
            }
        );
    });
</script>
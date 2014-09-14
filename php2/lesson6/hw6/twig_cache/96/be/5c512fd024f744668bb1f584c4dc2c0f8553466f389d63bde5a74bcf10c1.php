<?php

/* header.php */
class __TwigTemplate_96be5c512fd024f744668bb1f584c4dc2c0f8553466f389d63bde5a74bcf10c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php include_once '../../../settings/settings.php'; ?>
<!doctype html>
<html lang=\"en\">
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
  <title>PHP Level1. Homeworks</title>
  <link rel=\"shortcut icon\" href=\"../img/favicon.ico\">
  <link href='http://fonts.googleapis.com/css?family=Jura&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
  <link rel=\"stylesheet\" type=\"text/css\" href=\"/ШП/git/php_study_project/php2/lesson6/hw6/index.php/../../../../css/style.css\">
\t\t\t\t\t\t\t
  <script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
\t<!--[if lt IE 9]>
\t  <script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
\t<![endif]-->
</head>

<body>

<div id=\"menu\">
\t<ul>
\t\t<li class=\"drop\" data-file=\"menu1\">Php 1.0
\t\t\t<ul style=\"display: none;\">
\t\t\t\t";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 8));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 24
            echo "\t\t\t\t\t\t<li><a href=\"/../../../ШП/php_project/php/lesson";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "/hw";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "/index.php\">Homework";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "\t\t\t</ul>
\t\t</li>
\t\t<li class=\"drop\" data-file=\"menu2\">Php 2.0
\t\t\t<ul style=\"display: none;\">
\t\t\t\t";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 8));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 31
            echo "\t\t\t\t\t<li><a href=\"/../../../ШП/php_project/php2/lesson";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "/hw";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "/index.php\">Homework";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "\t\t\t</ul>
\t\t</li>
\t\t<li class=\"drop personal_style\" data-file=\"menu3\">
\t\t\t<ul class=\"dop_menu\">
\t\t\t\t<li><a href=\"/../../../php/logout.php\">logout</a></li>
\t\t\t\t<li><a href=\"/../../../php/cookie_clean.php\">clean cookie</a></li>
\t\t\t\t<li><a href=\"/../../../php/personal_style/new/style.php\">style</a></li>
\t\t\t</ul>
\t\t</li>
\t</ul>
</div>
<?php 
\t\$php_level = explode('/', \$_SERVER['REQUEST_URI']);
\t\$current_php_level = \$php_level[4];
\tif (\$current_php_level == 'php2'):
?>

<div id=\"articles_sub_menu\">
\t<ul>
\t\t<li><a href=\"<?php echo \$_SERVER['PHP_SELF'] ?>/Articles/all\">Главная</a></li>
\t\t<li><a href=\"<?php echo \$_SERVER['PHP_SELF'] ?>/Admin/all\">Администрирование статей</a></li>
\t\t<li><a href=\"<?php echo \$_SERVER['PHP_SELF'] ?>/Articles/new\">Добавление статьи</a></li>
\t\t<li><a href=\"<?php echo \$_SERVER['PHP_SELF'] ?>/Articles/one/<?php echo rand(1,4); ?>\">Случайная статья</a></li>
\t\t<li><a href=\"<?php echo \$_SERVER['PHP_SELF'] ?>/User/signUp\">Регистрация</a></li>
\t\t<li><a href=\"<?php echo \$_SERVER['PHP_SELF'] ?>/User/signIn\">Вход</a></li>
\t</ul>
</div>

<?php endif; ?>

<script type=\"text/javascript\" src=\"../../js/jquery-1.11.1.min.js\"></script>

<script>
    \$(function(){
        \$('#menu ul li').hover(
            function() {
                if (\$(this).find('ul').length == 0) {
                    // var file = \$(this).data('file');
                    var li = \$(this);
                    \$.ajax({
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
                    \$(this).find('ul').stop(true, true);
                    \$(this).find('ul').slideDown();
                }
                \$(this).addClass(\"active\");
            },
            function() {
                \$(this).find('ul').slideUp(600);
                \$(this).removeClass(\"active\");
            }
        );
    });
</script>";
    }

    public function getTemplateName()
    {
        return "header.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 33,  70 => 31,  66 => 30,  60 => 26,  47 => 24,  43 => 23,  46 => 9,  37 => 6,  33 => 5,  29 => 4,  26 => 3,  21 => 2,  19 => 1,);
    }
}

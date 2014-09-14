<?php

/* SingleArticle.twig */
class __TwigTemplate_f83311f700510720f8f104fe0a35fa82a4cbd9da6e1dfbea3e7da566fce9eb86 extends Twig_Template
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
        $this->env->loadTemplate("header.php")->display($context);
        // line 2
        echo "\t<div class=\"article\">
\t\t<h2>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "title"), "html", null, true);
        echo "</h2>
\t\t<p>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "content"), "html", null, true);
        echo "</p>
\t\t<p>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")), "posted_date"), "html", null, true);
        echo "</p>
\t</div>
";
        // line 7
        $this->env->loadTemplate("footer.php")->display($context);
    }

    public function getTemplateName()
    {
        return "SingleArticle.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  32 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}

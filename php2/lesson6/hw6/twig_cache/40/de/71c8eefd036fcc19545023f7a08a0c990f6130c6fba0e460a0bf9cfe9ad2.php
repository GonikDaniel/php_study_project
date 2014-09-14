<?php

/* AllArticles.twig */
class __TwigTemplate_40de71c8eefd036fcc19545023f7a08a0c990f6130c6fba0e460a0bf9cfe9ad2 extends Twig_Template
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
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["template"]) ? $context["template"] : $this->getContext($context, "template")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            echo "\t\t<div class=\"article\">
\t\t\t<h2>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "title"), "html", null, true);
            echo "</h2>
\t\t\t<p>";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "content"), "html", null, true);
            echo "</p>
\t\t\t<p>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "posted_date"), "html", null, true);
            echo "</p>
\t\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        $this->env->loadTemplate("footer.php")->display($context);
    }

    public function getTemplateName()
    {
        return "AllArticles.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 9,  37 => 6,  33 => 5,  29 => 4,  26 => 3,  21 => 2,  19 => 1,);
    }
}

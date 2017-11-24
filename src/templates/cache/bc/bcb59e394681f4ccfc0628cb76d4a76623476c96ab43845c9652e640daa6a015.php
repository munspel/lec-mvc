<?php

/* layouts/index.tpl.html */
class __TwigTemplate_429fb56ccebf1a67cff02cff5aa5027d9402aa922f32227adcaa168d065a9e1d extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>";
        // line 4
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    </head>
    <body>
        <div>";
        // line 9
        echo twig_escape_filter($this->env, ($context["content"] ?? null), "html", null, true);
        echo "</div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "layouts/index.tpl.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 9,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layouts/index.tpl.html", "D:\\NewOpenServer\\OpenServer\\domains\\lec-mvc\\src\\templates\\layouts\\index.tpl.html");
    }
}

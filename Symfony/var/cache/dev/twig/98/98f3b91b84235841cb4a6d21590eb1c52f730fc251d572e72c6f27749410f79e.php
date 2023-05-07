<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* homepage/index.html.twig */
class __TwigTemplate_ed21177667359f1aae7fddcc6bf234ea8aba26d7329bb59fc43e3dc8c653d6f7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "homepage/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "homepage/index.html.twig"));

        // line 1
        echo "<style>
  /* Set background color of navbar */
  .navbar {
    background-color: rgb(187, 0, 0);
  }
  
  /* Set color of text in navbar */
  .navbar a {
    color: #fff;
  }
</style>

<style>
  /* Set color of text in navbar */
  .navbar{
    background-color: rgb(187, 0, 0);
    color: #fff;
    height: 70px;
    display: flex;
    justify-content: center;
    justify-content: flex-start;
    align-items: center;
  }

  body{
  margin: 0;
}

.navlink{
  color: white;
  font-size: 2rem;
  font-family: Helvetica;
  text-decoration:none;
  margin: 0 30px;
}

.right{
  margin-left: auto;
}
</style>

<nav class=\"navbar navbar-expand-lg\">
    <a class=\"navlink\" href=\"";
        // line 43
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage");
        echo "\">
        <img src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/fy.png"), "html", null, true);
        echo "\" style = \"width: 160px;height: auto;\" class = \"main\">  
    </a>
    
    <a href=\"#\" class=\"navlink\">About</a>
    <a href=\"#\" class=\"navlink\">Contact</a>
    <div class=\"right\">
        <a href=\"#\" class=\"navlink\">Log In</a>
        <a href=\"#\" class=\"navlink\">Sign Up</a>
    </div>
    
</nav>

";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "homepage/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 44,  87 => 43,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<style>
  /* Set background color of navbar */
  .navbar {
    background-color: rgb(187, 0, 0);
  }
  
  /* Set color of text in navbar */
  .navbar a {
    color: #fff;
  }
</style>

<style>
  /* Set color of text in navbar */
  .navbar{
    background-color: rgb(187, 0, 0);
    color: #fff;
    height: 70px;
    display: flex;
    justify-content: center;
    justify-content: flex-start;
    align-items: center;
  }

  body{
  margin: 0;
}

.navlink{
  color: white;
  font-size: 2rem;
  font-family: Helvetica;
  text-decoration:none;
  margin: 0 30px;
}

.right{
  margin-left: auto;
}
</style>

<nav class=\"navbar navbar-expand-lg\">
    <a class=\"navlink\" href=\"{{ path('homepage') }}\">
        <img src=\"{{ asset('resources/fy.png') }}\" style = \"width: 160px;height: auto;\" class = \"main\">  
    </a>
    
    <a href=\"#\" class=\"navlink\">About</a>
    <a href=\"#\" class=\"navlink\">Contact</a>
    <div class=\"right\">
        <a href=\"#\" class=\"navlink\">Log In</a>
        <a href=\"#\" class=\"navlink\">Sign Up</a>
    </div>
    
</nav>

", "homepage/index.html.twig", "C:\\Users\\ASUS\\FirstProject\\templates\\homepage\\index.html.twig");
    }
}

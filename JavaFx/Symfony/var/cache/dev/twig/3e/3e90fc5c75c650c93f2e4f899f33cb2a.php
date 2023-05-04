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

/* utilisateur/profile.html.twig */
class __TwigTemplate_b031b412470f9550aac159ea97257efa extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'contentblock' => [$this, 'block_contentblock'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "baseFront.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/profile.html.twig"));

        $this->parent = $this->loadTemplate("baseFront.html.twig", "utilisateur/profile.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_contentblock($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contentblock"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contentblock"));

        // line 5
        echo "
\t<section id=\"cta\" class=\"cta\">
\t\t<div class=\"container\" data-aos=\"zoom-in\">

\t\t\t<div class=\"text-center\">
\t\t\t\t<img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 10, $this->source); })()), "user", [], "any", false, false, false, 10), "ImagePath", [], "any", false, false, false, 10))), "html", null, true);
        echo "\" alt=\"cta\" class=\"img-fluid\" height=\"200\" width=\"200\" style=\"border-radius: 10%; margin-bottom: 30px;\">
\t\t\t\t";
        // line 11
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "user", [], "any", false, false, false, 11), "Role", [], "any", false, false, false, 11) == "Freelancer")) {
            // line 12
            echo "\t\t\t\t<h1 style=\"color: #fff;\">";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "user", [], "any", false, false, false, 12), "name", [], "any", false, false, false, 12)), "html", null, true);
            echo "
\t\t\t\t\t";
            // line 13
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "user", [], "any", false, false, false, 13), "lastname", [], "any", false, false, false, 13)), "html", null, true);
            echo "</h1>
\t\t\t\t";
        }
        // line 15
        echo "\t\t\t\t";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "user", [], "any", false, false, false, 15), "Role", [], "any", false, false, false, 15) == "Entreprise")) {
            // line 16
            echo "\t\t\t\t<h1 style=\"color: #fff;\">";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 16, $this->source); })()), "user", [], "any", false, false, false, 16), "name", [], "any", false, false, false, 16)), "html", null, true);
            echo "</h1>
\t\t\t\t";
        }
        // line 18
        echo "\t\t\t\t<h2 style=\"color: #fff;\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "user", [], "any", false, false, false, 18), "username", [], "any", false, false, false, 18), "html", null, true);
        echo "</h2>
\t\t\t\t<h3 style=\"color: #fff;\">";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "user", [], "any", false, false, false, 19), "email", [], "any", false, false, false, 19), "html", null, true);
        echo "</h3>
\t\t\t\t<a id=\"showMore\" class=\"cta-btn\" href=\"#pricing\">
\t\t\t\t\tshow more
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>

\t</section>


\t<!-- ======= Pricing Section ======= -->
\t<section id=\"pricing\" class=\"pricing\" style=\"display:none;\">
\t\t<br>
\t\t<br>
\t\t<div class=\"section-title\">
\t\t\t<span>Details</span>
\t\t\t<h2>Details</h2>
\t\t</div>

\t\t";
        // line 38
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "Role", [], "any", false, false, false, 38) == "Freelancer")) {
            // line 39
            echo "\t\t<div class=\"red-container\">
\t\t\t<h1 style=\"color: #000;\">";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 40, $this->source); })()), "user", [], "any", false, false, false, 40), "bio", [], "any", false, false, false, 40), "html", null, true);
            echo "</h1>


\t\t\t<h1 style=\"color: #fff;\">Education</h1>
\t\t\t<h2 class=\"username\">";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 44, $this->source); })()), "user", [], "any", false, false, false, 44), "education", [], "any", false, false, false, 44), "html", null, true);
            echo "</h2>


\t\t\t<h1 style=\"color: #fff;\">Experience</h1>
\t\t\t<h2 class=\"username\">
\t\t\t\t";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "user", [], "any", false, false, false, 49), "experience", [], "any", false, false, false, 49), "html", null, true);
            echo "
\t\t\t</h2>


\t\t\t
\t\t\t<div class=\"rating\">
\t\t\t\t<i class=\"bi bi-star-fill\"></i>
\t\t\t\t<span class=\"rating-number\">
\t\t\t\t\t";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 57, $this->source); })()), "user", [], "any", false, false, false, 57), "rating", [], "any", false, false, false, 57), "html", null, true);
            echo "/20
\t\t\t\t</span>
\t\t\t\t<i class=\"bi bi-stack\"></i>
\t\t\t\t<span class=\"job-number\">";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 60, $this->source); })()), "user", [], "any", false, false, false, 60), "totaljobs", [], "any", false, false, false, 60), "html", null, true);
            echo " Jobs</span>
\t\t\t</div>

\t\t\t<div class=\"containertwobtns\">
\t\t\t\t<a href =\"";
            // line 64
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editProfile", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 64, $this->source); })()), "user", [], "any", false, false, false, 64), "id", [], "any", false, false, false, 64)]), "html", null, true);
            echo "\">
\t\t\t\t<button class=\"btnEdit\">Edit</button>
\t\t\t\t</a>
\t\t\t\t<button id=\"showLess\" class=\"btnEdit\" href=\"#cta\">
\t\t\t\t\tSHOW LESS
\t\t\t\t</button>
\t\t\t</div>


\t\t</div>
\t\t";
        }
        // line 75
        echo "
\t\t";
        // line 76
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 76, $this->source); })()), "user", [], "any", false, false, false, 76), "role", [], "any", false, false, false, 76) == "Entreprise")) {
            // line 77
            echo "
\t\t<div class=\"red-container\">
\t\t<h1 style=\"color: #fff;\">Domaine</h1>
\t\t\t<h2 class= username>";
            // line 80
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "user", [], "any", false, false, false, 80), "domaine", [], "any", false, false, false, 80), "html", null, true);
            echo "</h2>


\t\t\t<h1 style=\"color: #fff;\">Info</h1>
\t\t\t<h2 class=\"username\">";
            // line 84
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "user", [], "any", false, false, false, 84), "info", [], "any", false, false, false, 84), "html", null, true);
            echo "</h2>


\t\t\t<h1 style=\"color: #fff;\">Location</h1>
\t\t\t<h2 class=\"username\">
\t\t\t\t";
            // line 89
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 89, $this->source); })()), "user", [], "any", false, false, false, 89), "location", [], "any", false, false, false, 89), "html", null, true);
            echo "
\t\t\t</h2>


\t\t\t
\t\t\t<div class=\"rating\">
\t\t\t\t<i class=\"bi bi-people-fill\"></i>
\t\t\t\t<span class=\"rating-number\">
\t\t\t\t\t";
            // line 97
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 97, $this->source); })()), "user", [], "any", false, false, false, 97), "nbe", [], "any", false, false, false, 97), "html", null, true);
            echo " employees
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div class=\"containertwobtns\">
\t\t\t\t<a href =\"";
            // line 102
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_editProfile", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 102, $this->source); })()), "user", [], "any", false, false, false, 102), "id", [], "any", false, false, false, 102)]), "html", null, true);
            echo "\">
\t\t\t\t<button class=\"btnEdit\">Edit</button>
\t\t\t\t</a>
\t\t\t\t<button id=\"showLess\" class=\"btnEdit\" href=\"#cta\">
\t\t\t\t\tshow less
\t\t\t\t</button>
\t\t\t</div>


\t\t</div>
\t\t";
        }
        // line 113
        echo "
\t</section>


\t<script>
\t\tvar showbtn = document.querySelector('#showMore');
showbtn.addEventListener('click', function () {
var redContainer = document.querySelector('.pricing');
redContainer.style.display = 'block';
});

var lessbtn = document.querySelector('#showLess');
lessbtn.addEventListener('click', function () {
var redContainer = document.querySelector('.pricing');
redContainer.style.display = 'none';
document.querySelector('#cta').scrollIntoView({ behavior: 'smooth' });
});
\t</script>


\t<style>
\t\t.containertwobtns {
\t\t\tdisplay: flex;
\t\t\tjustify-content: space-between;
\t\t\talign-items: center;
\t\t}
\t\t.red-container {
\t\t\tbackground-color: #cc1616;
\t\t\tpadding: 10px;
\t\t\tborder-radius: 5px;
\t\t\twidth: 1000px;
\t\t\tmargin: 0 auto;
\t\t\tdisplay: flex;
\t\t\tflex-direction: column;
\t\t\talign-items: center;
\t\t}

\t\t.username {
\t\t\tcolor: #000;
\t\t\tfont-size: 24px;
\t\t\tfont-weight: bold;
\t\t\tmargin-bottom: 10px;
\t\t}

\t\t.email {
\t\t\tfont-size: 18px;
\t\t\tmargin-bottom: 10px;
\t\t}

\t\t.bio {
\t\t\tfont-size: 16px;
\t\t\tline-height: 1.5;
\t\t\tmargin-bottom: 20px;
\t\t}

\t\t.section-title {
\t\t\tfont-size: 20px;
\t\t\tfont-weight: bold;
\t\t\tmargin-bottom: 10px;
\t\t}

\t\t.education,
\t\t.experience {
\t\t\tmargin-bottom: 20px;
\t\t}

\t\t.education h3,
\t\t.experience h3 {
\t\t\tfont-size: 18px;
\t\t\tmargin-bottom: 10px;
\t\t}

\t\t.education p,
\t\t.experience p {
\t\t\tfont-size: 16px;
\t\t\tline-height: 1.5;
\t\t\tmargin-bottom: 5px;
\t\t}
\t\t.rating {
\t\t\tdisplay: flex;
\t\t\tjustify-content: center;
\t\t\talign-items: center;
\t\t\tmargin-top: 20px;
\t\t}

\t\t.rating i {
\t\t\tfont-size: 24px;
\t\t\tmargin: 0 10px;
\t\t}

\t\t.rating span {
\t\t\tfont-size: 16px;
\t\t}
\t\t.btnEdit {
\t\t\tbackground-color: black;
\t\t\tcolor: white;
\t\t\twidth: 150px; /* fixed width */
\t\t\tborder: none;
\t\t\tpadding: 10px;
\t\t\tborder-radius: 5px;
\t\t\tmargin-top: 20px;
\t\t\tfont-size: 16px;
\t\t\tcursor: pointer;
\t\t\tmargin-right: 10px;
\t\t}

\t\t.btnEdit:hover {
\t\t\tbackground-color: white;
\t\t\tcolor: black;
\t\t}
\t</style>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "utilisateur/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 113,  229 => 102,  221 => 97,  210 => 89,  202 => 84,  195 => 80,  190 => 77,  188 => 76,  185 => 75,  171 => 64,  164 => 60,  158 => 57,  147 => 49,  139 => 44,  132 => 40,  129 => 39,  127 => 38,  105 => 19,  100 => 18,  94 => 16,  91 => 15,  86 => 13,  81 => 12,  79 => 11,  75 => 10,  68 => 5,  58 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'baseFront.html.twig' %}


{% block contentblock %}

\t<section id=\"cta\" class=\"cta\">
\t\t<div class=\"container\" data-aos=\"zoom-in\">

\t\t\t<div class=\"text-center\">
\t\t\t\t<img src=\"{{ asset('' ~ app.user.ImagePath) }}\" alt=\"cta\" class=\"img-fluid\" height=\"200\" width=\"200\" style=\"border-radius: 10%; margin-bottom: 30px;\">
\t\t\t\t{% if app.user.Role == 'Freelancer' %}
\t\t\t\t<h1 style=\"color: #fff;\">{{ app.user.name|upper }}
\t\t\t\t\t{{ app.user.lastname|upper }}</h1>
\t\t\t\t{% endif %}
\t\t\t\t{% if app.user.Role == 'Entreprise' %}
\t\t\t\t<h1 style=\"color: #fff;\">{{ app.user.name|upper }}</h1>
\t\t\t\t{% endif %}
\t\t\t\t<h2 style=\"color: #fff;\">{{app.user.username}}</h2>
\t\t\t\t<h3 style=\"color: #fff;\">{{app.user.email}}</h3>
\t\t\t\t<a id=\"showMore\" class=\"cta-btn\" href=\"#pricing\">
\t\t\t\t\tshow more
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>

\t</section>


\t<!-- ======= Pricing Section ======= -->
\t<section id=\"pricing\" class=\"pricing\" style=\"display:none;\">
\t\t<br>
\t\t<br>
\t\t<div class=\"section-title\">
\t\t\t<span>Details</span>
\t\t\t<h2>Details</h2>
\t\t</div>

\t\t{% if app.user.Role == 'Freelancer' %}
\t\t<div class=\"red-container\">
\t\t\t<h1 style=\"color: #000;\">{{app.user.bio}}</h1>


\t\t\t<h1 style=\"color: #fff;\">Education</h1>
\t\t\t<h2 class=\"username\">{{app.user.education}}</h2>


\t\t\t<h1 style=\"color: #fff;\">Experience</h1>
\t\t\t<h2 class=\"username\">
\t\t\t\t{{app.user.experience}}
\t\t\t</h2>


\t\t\t
\t\t\t<div class=\"rating\">
\t\t\t\t<i class=\"bi bi-star-fill\"></i>
\t\t\t\t<span class=\"rating-number\">
\t\t\t\t\t{{app.user.rating}}/20
\t\t\t\t</span>
\t\t\t\t<i class=\"bi bi-stack\"></i>
\t\t\t\t<span class=\"job-number\">{{app.user.totaljobs}} Jobs</span>
\t\t\t</div>

\t\t\t<div class=\"containertwobtns\">
\t\t\t\t<a href =\"{{ path('app_utilisateur_editProfile', {'id': app.user.id}) }}\">
\t\t\t\t<button class=\"btnEdit\">Edit</button>
\t\t\t\t</a>
\t\t\t\t<button id=\"showLess\" class=\"btnEdit\" href=\"#cta\">
\t\t\t\t\tSHOW LESS
\t\t\t\t</button>
\t\t\t</div>


\t\t</div>
\t\t{% endif %}

\t\t{% if app.user.role == 'Entreprise' %}

\t\t<div class=\"red-container\">
\t\t<h1 style=\"color: #fff;\">Domaine</h1>
\t\t\t<h2 class= username>{{app.user.domaine}}</h2>


\t\t\t<h1 style=\"color: #fff;\">Info</h1>
\t\t\t<h2 class=\"username\">{{app.user.info}}</h2>


\t\t\t<h1 style=\"color: #fff;\">Location</h1>
\t\t\t<h2 class=\"username\">
\t\t\t\t{{app.user.location}}
\t\t\t</h2>


\t\t\t
\t\t\t<div class=\"rating\">
\t\t\t\t<i class=\"bi bi-people-fill\"></i>
\t\t\t\t<span class=\"rating-number\">
\t\t\t\t\t{{app.user.nbe}} employees
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div class=\"containertwobtns\">
\t\t\t\t<a href =\"{{ path('app_utilisateur_editProfile', {'id': app.user.id}) }}\">
\t\t\t\t<button class=\"btnEdit\">Edit</button>
\t\t\t\t</a>
\t\t\t\t<button id=\"showLess\" class=\"btnEdit\" href=\"#cta\">
\t\t\t\t\tshow less
\t\t\t\t</button>
\t\t\t</div>


\t\t</div>
\t\t{% endif %}

\t</section>


\t<script>
\t\tvar showbtn = document.querySelector('#showMore');
showbtn.addEventListener('click', function () {
var redContainer = document.querySelector('.pricing');
redContainer.style.display = 'block';
});

var lessbtn = document.querySelector('#showLess');
lessbtn.addEventListener('click', function () {
var redContainer = document.querySelector('.pricing');
redContainer.style.display = 'none';
document.querySelector('#cta').scrollIntoView({ behavior: 'smooth' });
});
\t</script>


\t<style>
\t\t.containertwobtns {
\t\t\tdisplay: flex;
\t\t\tjustify-content: space-between;
\t\t\talign-items: center;
\t\t}
\t\t.red-container {
\t\t\tbackground-color: #cc1616;
\t\t\tpadding: 10px;
\t\t\tborder-radius: 5px;
\t\t\twidth: 1000px;
\t\t\tmargin: 0 auto;
\t\t\tdisplay: flex;
\t\t\tflex-direction: column;
\t\t\talign-items: center;
\t\t}

\t\t.username {
\t\t\tcolor: #000;
\t\t\tfont-size: 24px;
\t\t\tfont-weight: bold;
\t\t\tmargin-bottom: 10px;
\t\t}

\t\t.email {
\t\t\tfont-size: 18px;
\t\t\tmargin-bottom: 10px;
\t\t}

\t\t.bio {
\t\t\tfont-size: 16px;
\t\t\tline-height: 1.5;
\t\t\tmargin-bottom: 20px;
\t\t}

\t\t.section-title {
\t\t\tfont-size: 20px;
\t\t\tfont-weight: bold;
\t\t\tmargin-bottom: 10px;
\t\t}

\t\t.education,
\t\t.experience {
\t\t\tmargin-bottom: 20px;
\t\t}

\t\t.education h3,
\t\t.experience h3 {
\t\t\tfont-size: 18px;
\t\t\tmargin-bottom: 10px;
\t\t}

\t\t.education p,
\t\t.experience p {
\t\t\tfont-size: 16px;
\t\t\tline-height: 1.5;
\t\t\tmargin-bottom: 5px;
\t\t}
\t\t.rating {
\t\t\tdisplay: flex;
\t\t\tjustify-content: center;
\t\t\talign-items: center;
\t\t\tmargin-top: 20px;
\t\t}

\t\t.rating i {
\t\t\tfont-size: 24px;
\t\t\tmargin: 0 10px;
\t\t}

\t\t.rating span {
\t\t\tfont-size: 16px;
\t\t}
\t\t.btnEdit {
\t\t\tbackground-color: black;
\t\t\tcolor: white;
\t\t\twidth: 150px; /* fixed width */
\t\t\tborder: none;
\t\t\tpadding: 10px;
\t\t\tborder-radius: 5px;
\t\t\tmargin-top: 20px;
\t\t\tfont-size: 16px;
\t\t\tcursor: pointer;
\t\t\tmargin-right: 10px;
\t\t}

\t\t.btnEdit:hover {
\t\t\tbackground-color: white;
\t\t\tcolor: black;
\t\t}
\t</style>

{% endblock %}
", "utilisateur/profile.html.twig", "C:\\Users\\Firas\\Desktop\\TestUser\\templates\\utilisateur\\profile.html.twig");
    }
}

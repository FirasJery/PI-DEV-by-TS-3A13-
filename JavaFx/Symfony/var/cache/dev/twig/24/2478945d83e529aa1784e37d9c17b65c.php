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

/* utilisateur/show.html.twig */
class __TwigTemplate_862d8d5a9580b4bf2b957822b359dc40 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'contentblock' => [$this, 'block_contentblock'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "baseBack.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/show.html.twig"));

        $this->parent = $this->loadTemplate("baseBack.html.twig", "utilisateur/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "User";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_contentblock($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contentblock"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contentblock"));

        // line 6
        echo "    <h1>User</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Name</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 12, $this->source); })()), "name", [], "any", false, false, false, 12), "html", null, true);
        echo "</td>
            </tr>
             <tr>
                <th>Email</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 16, $this->source); })()), "email", [], "any", false, false, false, 16), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 20, $this->source); })()), "LastName", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>UserName</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 24, $this->source); })()), "UserName", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 28, $this->source); })()), "role", [], "any", false, false, false, 28), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Image</th>
                <td><img src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("" . twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 32, $this->source); })()), "ImagePath", [], "any", false, false, false, 32))), "html", null, true);
        echo "\" alt=\"User Image\"></td>
            </tr>
            ";
        // line 34
        if ((twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 34, $this->source); })()), "role", [], "any", false, false, false, 34) == "Freelancer")) {
            echo " 
            <tr>
                <th>Bio</th>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 37, $this->source); })()), "bio", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Experience</th>
                <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 41, $this->source); })()), "experience", [], "any", false, false, false, 41), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Education</th>
                <td>";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 45, $this->source); })()), "education", [], "any", false, false, false, 45), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Total_jobs</th>
                <td>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 49, $this->source); })()), "totalJobs", [], "any", false, false, false, 49), "html", null, true);
            echo " Jobs </td>
            </tr>
            <tr>
                <th>Rating</th>
                <td>";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 53, $this->source); })()), "rating", [], "any", false, false, false, 53), "html", null, true);
            echo "/20</td>
            </tr>
            ";
        }
        // line 56
        echo "            ";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 56, $this->source); })()), "role", [], "any", false, false, false, 56) == "Entreprise")) {
            echo " 
            <tr>
                <th>Domaine</th>
                <td>";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 59, $this->source); })()), "domaine", [], "any", false, false, false, 59), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Info</th>
                <td>";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 63, $this->source); })()), "info", [], "any", false, false, false, 63), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 67, $this->source); })()), "location", [], "any", false, false, false, 67), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <th>Nbe</th>
                <td>";
            // line 71
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 71, $this->source); })()), "nbe", [], "any", false, false, false, 71), "html", null, true);
            echo " employees </td>
            </tr>
             ";
        }
        // line 74
        echo "            <tr>
                <th>IsBanned</th>
                ";
        // line 76
        if ((twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 76, $this->source); })()), "isBanned", [], "any", false, false, false, 76) == 0)) {
            echo " 
                <td> No</td>
                ";
        }
        // line 79
        echo "                ";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 79, $this->source); })()), "isBanned", [], "any", false, false, false, 79) == 1)) {
            // line 80
            echo "                <td> Yes</td>
                ";
        }
        // line 82
        echo "            </tr>
        </tbody>
    </table>

    <div align = \"center\">
    <a href=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["utilisateur"]) || array_key_exists("utilisateur", $context) ? $context["utilisateur"] : (function () { throw new RuntimeError('Variable "utilisateur" does not exist.', 87, $this->source); })()), "id", [], "any", false, false, false, 87)]), "html", null, true);
        echo "\">
    <button class=\"btn btn-warning btn-rounded btn-fw\">Edit</button>
    </a>
    <br>
    <br>
    ";
        // line 92
        echo twig_include($this->env, $context, "utilisateur/_delete_form.html.twig");
        echo "
    </div>


    <div align = \"right\">
    <a href=\"";
        // line 97
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_index");
        echo "\">
    <button type=\"button\" class=\"btn btn-dark btn-rounded btn-fw\">back to list</button>
    </a>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "utilisateur/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 97,  242 => 92,  234 => 87,  227 => 82,  223 => 80,  220 => 79,  214 => 76,  210 => 74,  204 => 71,  197 => 67,  190 => 63,  183 => 59,  176 => 56,  170 => 53,  163 => 49,  156 => 45,  149 => 41,  142 => 37,  136 => 34,  131 => 32,  124 => 28,  117 => 24,  110 => 20,  103 => 16,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'baseBack.html.twig' %}

{% block title %}User{% endblock %}

{% block contentblock %}
    <h1>User</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ utilisateur.name }}</td>
            </tr>
             <tr>
                <th>Email</th>
                <td>{{ utilisateur.email }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ utilisateur.LastName }}</td>
            </tr>
            <tr>
                <th>UserName</th>
                <td>{{ utilisateur.UserName }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ utilisateur.role }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td><img src=\"{{ asset('' ~ utilisateur.ImagePath) }}\" alt=\"User Image\"></td>
            </tr>
            {% if utilisateur.role == 'Freelancer' %} 
            <tr>
                <th>Bio</th>
                <td>{{ utilisateur.bio }}</td>
            </tr>
            <tr>
                <th>Experience</th>
                <td>{{ utilisateur.experience }}</td>
            </tr>
            <tr>
                <th>Education</th>
                <td>{{ utilisateur.education }}</td>
            </tr>
            <tr>
                <th>Total_jobs</th>
                <td>{{ utilisateur.totalJobs }} Jobs </td>
            </tr>
            <tr>
                <th>Rating</th>
                <td>{{ utilisateur.rating }}/20</td>
            </tr>
            {% endif %}
            {% if utilisateur.role == 'Entreprise' %} 
            <tr>
                <th>Domaine</th>
                <td>{{ utilisateur.domaine }}</td>
            </tr>
            <tr>
                <th>Info</th>
                <td>{{ utilisateur.info }}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>{{ utilisateur.location }}</td>
            </tr>
            <tr>
                <th>Nbe</th>
                <td>{{ utilisateur.nbe }} employees </td>
            </tr>
             {% endif %}
            <tr>
                <th>IsBanned</th>
                {% if utilisateur.isBanned == 0 %} 
                <td> No</td>
                {% endif %}
                {% if utilisateur.isBanned == 1 %}
                <td> Yes</td>
                {% endif %}
            </tr>
        </tbody>
    </table>

    <div align = \"center\">
    <a href=\"{{ path('app_utilisateur_edit', {'id': utilisateur.id}) }}\">
    <button class=\"btn btn-warning btn-rounded btn-fw\">Edit</button>
    </a>
    <br>
    <br>
    {{ include('utilisateur/_delete_form.html.twig') }}
    </div>


    <div align = \"right\">
    <a href=\"{{ path('app_utilisateur_index') }}\">
    <button type=\"button\" class=\"btn btn-dark btn-rounded btn-fw\">back to list</button>
    </a>
    </div>
{% endblock %}
", "utilisateur/show.html.twig", "C:\\Users\\Firas\\Desktop\\TestUser\\templates\\utilisateur\\show.html.twig");
    }
}

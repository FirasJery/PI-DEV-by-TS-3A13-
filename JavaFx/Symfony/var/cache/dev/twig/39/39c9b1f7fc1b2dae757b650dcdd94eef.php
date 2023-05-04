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

/* utilisateur/index.html.twig */
class __TwigTemplate_c2b741e723ea5cad415b584379234d16 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/index.html.twig"));

        $this->parent = $this->loadTemplate("baseBack.html.twig", "utilisateur/index.html.twig", 1);
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

        echo "Users List";
        
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

        echo "                 

    <h1 align = 'center'>Users List</h1>
    <div align = 'center'>
    <a href=\"";
        // line 9
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_newAdmin");
        echo "\">
    <button type=\"button\" class=\"btn btn-primary btn-rounded btn-icon\"> Create Admin </button>
    </a>
    </div>

    

    <div class=\"table-responsive\">
    <table class=\"table\">
        <thead>
            <tr>
                <th>Actions</th>
                
                <th>Role</th>
                <th>Email</th>
                <th>Name</th>
                <th>LastName</th>
                <th>UserName</th>
                <th>Image</th>
                <th>Bio</th>
                <th>Experience</th>
                <th>Education</th>
                <th>Total_jobs</th>
                <th>Rating</th>
                <th>Domaine</th>
                <th>Info</th>
                <th>Location</th>
                <th>Nbe</th>
                <th>IsBanned</th>
                
            </tr>
        </thead>
        <tbody>
        ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["utilisateurs"]) || array_key_exists("utilisateurs", $context) ? $context["utilisateurs"] : (function () { throw new RuntimeError('Variable "utilisateurs" does not exist.', 42, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["utilisateur"]) {
            // line 43
            echo "            <tr>
                <td>
                    <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_show", ["id" => twig_get_attribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 45)]), "html", null, true);
            echo "\">
                    <button type=\"button\" class=\"btn btn-primary btn-rounded btn-fw\">show</button>
                    </a>
                    <br>
                    <br>
                    <a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 50)]), "html", null, true);
            echo "\">
                    <button type=\"button\" class=\"btn btn-warning btn-rounded btn-fw\">edit</button>
                    </a>
                </td>
                
                <td>";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "role", [], "any", false, false, false, 55), "html", null, true);
            echo "</td>
                <td>";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "email", [], "any", false, false, false, 56), "html", null, true);
            echo "</td>
                <td>";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "name", [], "any", false, false, false, 57), "html", null, true);
            echo "</td>
                <td>";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "LastName", [], "any", false, false, false, 58), "html", null, true);
            echo "</td>
                <td>";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "UserName", [], "any", false, false, false, 59), "html", null, true);
            echo "</td>
                <td><img src=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("" . twig_get_attribute($this->env, $this->source, $context["utilisateur"], "ImagePath", [], "any", false, false, false, 60))), "html", null, true);
            echo "\" alt=\"User Image\"></td>
                <td>";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "bio", [], "any", false, false, false, 61), "html", null, true);
            echo "</td>
                <td>";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "experience", [], "any", false, false, false, 62), "html", null, true);
            echo "</td>
                <td>";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "education", [], "any", false, false, false, 63), "html", null, true);
            echo "</td>
                ";
            // line 64
            if ((twig_get_attribute($this->env, $this->source, $context["utilisateur"], "Role", [], "any", false, false, false, 64) == "Freelancer")) {
                echo " 
                <td>";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "totalJobs", [], "any", false, false, false, 65), "html", null, true);
                echo " Jobs</td>
                ";
            } else {
                // line 67
                echo "                <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "totalJobs", [], "any", false, false, false, 67), "html", null, true);
                echo "</td>
                ";
            }
            // line 69
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["utilisateur"], "Role", [], "any", false, false, false, 69) == "Freelancer")) {
                echo " 
                <td>";
                // line 70
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "rating", [], "any", false, false, false, 70), "html", null, true);
                echo "/20</td>
                ";
            } else {
                // line 72
                echo "                <td>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "rating", [], "any", false, false, false, 72), "html", null, true);
                echo "</td>
                ";
            }
            // line 74
            echo "                <td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "domaine", [], "any", false, false, false, 74), "html", null, true);
            echo "</td>
                <td>";
            // line 75
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "info", [], "any", false, false, false, 75), "html", null, true);
            echo "</td>
                <td>";
            // line 76
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "location", [], "any", false, false, false, 76), "html", null, true);
            echo "</td>
                <td>";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["utilisateur"], "nbe", [], "any", false, false, false, 77), "html", null, true);
            echo "</td>
                 ";
            // line 78
            if ((twig_get_attribute($this->env, $this->source, $context["utilisateur"], "isBanned", [], "any", false, false, false, 78) == 0)) {
                echo " 
                <td> No</td>
                ";
            }
            // line 81
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["utilisateur"], "isBanned", [], "any", false, false, false, 81) == 1)) {
                // line 82
                echo "                <td> Yes</td>
                ";
            }
            // line 84
            echo "                
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 87
            echo "            <tr>
                <td colspan=\"20\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['utilisateur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "        </tbody>
    </table>
    </div>
    
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "utilisateur/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  267 => 91,  258 => 87,  251 => 84,  247 => 82,  244 => 81,  238 => 78,  234 => 77,  230 => 76,  226 => 75,  221 => 74,  215 => 72,  210 => 70,  205 => 69,  199 => 67,  194 => 65,  190 => 64,  186 => 63,  182 => 62,  178 => 61,  174 => 60,  170 => 59,  166 => 58,  162 => 57,  158 => 56,  154 => 55,  146 => 50,  138 => 45,  134 => 43,  129 => 42,  93 => 9,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'baseBack.html.twig' %}

{% block title %}Users List{% endblock %}

{% block contentblock %}                 

    <h1 align = 'center'>Users List</h1>
    <div align = 'center'>
    <a href=\"{{ path('app_utilisateur_newAdmin') }}\">
    <button type=\"button\" class=\"btn btn-primary btn-rounded btn-icon\"> Create Admin </button>
    </a>
    </div>

    

    <div class=\"table-responsive\">
    <table class=\"table\">
        <thead>
            <tr>
                <th>Actions</th>
                
                <th>Role</th>
                <th>Email</th>
                <th>Name</th>
                <th>LastName</th>
                <th>UserName</th>
                <th>Image</th>
                <th>Bio</th>
                <th>Experience</th>
                <th>Education</th>
                <th>Total_jobs</th>
                <th>Rating</th>
                <th>Domaine</th>
                <th>Info</th>
                <th>Location</th>
                <th>Nbe</th>
                <th>IsBanned</th>
                
            </tr>
        </thead>
        <tbody>
        {% for utilisateur in utilisateurs %}
            <tr>
                <td>
                    <a href=\"{{ path('app_utilisateur_show', {'id': utilisateur.id}) }}\">
                    <button type=\"button\" class=\"btn btn-primary btn-rounded btn-fw\">show</button>
                    </a>
                    <br>
                    <br>
                    <a href=\"{{ path('app_utilisateur_edit', {'id': utilisateur.id}) }}\">
                    <button type=\"button\" class=\"btn btn-warning btn-rounded btn-fw\">edit</button>
                    </a>
                </td>
                
                <td>{{ utilisateur.role }}</td>
                <td>{{ utilisateur.email }}</td>
                <td>{{ utilisateur.name }}</td>
                <td>{{ utilisateur.LastName }}</td>
                <td>{{ utilisateur.UserName }}</td>
                <td><img src=\"{{ asset('' ~ utilisateur.ImagePath) }}\" alt=\"User Image\"></td>
                <td>{{ utilisateur.bio }}</td>
                <td>{{ utilisateur.experience }}</td>
                <td>{{ utilisateur.education }}</td>
                {% if utilisateur.Role == 'Freelancer' %} 
                <td>{{ utilisateur.totalJobs }} Jobs</td>
                {% else %}
                <td>{{ utilisateur.totalJobs }}</td>
                {% endif %}
                {% if utilisateur.Role == 'Freelancer' %} 
                <td>{{ utilisateur.rating }}/20</td>
                {% else %}
                <td>{{ utilisateur.rating }}</td>
                {% endif %}
                <td>{{ utilisateur.domaine }}</td>
                <td>{{ utilisateur.info }}</td>
                <td>{{ utilisateur.location }}</td>
                <td>{{ utilisateur.nbe }}</td>
                 {% if utilisateur.isBanned == 0 %} 
                <td> No</td>
                {% endif %}
                {% if utilisateur.isBanned == 1 %}
                <td> Yes</td>
                {% endif %}
                
            </tr>
        {% else %}
            <tr>
                <td colspan=\"20\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
    </div>
    
{% endblock %}
", "utilisateur/index.html.twig", "C:\\Users\\Firas\\Desktop\\TestUser\\templates\\utilisateur\\index.html.twig");
    }
}

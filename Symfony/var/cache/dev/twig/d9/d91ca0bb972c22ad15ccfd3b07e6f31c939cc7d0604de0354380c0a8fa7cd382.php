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

/* messagerie/conversation.html.twig */
class __TwigTemplate_48df3826891c07bd2e590a690f08ea220cbfc39bffbabb1bb3acd3325ac65db0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'conversation' => [$this, 'block_conversation'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "messagerie/conversation.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "messagerie/conversation.html.twig"));

        // line 1
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 52
        echo "
";
        // line 53
        $this->displayBlock('javascripts', $context, $blocks);
        // line 74
        echo "
";
        // line 75
        $this->displayBlock('conversation', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 2
        echo "<style>
    .left-msg,
    .right-msg{
        display: flex;
        height: auto;
    }

    .right-msg{
        position: relative;
        margin-left:auto;
    }

    .displayed-msg-right{
        min-height: 40px;
        height: auto;
        width: auto;
        margin-top: 25px;
        max-width: 400px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        background-color: blue;
        border-radius: 15px;
        padding: 10px 10px 10px 10px;
        color: white;
        font-family: 'Trebuchet MS';
    }

    .displayed-msg-left{
        height: auto;
        width: auto;
        margin-top: 25px;
        max-width: 400px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        background-color: #DADADA;
        border-radius: 15px;
        padding: 10px 10px 10px 10px;
        color: #2E2E2E;
        font-family: 'Trebuchet MS';
    }

    .contact-img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 53
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 54
        echo "    <script>
        \$(document).ready(() => {
            \$(\"#cc\").parent().attr(\"id\", \"";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["convo"]) || array_key_exists("convo", $context) ? $context["convo"] : (function () { throw new RuntimeError('Variable "convo" does not exist.', 56, $this->source); })()), "getId", [], "method", false, false, false, 56), "html", null, true);
        echo "\"); //put convo's id to cc-container
            \$(\"#create-container\").css(\"display\", \"none\");
            profileSetup();
            scrollBot();
        });

        function profileSetup(){
            /*";
        // line 63
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["convo"]) || array_key_exists("convo", $context) ? $context["convo"] : (function () { throw new RuntimeError('Variable "convo" does not exist.', 63, $this->source); })()), "type", [], "any", false, false, false, 63), "grp"))) {
            // line 64
            echo "                    \$(\"#profile-username\").html(\"<b>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["convo"]) || array_key_exists("convo", $context) ? $context["convo"] : (function () { throw new RuntimeError('Variable "convo" does not exist.', 64, $this->source); })()), "title", [], "any", false, false, false, 64), "html", null, true);
            echo "</b>\");
            ";
        } else {
            // line 66
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 66, $this->source); })()), "other_participant", [0 => (isset($context["convo"]) || array_key_exists("convo", $context) ? $context["convo"] : (function () { throw new RuntimeError('Variable "convo" does not exist.', 66, $this->source); })())], "method", false, false, false, 66));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 67
                echo "                    \$(\"#profile-username\").html(\"<b>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "getUsername", [], "method", false, false, false, 67), "html", null, true);
                echo "</b>\");
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "            ";
        }
        echo "*/
            \$(\"#profile-username\").html(\"<b>";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 70, $this->source); })()), "getInfo", [0 => (isset($context["convo"]) || array_key_exists("convo", $context) ? $context["convo"] : (function () { throw new RuntimeError('Variable "convo" does not exist.', 70, $this->source); })())], "method", false, false, false, 70), "html", null, true);
        echo "</b>\");
        }
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 75
    public function block_conversation($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "conversation"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "conversation"));

        // line 76
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["convo"]) || array_key_exists("convo", $context) ? $context["convo"] : (function () { throw new RuntimeError('Variable "convo" does not exist.', 76, $this->source); })()), "getMessages", [], "method", false, false, false, 76));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 77
            echo "        ";
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["msg"], "getUser", [], "method", false, false, false, 77), "getId", [], "method", false, false, false, 77), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 77, $this->source); })()), "current_user", [], "method", false, false, false, 77), "getId", [], "method", false, false, false, 77)))) {
                // line 78
                echo "            <div class=\"right-msg\">
                <div class=\"displayed-msg-right\">";
                // line 79
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["msg"], "getContent", [], "method", false, false, false, 79), "html", null, true);
                echo "</div>
                <img src=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/default.jpg"), "html", null, true);
                echo "\" class=\"contact-img\">    
            </div>
        ";
            } else {
                // line 83
                echo "            <div class=\"left-msg\">
                <img src=\"";
                // line 84
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/default.jpg"), "html", null, true);
                echo "\" class=\"contact-img\">
                <div class=\"displayed-msg-left\">";
                // line 85
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["msg"], "getContent", [], "method", false, false, false, 85), "html", null, true);
                echo "</div>
            </div>
        ";
            }
            // line 88
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "messagerie/conversation.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  244 => 88,  238 => 85,  234 => 84,  231 => 83,  225 => 80,  221 => 79,  218 => 78,  215 => 77,  210 => 76,  200 => 75,  186 => 70,  181 => 69,  172 => 67,  167 => 66,  161 => 64,  159 => 63,  149 => 56,  145 => 54,  135 => 53,  76 => 2,  66 => 1,  56 => 75,  53 => 74,  51 => 53,  48 => 52,  46 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block stylesheets %}
<style>
    .left-msg,
    .right-msg{
        display: flex;
        height: auto;
    }

    .right-msg{
        position: relative;
        margin-left:auto;
    }

    .displayed-msg-right{
        min-height: 40px;
        height: auto;
        width: auto;
        margin-top: 25px;
        max-width: 400px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        background-color: blue;
        border-radius: 15px;
        padding: 10px 10px 10px 10px;
        color: white;
        font-family: 'Trebuchet MS';
    }

    .displayed-msg-left{
        height: auto;
        width: auto;
        margin-top: 25px;
        max-width: 400px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        background-color: #DADADA;
        border-radius: 15px;
        padding: 10px 10px 10px 10px;
        color: #2E2E2E;
        font-family: 'Trebuchet MS';
    }

    .contact-img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
</style>
{% endblock %}

{% block javascripts %}
    <script>
        \$(document).ready(() => {
            \$(\"#cc\").parent().attr(\"id\", \"{{ convo.getId() }}\"); //put convo's id to cc-container
            \$(\"#create-container\").css(\"display\", \"none\");
            profileSetup();
            scrollBot();
        });

        function profileSetup(){
            /*{% if convo.type == \"grp\" %}
                    \$(\"#profile-username\").html(\"<b>{{ convo.title }}</b>\");
            {% else %}
                {% for p in cp.other_participant(convo) %}
                    \$(\"#profile-username\").html(\"<b>{{ p.getUsername() }}</b>\");
                {% endfor %}
            {% endif %}*/
            \$(\"#profile-username\").html(\"<b>{{ cp.getInfo(convo) }}</b>\");
        }
    </script>
{% endblock %}

{% block conversation %}
    {% for msg in convo.getMessages() %}
        {% if msg.getUser().getId() == cp.current_user().getId() %}
            <div class=\"right-msg\">
                <div class=\"displayed-msg-right\">{{ msg.getContent() }}</div>
                <img src=\"{{ asset('resources/default.jpg') }}\" class=\"contact-img\">    
            </div>
        {% else %}
            <div class=\"left-msg\">
                <img src=\"{{ asset('resources/default.jpg') }}\" class=\"contact-img\">
                <div class=\"displayed-msg-left\">{{ msg.getContent() }}</div>
            </div>
        {% endif %}
    {% endfor %}
{% endblock %}", "messagerie/conversation.html.twig", "C:\\Users\\ASUS\\myProjects\\PI-DEV_TSpp_3A13\\web\\templates\\messagerie\\conversation.html.twig");
    }
}

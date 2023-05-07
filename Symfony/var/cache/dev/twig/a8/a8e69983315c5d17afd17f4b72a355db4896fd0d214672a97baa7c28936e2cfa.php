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

/* messagerie/message-append.html.twig */
class __TwigTemplate_3287f77744a44a07ea0017ff020ffd0ba7dacee7c7b1af7a394342ee41b13acb extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "messagerie/message-append.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "messagerie/message-append.html.twig"));

        // line 1
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 52
        echo "
";
        // line 53
        $this->displayBlock('javascripts', $context, $blocks);
        // line 58
        echo "
";
        // line 59
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
        scrollBot();
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 59
    public function block_conversation($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "conversation"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "conversation"));

        // line 60
        echo "    ";
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["msg"]) || array_key_exists("msg", $context) ? $context["msg"] : (function () { throw new RuntimeError('Variable "msg" does not exist.', 60, $this->source); })()), "getUser", [], "method", false, false, false, 60), "getId", [], "method", false, false, false, 60), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 60, $this->source); })()), "current_user", [], "method", false, false, false, 60), "getId", [], "method", false, false, false, 60)))) {
            // line 61
            echo "        <div class=\"right-msg\">
            <div class=\"displayed-msg-right\">";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["msg"]) || array_key_exists("msg", $context) ? $context["msg"] : (function () { throw new RuntimeError('Variable "msg" does not exist.', 62, $this->source); })()), "getContent", [], "method", false, false, false, 62), "html", null, true);
            echo "</div>
            <img src=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/default.jpg"), "html", null, true);
            echo "\" class=\"contact-img\">    
        </div>
    ";
        } else {
            // line 66
            echo "        <div class=\"left-msg\">
            <img src=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/default.jpg"), "html", null, true);
            echo "\" class=\"contact-img\">
            <div class=\"displayed-msg-left\">";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["msg"]) || array_key_exists("msg", $context) ? $context["msg"] : (function () { throw new RuntimeError('Variable "msg" does not exist.', 68, $this->source); })()), "getContent", [], "method", false, false, false, 68), "html", null, true);
            echo "</div>
        </div>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "messagerie/message-append.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  191 => 68,  187 => 67,  184 => 66,  178 => 63,  174 => 62,  171 => 61,  168 => 60,  158 => 59,  145 => 54,  135 => 53,  76 => 2,  66 => 1,  56 => 59,  53 => 58,  51 => 53,  48 => 52,  46 => 1,);
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
        scrollBot();
    </script>
{% endblock %}

{% block conversation %}
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
{% endblock %}", "messagerie/message-append.html.twig", "C:\\Users\\ASUS\\FirstProject\\templates\\messagerie\\message-append.html.twig");
    }
}

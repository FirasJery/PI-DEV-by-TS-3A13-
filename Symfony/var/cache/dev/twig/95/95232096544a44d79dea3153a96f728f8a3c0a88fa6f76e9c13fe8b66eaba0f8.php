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

/* messagerie/modal-contacts.html.twig */
class __TwigTemplate_901bdf15031d868b74b82b827bee90852e34707ca525ef2e74c3435d56e27d07 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "messagerie/modal-contacts.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "messagerie/modal-contacts.html.twig"));

        // line 1
        echo "<div id=\"modc-child\" style=\"display:flex; flex-direction: column;\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 2, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 3
            echo "        <div class=\"modal-user\" name=\"modal-user\" id=\"mu_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 3), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "username", [], "any", false, false, false, 3), "html", null, true);
            echo "\">
            <img src=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/default.jpg"), "html", null, true);
            echo "\" class=\"modal-user-img\">
            <b>";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "username", [], "any", false, false, false, 5), "html", null, true);
            echo "</b>
        </div>
        <script>
            document.getElementById(\"mu_";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 8), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "username", [], "any", false, false, false, 8), "html", null, true);
            echo "\").addEventListener(\"click\", () => {
                \$(document).ready(() => {
                    \$(\"#m-list\").append(\"<div class='mod-member' id='mm_";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 10), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "username", [], "any", false, false, false, 10), "html", null, true);
            echo "'>\"
                    + \"<b style='color: #3200ab; position: relative; top: 15%;'>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "username", [], "any", false, false, false, 11), "html", null, true);
            echo "</b>\"
                    + \"</div>\");
                    \$(\"#ms\").val(\"\");
                    \$(\"#modc-child\").empty();
                });
            });
        </script>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["idk"]) || array_key_exists("idk", $context) ? $context["idk"] : (function () { throw new RuntimeError('Variable "idk" does not exist.', 19, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 20
            echo "        <script>
            console.log(\"";
            // line 21
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\");
        </script>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "messagerie/modal-contacts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 24,  120 => 21,  117 => 20,  112 => 19,  90 => 11,  85 => 10,  79 => 8,  73 => 5,  69 => 4,  63 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"modc-child\" style=\"display:flex; flex-direction: column;\">
    {% for c in data %}
        <div class=\"modal-user\" name=\"modal-user\" id=\"mu_{{ loop.index0 }}{{ c.username }}\">
            <img src=\"{{ asset('resources/default.jpg') }}\" class=\"modal-user-img\">
            <b>{{ c.username }}</b>
        </div>
        <script>
            document.getElementById(\"mu_{{ loop.index0 }}{{ c.username }}\").addEventListener(\"click\", () => {
                \$(document).ready(() => {
                    \$(\"#m-list\").append(\"<div class='mod-member' id='mm_{{ loop.index0 }}{{ c.username }}'>\"
                    + \"<b style='color: #3200ab; position: relative; top: 15%;'>{{ c.username }}</b>\"
                    + \"</div>\");
                    \$(\"#ms\").val(\"\");
                    \$(\"#modc-child\").empty();
                });
            });
        </script>
    {% endfor %}
    {% for i in idk %}
        <script>
            console.log(\"{{ i }}\");
        </script>
    {% endfor %}
</div>", "messagerie/modal-contacts.html.twig", "C:\\Users\\ASUS\\myProjects\\PI-DEV_TSpp_3A13\\web\\templates\\messagerie\\modal-contacts.html.twig");
    }
}

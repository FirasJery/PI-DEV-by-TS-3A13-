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

/* utilisateur/new.html.twig */
class __TwigTemplate_7e45ee75c4b93f8dc968bc0083d84497 extends Template
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
        return "baselogin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "utilisateur/new.html.twig"));

        $this->parent = $this->loadTemplate("baselogin.html.twig", "utilisateur/new.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome to our website
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 7
    public function block_contentblock($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contentblock"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contentblock"));

        // line 8
        echo "<script src=\"https://code.jquery.com/jquery-3.5.1.min.js\"></script>
\t<h1>
\t\tFill the form and click save !
\t</h1>
\t";
        // line 12
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), [0 => "bootstrap_5_layout.html.twig"], true);
        // line 13
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        echo "
    ";
        // line 14
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), 'widget');
        echo "
    <button class=\"btn btn-warning btn-rounded btn-fw\">";
        // line 15
        echo twig_escape_filter($this->env, ((array_key_exists("button_label", $context)) ? (_twig_default_filter((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 15, $this->source); })()), "Save")) : ("Save")), "html", null, true);
        echo "</button>
";
        // line 16
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), 'form_end');
        echo "
    <section>
    <div class = \"container\">
        <button id=\"takePictureBtn\" name=\"takePictureBtn\">Take Picture</button>
        <video id=\"video\" autoplay muted></video>
        <canvas id=\"canvas\" style=\"display: none; width:300px;height:300px;\"></canvas>
        <button id=\"snapBtn\" name=\"snapBtn\" style=\"display: none;\">Snap</button>
    </div>
    </section>


<script>


   const canvas = document.querySelector('#canvas');
    canvas.width = 400;
    canvas.height = 300;
    const takePictureBtn = document.querySelector('#takePictureBtn');
    const snapBtn = document.querySelector('#snapBtn');
    const form = document.querySelector('#my-form');

// Check if getUserMedia is available
takePictureBtn.addEventListener('click', function(){
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
  // Request access to the webcam
  takePictureBtn.style.display = 'none';
  snapBtn.style.display = 'block';
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) {
      // Attach the stream to the video element
      video.srcObject = stream;
      video.play();
      video.height = 300;
      const mediaStreamTrack = stream.getVideoTracks()[0];
    })
    .catch(function(error) {
      console.error('Could not access the webcam: ' + error.message);
    });
} else {
  console.error('getUserMedia is not supported in this browser.');
  }
});
// Add event listener for the \"Take Picture\" button
snapBtn.addEventListener('click', function() {
  \$(document).ready(function() {
  // your code here

  video.pause();

  // Draw the current frame of the video on the canvas
  var context = canvas.getContext('2d');
  context.drawImage(video, 0, 0, 400, 300);
  var dataURL = canvas.toDataURL('image/jpeg');
  var path ; 
  

  \$.ajax({
    url: '/utilisateur/save-img',
    type: 'POST',
    data: {'image': dataURL},
    dataType: 'json',
    success: function (response) {
      if (response.success) {
        console.log(\"success\");
        console.log(\"filename: \" + response.filename);
        path = response.filename;
        const form = document.querySelector('form[name=\"utilisateur\"]');
        const imageInput = form.querySelector('input[name=\"utilisateur[Image]\"]');
       imageInput.value = path;
      } else {
        console.log(\"error: \" + response.message);
      }
    } 
  });

  // Stop all video streams.
  video.srcObject.getVideoTracks().forEach(track => track.stop());
  snapBtn.style.display = 'none';
  takePictureBtn.style.display = 'block';
});
});
    </script>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "utilisateur/new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 16,  105 => 15,  101 => 14,  97 => 13,  95 => 12,  89 => 8,  79 => 7,  59 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'baselogin.html.twig' %}


{% block title %}Welcome to our website
{% endblock %}

{% block contentblock %}
<script src=\"https://code.jquery.com/jquery-3.5.1.min.js\"></script>
\t<h1>
\t\tFill the form and click save !
\t</h1>
\t{% form_theme form 'bootstrap_5_layout.html.twig' %}
{{ form_start(form, {'attr': {'novalidate': 'novalidate'}}) }}
    {{ form_widget(form) }}
    <button class=\"btn btn-warning btn-rounded btn-fw\">{{ button_label|default('Save') }}</button>
{{ form_end(form) }}
    <section>
    <div class = \"container\">
        <button id=\"takePictureBtn\" name=\"takePictureBtn\">Take Picture</button>
        <video id=\"video\" autoplay muted></video>
        <canvas id=\"canvas\" style=\"display: none; width:300px;height:300px;\"></canvas>
        <button id=\"snapBtn\" name=\"snapBtn\" style=\"display: none;\">Snap</button>
    </div>
    </section>


<script>


   const canvas = document.querySelector('#canvas');
    canvas.width = 400;
    canvas.height = 300;
    const takePictureBtn = document.querySelector('#takePictureBtn');
    const snapBtn = document.querySelector('#snapBtn');
    const form = document.querySelector('#my-form');

// Check if getUserMedia is available
takePictureBtn.addEventListener('click', function(){
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
  // Request access to the webcam
  takePictureBtn.style.display = 'none';
  snapBtn.style.display = 'block';
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) {
      // Attach the stream to the video element
      video.srcObject = stream;
      video.play();
      video.height = 300;
      const mediaStreamTrack = stream.getVideoTracks()[0];
    })
    .catch(function(error) {
      console.error('Could not access the webcam: ' + error.message);
    });
} else {
  console.error('getUserMedia is not supported in this browser.');
  }
});
// Add event listener for the \"Take Picture\" button
snapBtn.addEventListener('click', function() {
  \$(document).ready(function() {
  // your code here

  video.pause();

  // Draw the current frame of the video on the canvas
  var context = canvas.getContext('2d');
  context.drawImage(video, 0, 0, 400, 300);
  var dataURL = canvas.toDataURL('image/jpeg');
  var path ; 
  

  \$.ajax({
    url: '/utilisateur/save-img',
    type: 'POST',
    data: {'image': dataURL},
    dataType: 'json',
    success: function (response) {
      if (response.success) {
        console.log(\"success\");
        console.log(\"filename: \" + response.filename);
        path = response.filename;
        const form = document.querySelector('form[name=\"utilisateur\"]');
        const imageInput = form.querySelector('input[name=\"utilisateur[Image]\"]');
       imageInput.value = path;
      } else {
        console.log(\"error: \" + response.message);
      }
    } 
  });

  // Stop all video streams.
  video.srcObject.getVideoTracks().forEach(track => track.stop());
  snapBtn.style.display = 'none';
  takePictureBtn.style.display = 'block';
});
});
    </script>
    {% endblock %}
   


", "utilisateur/new.html.twig", "C:\\Users\\Firas\\Desktop\\TestUser\\templates\\utilisateur\\new.html.twig");
    }
}

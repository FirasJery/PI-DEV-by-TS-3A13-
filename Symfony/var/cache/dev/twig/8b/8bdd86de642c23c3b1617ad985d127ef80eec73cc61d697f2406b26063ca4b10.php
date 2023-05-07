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

/* messagerie/messagerie.html.twig */
class __TwigTemplate_037f5f6ba9a9d2130e5d0178983401adb888475aa6f0d7994a84f191b474e664 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
            'conversation' => [$this, 'block_conversation'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "generic/navbar.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "messagerie/messagerie.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "messagerie/messagerie.html.twig"));

        $this->parent = $this->loadTemplate("generic/navbar.html.twig", "messagerie/messagerie.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
<style>
    .messagerie-container{
        display: flex;
        height: 100%;
        width: auto;
    }

    .contacts-container{
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 20%;
        overflow-y: auto;
    }

    .contacts-features{
        height:auto;
        width:auto;
        display: flex;
    }

    .feature-img{
        height: 40px;
        width: 40px;
        position:relative;
        margin-left: auto;
        cursor: pointer;
    }

    .modal-c{
        z-index:1;
        width:300px;
        height: auto;
        max-height: 200px;
        display: block;
        position:fixed;
        top: 140px;
        left: 280px;
        /*top:0;
        left:0;*/
        background-color: white;
        overflow-y: scroll;
    }

    .create-container{
        height:auto;
        width:auto;
        display: flex;
        flex-direction: column;
    }

    .search-member{
        height: auto;
        width: auto;
        display: flex;
        padding: 4px 20px 2px 20px;
    }

    .modal-user{
        cursor: pointer;
        background-color: white;
    }

    .modal-user:hover{
        background-color: #DADADA;
    }

    .modal-user-img{
        height: 40px;
        width: 40px;
        border-radius: 40px;
    }

    .memeber-list{
        display: flex;
    }

    .mod-member{
        height: 40px;
        width: auto;
        border: 2px #3200ab solid;
        border-radius: 15px;
        background-color: #7fbdff;
        display: inline-block;
        cursor: pointer;
    }

    .search-contact{

    }

    .con-bar{
        margin-top:2%; 
        margin-left: 7%; 
        margin-right:7%; 
        width: 80%;
        background-color: #DADADA;
        border-radius: 15px;
    }

    .contact-card{
        display:flex;
        height: 100px;
        width: 100%;
        cursor: pointer;
        border-radius: 15px;
    }

    .contact-card:hover{
        background-color:#DADADA;
    }

    .contact-img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }

    .user-info{
        display: flex;
        flex-direction: column;
        margin-top: 10%;
        font-family: 'Trebuchet MS';
    }

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

    .conversation-container{
        height: auto;
        width: 50%;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .conversation-footer{
        position: relative;
        display:flex;
    }

    .profile-container{
        height: auto;
        width: 29%;
        position: absolute;
        right: 0px;
    }

    .cta-btn {
        background-color: #0f1756;
        border-radius: 8px;
        border-style: none;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: \"Haas Grot Text R Web\", \"Helvetica Neue\", Helvetica, Arial, sans-serif;
        font-size: 14px;
        font-weight: 500;
        height: 40px;
        line-height: 20px;
        list-style: none;
        outline: none;
        padding: 10px 16px;
        position: relative;
        text-align: center;
        transition: color 100ms;
        vertical-align: baseline;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        margin-left:auto;
        margin-top: 1%;
    }

    .cta-btn,
    .cta-btn {
        background-color: #0f1756;
    }

    .msg-txt-area {
    resize: vertical;
    height: auto;
    max-height: 140px;
    width: auto;
    word-break: break-word;
    margin-left: 2%;
    margin-right: 1%;
    margin-top: 1%;
    margin-bottom: 2%;
    border-radius: 2px solid black;
    outline: none;
    resize: none;
    }

    .convo-flux{
        display: flex; 
        flex-direction: column; 
        height: auto;
        overflow-y: auto;
    }
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 247
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 248
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "    
    <script>
        function ajaxShowConvo(part_id, e_id) {
                document.getElementById(e_id).addEventListener(\"click\", () => {
                    document.getElementById(\"create-container\").style.display = \"none\";
                    \$.ajax({
                        type: 'POST',
                        url: '/show-convo',
                        data:{
                            'other-part': part_id,
                            'contact-click': 'contact-click'
                        },
                        success: function (response) {
                            console.log(part_id);
                            \$(\"#cc\").empty().html(response);
                            //console.log(response);
                        },
                        error: function (response) {
                            console.log('Error:', response);
                        }
                    })
                });
        }

        //TRANSFER THIS FUNCTION TO CONVERSATION.HTML. -> NO NEED???
        function ajaxAppendMessage(){
            \$(document).ready(() => {
                \$(\"#send-btn\").unbind().click(() => {
                    let msg_content = \$(\"comm-con\").val();
                    if(msg_content != \"\"){
                        if(\$(\"#cc\").parent().attr(\"id\") == \"-1\"){
                            let u_list = new Array();
                            let ch = document.getElementById(\"m-list\");
                            for(const child of ch.children){
                                u_list.push(child.firstChild.innerHTML);
                            }
                            \$.ajax({
                                type: 'POST',
                                url: '/send-msg',
                                data:{
                                    'conversation-id': \$(\"#send-btn\").parent().parent().attr(\"id\"),
                                    'msg-content': \$(\"#comm-con\").val(),
                                    'user': \"u\",
                                    'contact-click': 'contact-click',
                                    'u-list': u_list,
                                },
                                success: function (response) {
                                    \$(\"#cc\").append(response);
                                    //console.log(response);
                                },
                                error: function (response) {
                                    console.log('Error:', response);
                                }
                            })
                        } else {
                            \$.ajax({
                                type: 'POST',
                                url: '/send-msg',
                                data:{
                                    'conversation-id': \$(\"#send-btn\").parent().parent().attr(\"id\"),
                                    'msg-content': \$(\"#comm-con\").val(),
                                    'user': \"u\",
                                    'contact-click': 'contact-click'
                                },
                                success: function (response) {
                                    console.log(\"test\");
                                    \$(\"#cc\").append(response);
                                    //console.log(response);
                                },
                                error: function (response) {
                                    console.log('Error:', response);
                                }
                            })
                        }
                    }
                });
            });
        }

        function ajaxRecieveMessage(convo_id, msg){
            \$.ajax({
                type: 'POST',
                url: '/send-msg',
                data:{
                    'conversation-id': convo_id,
                    'msg-content': msg,
                    'user': \"o\",
                    'contact-click': 'contact-click'
                },
                success: function (response) {
                    console.log(\"jQuery succ\");
                    \$(\"#cc\").append(response);
                },
                error: function (response) {
                    console.log('Error:', response);
                }
            });
        }

        function findContacts(name){
            console.log(name);
            let add_data = new Array();
            add_data.push(\"-1\");
            let ch = document.getElementById(\"m-list\");
            for(const child of ch.children){
                add_data.push(child.firstChild.innerHTML);
            }
            \$.ajax({
                type: 'POST',
                url: '/get-contacts',
                data:{
                    'contact-name': name,
                    'additional-data': add_data
                },
                success: function(response){
                    //console.log(response);
                     \$(\"#modc-child\").html(response);
                },
                error: function(response){
                    console.log('Error:', response);
                }
            });
        }
    </script>

    <script src=\"https://js.pusher.com/7.2/pusher.min.js\"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('68154387874516026ac7', {
        cluster: 'eu'
        });

        function pusherChannels(convo_id, part_id){
            pid = \"cp\" + convo_id;
            var channel = pusher.subscribe(pid);
            channel.bind('message-sent', function(data) {
                console.log(data['message']);
                if(data['part'] == part_id){
                    console.log(\"\");
                } else {
                    ajaxRecieveMessage(convo_id, data['message']);
                }
            });
        }    
    </script>

    <script>
        let u_list_un = new Array();
        let u_list_id = new Array();
        var contacts = new Array();
        
        function pushContact(c){
            contacts.push(c);
        }

        function scrollBot(){
            var cc = document.getElementById(\"cc\");
            cc.scrollTop = cc.scrollHeight;
        }
        
        ////////////////////////////////////////////

        pageSetup();

        function pageSetup(){
            searchContact();
            detectNewChild();
        }

        function searchContact(){
            \$(document).ready(() => {
                var s = document.getElementById(\"cb\");
                s.addEventListener(\"input\", () => {
                    document.getElementsByName(\"a-contact\").forEach(e => {
                        if(e.innerHTML.includes(s.value)){
                            console.log(\"found\");
                            e.parentElement.parentElement.parentElement.style.display = \"flex\";
                        } else {
                            e.parentElement.parentElement.parentElement.style.display = \"none\";
                        }
                    });
                })
            })
        }

        function detectNewChild(){
            \$(document).ready(() => {
                let u_list = document.getElementById(\"m-list\").addEventListener(\"DOMNodeInserted\", e => {
                    let ch = document.getElementById(e.target.id);
                    console.log(ch.id);
                    if(ch.parentNode.id == \"m-list\"){
                        ch.addEventListener(\"click\", () => {
                            ch.remove();
                        });
                    }
                });
            })
        }
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 451
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 452
        echo "<div class=\"messagerie-container\">
    <div class=\"contacts-container\">
        <div class=\"contacts-features\">
            <div style=\"margin-top: 2%;\"><b>Inbox</b></div>
            <img id=\"f1\" src=\"";
        // line 456
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/add-grp.png"), "html", null, true);
        echo "\" class=\"feature-img\">
        </div>
        <div class=\"search-contact\" style=\"justify-content: center; width:auto;\">
            <input id=\"cb\" type=\"text\" placeholder=\"Search...\" class=\"con-bar\"></input>
        </div>
        ";
        // line 461
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["convos"]) || array_key_exists("convos", $context) ? $context["convos"] : (function () { throw new RuntimeError('Variable "convos" does not exist.', 461, $this->source); })()));
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
            // line 462
            echo "        <div class=\"contact-card\" name=\"some-contact\" id=\"e_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 462), "html", null, true);
            echo "\">
            <img src=\"";
            // line 463
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/default.jpg"), "html", null, true);
            echo "\" class=\"contact-img\" style=\"margin-left: 2%;\">
            <div class=\"user-info\" style=\"margin-left: 2%;\">
                <div ><b id=\"u_";
            // line 465
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 465), "html", null, true);
            echo "\" name=\"a-contact\">
                    ";
            // line 466
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["c"], "type", [], "any", false, false, false, 466), "grp"))) {
                // line 467
                echo "                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "title", [], "any", false, false, false, 467), "html", null, true);
                echo "
                    ";
            } else {
                // line 469
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 469, $this->source); })()), "other_participant", [0 => $context["c"]], "method", false, false, false, 469));
                foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                    // line 470
                    echo "                            ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "getUsername", [], "method", false, false, false, 470), "html", null, true);
                    echo "
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 472
                echo "                    ";
            }
            // line 473
            echo "                </b></div>
                <div style=\"text-overflow: ellipsis;white-space: nowrap;overflow: hidden; width: 80%;\">";
            // line 474
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "getLastMessageStr", [], "any", false, false, false, 474), "html", null, true);
            echo "</div>
            </div>
        </div>
        <script>
            ";
            // line 478
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 478, $this->source); })()), "other_participant", [0 => $context["c"]], "method", false, false, false, 478));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 479
                echo "                u_list_un.push(\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "getUsername", [], "method", false, false, false, 479), "html", null, true);
                echo "\");
                u_list_id.push(\"";
                // line 480
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p"], "getId", [], "method", false, false, false, 480), "html", null, true);
                echo "\");
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 482
            echo "            ajaxShowConvo(u_list_id, \"e_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 482), "html", null, true);
            echo "\");
            ajaxAppendMessage();
            pusherChannels(\"";
            // line 484
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 484), "html", null, true);
            echo "\", \"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 484, $this->source); })()), "your_participant", [0 => $context["c"]], "method", false, false, false, 484), "getId", [], "method", false, false, false, 484), "html", null, true);
            echo "\");
            pushContact(u_list_un);
            u_list_un = [];
            u_list_id = [];
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
        // line 490
        echo "    </div>
    <div style=\"height:100%; width: 2px; background-color:#DADADA;\"></div>
    <div id=\"cc-container\" class=\"conversation-container\" name=\"conv-cont\">
        <div class=\"create-container\" id=\"create-container\" style=\"display:none;\">
            <div class=\"search-member\">
                <b>To:</b>
                <input id=\"ms\" type=\"text\" placeholder=\"Username...\" style=\"width: 60%; height: 80%; border: 0px; outline: none; margin-left: 1%;\">
            </div>
            <div class=\"modal-c\" id=\"modc\">
                <div id=\"modc-child\" style=\"display:flex; flex-direction: column;\">
                <!--content-->
                </div>
            </div>
            <div class=\"member-list\" id=\"m-list\">
            </div>
            <div style=\"height:2px; width: 100%; background-color:#DADADA;\"></div>
        </div>
        <div id=\"cc\" class=\"convo-flux\" style=\"\">  
            ";
        // line 508
        $this->displayBlock('conversation', $context, $blocks);
        // line 510
        echo "        </div>
        <div style=\"height:2px; width: 100%; background-color:#DADADA;position:relative;margin-top:auto;\"></div>
        <div class=\"conversation-footer\">
            <textarea id=\"comm-con\" name=\"your-add-comment\" placeholder=\"What are you thinking...\" class=\"msg-txt-area\"
            rows=\"2\" cols=\"80\"></textarea>
            <div id=\"send-btn\" class=\"cta-btn\">Send</div>
        </div>
    </div>
    <div style=\"height:100%; width: 2px; background-color:#DADADA;\"></div>
    <div class=\"profile-container\">
        <img id=\"profile-img\" src=\"";
        // line 520
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("resources/default.jpg"), "html", null, true);
        echo "\" class=\"contact-img\" style=\"margin-left: 0%;\">
        <div id=\"profile-username\"><b>User</b></div>
    </div>
    <script>
        miscMsg();

        function miscMsg(){
            txtScroll();
            modalManipulation();
        }
        function txtScroll(){
            var textbox = document.getElementById(\"comm-con\");
            textbox.addEventListener(\"input\", () => {
                textbox.style.height = 'auto';
                textbox.style.height = `\${textbox.scrollHeight}px`;
            });
        }
        function modalManipulation(){
            document.getElementById(\"ms\").addEventListener(\"input\", () => {
                document.getElementById(\"modc\").style.display = \"block\";
                findContacts(document.getElementById(\"ms\").value);
            });

            window.addEventListener(\"click\", e => {
                if(e.target.id != \"ms\"){
                    document.getElementById(\"modc\").style.display = \"none\";
                } else {
                    document.getElementById(\"modc\").style.display = \"block\";
                }

                if(e.target.id == \"f1\"){
                    document.getElementById(\"create-container\").style.display = \"flex\";
                    document.getElementsByName(\"conv-cont\")[0].id = \"-1\";
                    document.getElementById(\"cc\").innerHTML = \"\";
                }
            })
        }
    </script>
    
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 508
    public function block_conversation($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "conversation"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "conversation"));

        // line 509
        echo "            ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "messagerie/messagerie.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  776 => 509,  766 => 508,  715 => 520,  703 => 510,  701 => 508,  681 => 490,  659 => 484,  653 => 482,  645 => 480,  640 => 479,  636 => 478,  629 => 474,  626 => 473,  623 => 472,  614 => 470,  609 => 469,  603 => 467,  601 => 466,  597 => 465,  592 => 463,  587 => 462,  570 => 461,  562 => 456,  556 => 452,  546 => 451,  333 => 248,  323 => 247,  71 => 4,  61 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'generic/navbar.html.twig' %}

{% block stylesheets %}
{{ parent() }}
<style>
    .messagerie-container{
        display: flex;
        height: 100%;
        width: auto;
    }

    .contacts-container{
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 20%;
        overflow-y: auto;
    }

    .contacts-features{
        height:auto;
        width:auto;
        display: flex;
    }

    .feature-img{
        height: 40px;
        width: 40px;
        position:relative;
        margin-left: auto;
        cursor: pointer;
    }

    .modal-c{
        z-index:1;
        width:300px;
        height: auto;
        max-height: 200px;
        display: block;
        position:fixed;
        top: 140px;
        left: 280px;
        /*top:0;
        left:0;*/
        background-color: white;
        overflow-y: scroll;
    }

    .create-container{
        height:auto;
        width:auto;
        display: flex;
        flex-direction: column;
    }

    .search-member{
        height: auto;
        width: auto;
        display: flex;
        padding: 4px 20px 2px 20px;
    }

    .modal-user{
        cursor: pointer;
        background-color: white;
    }

    .modal-user:hover{
        background-color: #DADADA;
    }

    .modal-user-img{
        height: 40px;
        width: 40px;
        border-radius: 40px;
    }

    .memeber-list{
        display: flex;
    }

    .mod-member{
        height: 40px;
        width: auto;
        border: 2px #3200ab solid;
        border-radius: 15px;
        background-color: #7fbdff;
        display: inline-block;
        cursor: pointer;
    }

    .search-contact{

    }

    .con-bar{
        margin-top:2%; 
        margin-left: 7%; 
        margin-right:7%; 
        width: 80%;
        background-color: #DADADA;
        border-radius: 15px;
    }

    .contact-card{
        display:flex;
        height: 100px;
        width: 100%;
        cursor: pointer;
        border-radius: 15px;
    }

    .contact-card:hover{
        background-color:#DADADA;
    }

    .contact-img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }

    .user-info{
        display: flex;
        flex-direction: column;
        margin-top: 10%;
        font-family: 'Trebuchet MS';
    }

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

    .conversation-container{
        height: auto;
        width: 50%;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .conversation-footer{
        position: relative;
        display:flex;
    }

    .profile-container{
        height: auto;
        width: 29%;
        position: absolute;
        right: 0px;
    }

    .cta-btn {
        background-color: #0f1756;
        border-radius: 8px;
        border-style: none;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: \"Haas Grot Text R Web\", \"Helvetica Neue\", Helvetica, Arial, sans-serif;
        font-size: 14px;
        font-weight: 500;
        height: 40px;
        line-height: 20px;
        list-style: none;
        outline: none;
        padding: 10px 16px;
        position: relative;
        text-align: center;
        transition: color 100ms;
        vertical-align: baseline;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        margin-left:auto;
        margin-top: 1%;
    }

    .cta-btn,
    .cta-btn {
        background-color: #0f1756;
    }

    .msg-txt-area {
    resize: vertical;
    height: auto;
    max-height: 140px;
    width: auto;
    word-break: break-word;
    margin-left: 2%;
    margin-right: 1%;
    margin-top: 1%;
    margin-bottom: 2%;
    border-radius: 2px solid black;
    outline: none;
    resize: none;
    }

    .convo-flux{
        display: flex; 
        flex-direction: column; 
        height: auto;
        overflow-y: auto;
    }
</style>
{% endblock %}

{% block javascripts %}
    {{parent()}}    
    <script>
        function ajaxShowConvo(part_id, e_id) {
                document.getElementById(e_id).addEventListener(\"click\", () => {
                    document.getElementById(\"create-container\").style.display = \"none\";
                    \$.ajax({
                        type: 'POST',
                        url: '/show-convo',
                        data:{
                            'other-part': part_id,
                            'contact-click': 'contact-click'
                        },
                        success: function (response) {
                            console.log(part_id);
                            \$(\"#cc\").empty().html(response);
                            //console.log(response);
                        },
                        error: function (response) {
                            console.log('Error:', response);
                        }
                    })
                });
        }

        //TRANSFER THIS FUNCTION TO CONVERSATION.HTML. -> NO NEED???
        function ajaxAppendMessage(){
            \$(document).ready(() => {
                \$(\"#send-btn\").unbind().click(() => {
                    let msg_content = \$(\"comm-con\").val();
                    if(msg_content != \"\"){
                        if(\$(\"#cc\").parent().attr(\"id\") == \"-1\"){
                            let u_list = new Array();
                            let ch = document.getElementById(\"m-list\");
                            for(const child of ch.children){
                                u_list.push(child.firstChild.innerHTML);
                            }
                            \$.ajax({
                                type: 'POST',
                                url: '/send-msg',
                                data:{
                                    'conversation-id': \$(\"#send-btn\").parent().parent().attr(\"id\"),
                                    'msg-content': \$(\"#comm-con\").val(),
                                    'user': \"u\",
                                    'contact-click': 'contact-click',
                                    'u-list': u_list,
                                },
                                success: function (response) {
                                    \$(\"#cc\").append(response);
                                    //console.log(response);
                                },
                                error: function (response) {
                                    console.log('Error:', response);
                                }
                            })
                        } else {
                            \$.ajax({
                                type: 'POST',
                                url: '/send-msg',
                                data:{
                                    'conversation-id': \$(\"#send-btn\").parent().parent().attr(\"id\"),
                                    'msg-content': \$(\"#comm-con\").val(),
                                    'user': \"u\",
                                    'contact-click': 'contact-click'
                                },
                                success: function (response) {
                                    console.log(\"test\");
                                    \$(\"#cc\").append(response);
                                    //console.log(response);
                                },
                                error: function (response) {
                                    console.log('Error:', response);
                                }
                            })
                        }
                    }
                });
            });
        }

        function ajaxRecieveMessage(convo_id, msg){
            \$.ajax({
                type: 'POST',
                url: '/send-msg',
                data:{
                    'conversation-id': convo_id,
                    'msg-content': msg,
                    'user': \"o\",
                    'contact-click': 'contact-click'
                },
                success: function (response) {
                    console.log(\"jQuery succ\");
                    \$(\"#cc\").append(response);
                },
                error: function (response) {
                    console.log('Error:', response);
                }
            });
        }

        function findContacts(name){
            console.log(name);
            let add_data = new Array();
            add_data.push(\"-1\");
            let ch = document.getElementById(\"m-list\");
            for(const child of ch.children){
                add_data.push(child.firstChild.innerHTML);
            }
            \$.ajax({
                type: 'POST',
                url: '/get-contacts',
                data:{
                    'contact-name': name,
                    'additional-data': add_data
                },
                success: function(response){
                    //console.log(response);
                     \$(\"#modc-child\").html(response);
                },
                error: function(response){
                    console.log('Error:', response);
                }
            });
        }
    </script>

    <script src=\"https://js.pusher.com/7.2/pusher.min.js\"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('68154387874516026ac7', {
        cluster: 'eu'
        });

        function pusherChannels(convo_id, part_id){
            pid = \"cp\" + convo_id;
            var channel = pusher.subscribe(pid);
            channel.bind('message-sent', function(data) {
                console.log(data['message']);
                if(data['part'] == part_id){
                    console.log(\"\");
                } else {
                    ajaxRecieveMessage(convo_id, data['message']);
                }
            });
        }    
    </script>

    <script>
        let u_list_un = new Array();
        let u_list_id = new Array();
        var contacts = new Array();
        
        function pushContact(c){
            contacts.push(c);
        }

        function scrollBot(){
            var cc = document.getElementById(\"cc\");
            cc.scrollTop = cc.scrollHeight;
        }
        
        ////////////////////////////////////////////

        pageSetup();

        function pageSetup(){
            searchContact();
            detectNewChild();
        }

        function searchContact(){
            \$(document).ready(() => {
                var s = document.getElementById(\"cb\");
                s.addEventListener(\"input\", () => {
                    document.getElementsByName(\"a-contact\").forEach(e => {
                        if(e.innerHTML.includes(s.value)){
                            console.log(\"found\");
                            e.parentElement.parentElement.parentElement.style.display = \"flex\";
                        } else {
                            e.parentElement.parentElement.parentElement.style.display = \"none\";
                        }
                    });
                })
            })
        }

        function detectNewChild(){
            \$(document).ready(() => {
                let u_list = document.getElementById(\"m-list\").addEventListener(\"DOMNodeInserted\", e => {
                    let ch = document.getElementById(e.target.id);
                    console.log(ch.id);
                    if(ch.parentNode.id == \"m-list\"){
                        ch.addEventListener(\"click\", () => {
                            ch.remove();
                        });
                    }
                });
            })
        }
    </script>
{% endblock %}

{% block body %}
<div class=\"messagerie-container\">
    <div class=\"contacts-container\">
        <div class=\"contacts-features\">
            <div style=\"margin-top: 2%;\"><b>Inbox</b></div>
            <img id=\"f1\" src=\"{{ asset('resources/add-grp.png') }}\" class=\"feature-img\">
        </div>
        <div class=\"search-contact\" style=\"justify-content: center; width:auto;\">
            <input id=\"cb\" type=\"text\" placeholder=\"Search...\" class=\"con-bar\"></input>
        </div>
        {% for c in convos %}
        <div class=\"contact-card\" name=\"some-contact\" id=\"e_{{ loop.index }}\">
            <img src=\"{{ asset('resources/default.jpg') }}\" class=\"contact-img\" style=\"margin-left: 2%;\">
            <div class=\"user-info\" style=\"margin-left: 2%;\">
                <div ><b id=\"u_{{ loop.index }}\" name=\"a-contact\">
                    {% if c.type == \"grp\" %}
                        {{ c.title }}
                    {% else %}
                        {% for p in cp.other_participant(c) %}
                            {{ p.getUsername() }}
                        {% endfor %}
                    {% endif %}
                </b></div>
                <div style=\"text-overflow: ellipsis;white-space: nowrap;overflow: hidden; width: 80%;\">{{ c.getLastMessageStr }}</div>
            </div>
        </div>
        <script>
            {% for p in cp.other_participant(c) %}
                u_list_un.push(\"{{ p.getUsername() }}\");
                u_list_id.push(\"{{ p.getId() }}\");
            {% endfor %}
            ajaxShowConvo(u_list_id, \"e_{{ loop.index }}\");
            ajaxAppendMessage();
            pusherChannels(\"{{ c.id }}\", \"{{ cp.your_participant(c).getId() }}\");
            pushContact(u_list_un);
            u_list_un = [];
            u_list_id = [];
        </script>
        {% endfor %}
    </div>
    <div style=\"height:100%; width: 2px; background-color:#DADADA;\"></div>
    <div id=\"cc-container\" class=\"conversation-container\" name=\"conv-cont\">
        <div class=\"create-container\" id=\"create-container\" style=\"display:none;\">
            <div class=\"search-member\">
                <b>To:</b>
                <input id=\"ms\" type=\"text\" placeholder=\"Username...\" style=\"width: 60%; height: 80%; border: 0px; outline: none; margin-left: 1%;\">
            </div>
            <div class=\"modal-c\" id=\"modc\">
                <div id=\"modc-child\" style=\"display:flex; flex-direction: column;\">
                <!--content-->
                </div>
            </div>
            <div class=\"member-list\" id=\"m-list\">
            </div>
            <div style=\"height:2px; width: 100%; background-color:#DADADA;\"></div>
        </div>
        <div id=\"cc\" class=\"convo-flux\" style=\"\">  
            {% block conversation %}
            {% endblock %}
        </div>
        <div style=\"height:2px; width: 100%; background-color:#DADADA;position:relative;margin-top:auto;\"></div>
        <div class=\"conversation-footer\">
            <textarea id=\"comm-con\" name=\"your-add-comment\" placeholder=\"What are you thinking...\" class=\"msg-txt-area\"
            rows=\"2\" cols=\"80\"></textarea>
            <div id=\"send-btn\" class=\"cta-btn\">Send</div>
        </div>
    </div>
    <div style=\"height:100%; width: 2px; background-color:#DADADA;\"></div>
    <div class=\"profile-container\">
        <img id=\"profile-img\" src=\"{{ asset('resources/default.jpg') }}\" class=\"contact-img\" style=\"margin-left: 0%;\">
        <div id=\"profile-username\"><b>User</b></div>
    </div>
    <script>
        miscMsg();

        function miscMsg(){
            txtScroll();
            modalManipulation();
        }
        function txtScroll(){
            var textbox = document.getElementById(\"comm-con\");
            textbox.addEventListener(\"input\", () => {
                textbox.style.height = 'auto';
                textbox.style.height = `\${textbox.scrollHeight}px`;
            });
        }
        function modalManipulation(){
            document.getElementById(\"ms\").addEventListener(\"input\", () => {
                document.getElementById(\"modc\").style.display = \"block\";
                findContacts(document.getElementById(\"ms\").value);
            });

            window.addEventListener(\"click\", e => {
                if(e.target.id != \"ms\"){
                    document.getElementById(\"modc\").style.display = \"none\";
                } else {
                    document.getElementById(\"modc\").style.display = \"block\";
                }

                if(e.target.id == \"f1\"){
                    document.getElementById(\"create-container\").style.display = \"flex\";
                    document.getElementsByName(\"conv-cont\")[0].id = \"-1\";
                    document.getElementById(\"cc\").innerHTML = \"\";
                }
            })
        }
    </script>
    
</div>
{% endblock %}", "messagerie/messagerie.html.twig", "C:\\Users\\ASUS\\myProjects\\PI-DEV_TSpp_3A13\\web\\templates\\messagerie\\messagerie.html.twig");
    }
}

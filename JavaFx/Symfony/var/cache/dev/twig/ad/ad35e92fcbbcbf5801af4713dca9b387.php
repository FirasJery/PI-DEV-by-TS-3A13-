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

/* baseBack.html.twig */
class __TwigTemplate_9ae5cc32b60f6751b623b2ef8a2db992 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'contentblock' => [$this, 'block_contentblock'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "baseBack.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "baseBack.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
  <!-- Required meta tags -->
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo " </title>
  <!-- plugins:css -->
  <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/feather/feather.css"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/mdi/css/materialdesignicons.min.css"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/ti-icons/css/themify-icons.css"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/typicons/typicons.css"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/simple-line-icons/css/simple-line-icons.css"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/css/vendor.bundle.base.css"), "html", null, true);
        echo "\">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/datatables.net-bs4/dataTables.bootstrap4.css"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/select.dataTables.min.css"), "html", null, true);
        echo "\">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/vertical-layout-light/style.css"), "html", null, true);
        echo "\">
  <!-- endinject -->
  <link rel=\"shortcut icon\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon.png"), "html", null, true);
        echo "\" />
</head>
<body>
 
    <!-- partial:partials/_navbar.html -->
    <nav class=\"navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row\">
      <div class=\"text-center navbar-brand-wrapper d-flex align-items-center justify-content-start\">
        <div class=\"me-3\">
          <button class=\"navbar-toggler navbar-toggler align-self-center\" type=\"button\" data-bs-toggle=\"minimize\">
            <span class=\"icon-menu\"></span>
          </button>
        </div>
        <div>
          <a class=\"navbar-brand brand-logo\" href=\"index.html\">
            Freelancy
          </a>
        </div>
      </div>
      <div class=\"navbar-menu-wrapper d-flex align-items-top\"> 
        <ul class=\"navbar-nav\">
          <li class=\"nav-item font-weight-semibold d-none d-lg-block ms-0\">
            <h1 class=\"welcome-text\">Welcome, 
            ";
        // line 46
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 46, $this->source); })()), "user", [], "any", false, false, false, 46)) {
            // line 47
            echo "            <span class=\"text-black fw-bold\"> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 47, $this->source); })()), "user", [], "any", false, false, false, 47), "name", [], "any", false, false, false, 47), "html", null, true);
            echo " </span>
             ";
        }
        // line 49
        echo "            </h1>
            <h3 class=\"welcome-sub-text\">Your performance summary this week </h3>
          </li>
        </ul>
        <ul class=\"navbar-nav ms-auto\">
          
          
          <li class=\"nav-item\">
            <form class=\"search-form\" action=\"#\">
              <i class=\"icon-search\"></i>
              <input type=\"search\" class=\"form-control\" placeholder=\"Search Here\" title=\"Search here\">
            </form>
          </li>

          
          <li class=\"nav-item dropdown d-none d-lg-block user-dropdown\">
            <a class=\"nav-link\" id=\"UserDropdown\" href=\"#\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
              <img class=\"img-xs rounded-circle\" src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 66, $this->source); })()), "user", [], "any", false, false, false, 66), "ImagePath", [], "any", false, false, false, 66))), "html", null, true);
        echo "\" alt=\"Profile image\"> </a>
            <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown\" aria-labelledby=\"UserDropdown\">
              <div class=\"dropdown-header text-center\">
                
                <img class=\"img-md rounded-circle\" src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "user", [], "any", false, false, false, 70), "ImagePath", [], "any", false, false, false, 70))), "html", null, true);
        echo "\" height = \"100\" width = \"100\" alt=\"Profile image\">
                <p class=\"mb-1 mt-3 font-weight-semibold\">";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71), "name", [], "any", false, false, false, 71), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71), "LastName", [], "any", false, false, false, 71), "html", null, true);
        echo "</p>
                <p class=\"fw-light text-muted mb-0\">";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72), "email", [], "any", false, false, false, 72), "html", null, true);
        echo "</p>
              </div>
              <a class=\"dropdown-item\" href = \"";
        // line 74
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_show", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 74, $this->source); })()), "user", [], "any", false, false, false, 74), "id", [], "any", false, false, false, 74)]), "html", null, true);
        echo "\"><i class=\"dropdown-item-icon mdi mdi-account-outline text-primary me-2\" ></i> My Profile </a>
              <a class=\"dropdown-item\" href=\"";
        // line 75
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        echo "\"><i class=\"dropdown-item-icon mdi mdi-power text-primary me-2\"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class=\"navbar-toggler navbar-toggler-right d-lg-none align-self-center\" type=\"button\" data-bs-toggle=\"offcanvas\">
          <span class=\"mdi mdi-menu\"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class=\"container-fluid page-body-wrapper\">
      <!-- partial:partials/_settings-panel.html -->
      <div class=\"theme-setting-wrapper\">
        <div id=\"settings-trigger\"><i class=\"ti-settings\"></i></div>
        <div id=\"theme-settings\" class=\"settings-panel\">
          <i class=\"settings-close ti-close\"></i>
          <p class=\"settings-heading\">SIDEBAR SKINS</p>
          <div class=\"sidebar-bg-options selected\" id=\"sidebar-light-theme\"><div class=\"img-ss rounded-circle bg-light border me-3\"></div>Light</div>
          <div class=\"sidebar-bg-options\" id=\"sidebar-dark-theme\"><div class=\"img-ss rounded-circle bg-dark border me-3\"></div>Dark</div>
          <p class=\"settings-heading mt-2\">HEADER SKINS</p>
          <div class=\"color-tiles mx-0 px-4\">
            <div class=\"tiles success\"></div>
            <div class=\"tiles warning\"></div>
            <div class=\"tiles danger\"></div>
            <div class=\"tiles info\"></div>
            <div class=\"tiles dark\"></div>
            <div class=\"tiles default\"></div>
          </div>
        </div>
      </div>
      <div id=\"right-sidebar\" class=\"settings-panel\">
        <i class=\"settings-close ti-close\"></i>
        <ul class=\"nav nav-tabs border-top\" id=\"setting-panel\" role=\"tablist\">
          <li class=\"nav-item\">
            <a class=\"nav-link active\" id=\"todo-tab\" data-bs-toggle=\"tab\" href=\"#todo-section\" role=\"tab\" aria-controls=\"todo-section\" aria-expanded=\"true\">TO DO LIST</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" id=\"chats-tab\" data-bs-toggle=\"tab\" href=\"#chats-section\" role=\"tab\" aria-controls=\"chats-section\">CHATS</a>
          </li>
        </ul>
        <div class=\"tab-content\" id=\"setting-content\">
          <div class=\"tab-pane fade show active scroll-wrapper\" id=\"todo-section\" role=\"tabpanel\" aria-labelledby=\"todo-section\">
            <div class=\"add-items d-flex px-3 mb-0\">
              <form class=\"form w-100\">
                <div class=\"form-group d-flex\">
                  <input type=\"text\" class=\"form-control todo-list-input\" placeholder=\"Add To-do\">
                  <button type=\"submit\" class=\"add btn btn-primary todo-list-add-btn\" id=\"add-task\">Add</button>
                </div>
              </form>
            </div>
            <div class=\"list-wrapper px-3\">
              <ul class=\"d-flex flex-column-reverse todo-list\">
                <li>
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
                <li>
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
                <li>
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
                <li class=\"completed\">
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
                <li class=\"completed\">
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\" checked>
                      Project review
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
              </ul>
            </div>
            <h4 class=\"px-3 text-muted mt-5 fw-light mb-0\">Events</h4>
            <div class=\"events pt-4 px-3\">
              <div class=\"wrapper d-flex mb-2\">
                <i class=\"ti-control-record text-primary me-2\"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class=\"mb-0 font-weight-thin text-gray\">Creating component page build a js</p>
              <p class=\"text-gray mb-0\">The total number of sessions</p>
            </div>
            <div class=\"events pt-4 px-3\">
              <div class=\"wrapper d-flex mb-2\">
                <i class=\"ti-control-record text-primary me-2\"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class=\"mb-0 font-weight-thin text-gray\">Meeting with Alisa</p>
              <p class=\"text-gray mb-0 \">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class=\"tab-pane fade\" id=\"chats-section\" role=\"tabpanel\" aria-labelledby=\"chats-section\">
            <div class=\"d-flex align-items-center justify-content-between border-bottom\">
              <p class=\"settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0\">Friends</p>
              <small class=\"settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal\">See All</small>
            </div>
            <ul class=\"chat-list\">
              <li class=\"list active\">
                <div class=\"profile\"><img src=\"images/faces/face1.jpg\" alt=\"image\"><span class=\"online\"></span></div>
                <div class=\"info\">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class=\"text-muted my-auto\">19 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face2.jpg\" alt=\"image\"><span class=\"offline\"></span></div>
                <div class=\"info\">
                  <div class=\"wrapper d-flex\">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class=\"badge badge-success badge-pill my-auto mx-2\">4</div>
                <small class=\"text-muted my-auto\">23 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face3.jpg\" alt=\"image\"><span class=\"online\"></span></div>
                <div class=\"info\">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class=\"text-muted my-auto\">14 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face4.jpg\" alt=\"image\"><span class=\"offline\"></span></div>
                <div class=\"info\">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class=\"text-muted my-auto\">2 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face5.jpg\" alt=\"image\"><span class=\"online\"></span></div>
                <div class=\"info\">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class=\"text-muted my-auto\">5 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face6.jpg\" alt=\"image\"><span class=\"online\"></span></div>
                <div class=\"info\">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class=\"text-muted my-auto\">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class=\"sidebar sidebar-offcanvas\" id=\"sidebar\">
        <ul class=\"nav\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 260
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        echo "\">
              <i class=\"mdi mdi-grid-large menu-icon\"></i>
              <span class=\"menu-title\">Dashboard</span>
            </a>
          </li>
          <li class=\"nav-item nav-category\">Manage</li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" data-bs-toggle=\"collapse\" href=\"#ui-basic\" aria-expanded=\"false\" aria-controls=\"ui-basic\">
              <i class=\"menu-icon mdi mdi-floor-plan\"></i>
              <span class=\"menu-title\"> Manage </span>
              <i class=\"menu-arrow\"></i> 
            </a>
            <div class=\"collapse\" id=\"ui-basic\">
              <ul class=\"nav flex-column sub-menu\">
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
        // line 274
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateur_index");
        echo "\">Users</a></li>
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"pages/ui-features/dropdowns.html\"> FIll </a></li>
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"pages/ui-features/typography.html\"> Fill </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class=\"main-panel\">
        <div class=\"content-wrapper\">
         ";
        // line 285
        $this->displayBlock('contentblock', $context, $blocks);
        // line 286
        echo "          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class=\"footer\">
         
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
 </div>
  <!-- container-scroller -->
  
  <!-- plugins:js -->
  <script src=\"";
        // line 302
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/js/vendor.bundle.base.js"), "html", null, true);
        echo "\"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src=\"";
        // line 305
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/chart.js/Chart.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 306
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 307
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("vendors/progressbar.js/progressbar.min.js"), "html", null, true);
        echo "\"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src=\"";
        // line 311
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/off-canvas.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 312
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/hoverable-collapse.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 313
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/template.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 314
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/settings.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 315
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/todolist.js"), "html", null, true);
        echo "\"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src=\"";
        // line 318
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.cookie.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 319
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 320
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/Chart.roundedBarCharts.js"), "html", null, true);
        echo "\"></script>
  <!-- End custom js for this page-->
</body>

</html>


";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 285
    public function block_contentblock($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contentblock"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "contentblock"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "baseBack.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  504 => 285,  486 => 8,  468 => 320,  464 => 319,  460 => 318,  454 => 315,  450 => 314,  446 => 313,  442 => 312,  438 => 311,  431 => 307,  427 => 306,  423 => 305,  417 => 302,  399 => 286,  397 => 285,  383 => 274,  366 => 260,  178 => 75,  174 => 74,  169 => 72,  163 => 71,  159 => 70,  152 => 66,  133 => 49,  127 => 47,  125 => 46,  100 => 24,  95 => 22,  89 => 19,  85 => 18,  79 => 15,  75 => 14,  71 => 13,  67 => 12,  63 => 11,  59 => 10,  54 => 8,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">

<head>
  <!-- Required meta tags -->
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <title>{% block title %}{% endblock %} </title>
  <!-- plugins:css -->
  <link rel=\"stylesheet\" href=\"{{asset('vendors/feather/feather.css')}}\">
  <link rel=\"stylesheet\" href=\"{{asset('vendors/mdi/css/materialdesignicons.min.css')}}\">
  <link rel=\"stylesheet\" href=\"{{asset('vendors/ti-icons/css/themify-icons.css')}}\">
  <link rel=\"stylesheet\" href=\"{{asset('vendors/typicons/typicons.css')}}\">
  <link rel=\"stylesheet\" href=\"{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}\">
  <link rel=\"stylesheet\" href=\"{{asset('vendors/css/vendor.bundle.base.css')}}\">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel=\"stylesheet\" href=\"{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}\">
  <link rel=\"stylesheet\" href=\"{{asset('js/select.dataTables.min.css')}}\">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel=\"stylesheet\" href=\"{{asset('css/vertical-layout-light/style.css')}}\">
  <!-- endinject -->
  <link rel=\"shortcut icon\" href=\"{{asset('images/favicon.png')}}\" />
</head>
<body>
 
    <!-- partial:partials/_navbar.html -->
    <nav class=\"navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row\">
      <div class=\"text-center navbar-brand-wrapper d-flex align-items-center justify-content-start\">
        <div class=\"me-3\">
          <button class=\"navbar-toggler navbar-toggler align-self-center\" type=\"button\" data-bs-toggle=\"minimize\">
            <span class=\"icon-menu\"></span>
          </button>
        </div>
        <div>
          <a class=\"navbar-brand brand-logo\" href=\"index.html\">
            Freelancy
          </a>
        </div>
      </div>
      <div class=\"navbar-menu-wrapper d-flex align-items-top\"> 
        <ul class=\"navbar-nav\">
          <li class=\"nav-item font-weight-semibold d-none d-lg-block ms-0\">
            <h1 class=\"welcome-text\">Welcome, 
            {% if app.user %}
            <span class=\"text-black fw-bold\"> {{ app.user.name }} </span>
             {% endif %}
            </h1>
            <h3 class=\"welcome-sub-text\">Your performance summary this week </h3>
          </li>
        </ul>
        <ul class=\"navbar-nav ms-auto\">
          
          
          <li class=\"nav-item\">
            <form class=\"search-form\" action=\"#\">
              <i class=\"icon-search\"></i>
              <input type=\"search\" class=\"form-control\" placeholder=\"Search Here\" title=\"Search here\">
            </form>
          </li>

          
          <li class=\"nav-item dropdown d-none d-lg-block user-dropdown\">
            <a class=\"nav-link\" id=\"UserDropdown\" href=\"#\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
              <img class=\"img-xs rounded-circle\" src=\"{{ asset('' ~ app.user.ImagePath) }}\" alt=\"Profile image\"> </a>
            <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown\" aria-labelledby=\"UserDropdown\">
              <div class=\"dropdown-header text-center\">
                
                <img class=\"img-md rounded-circle\" src=\"{{ asset('' ~ app.user.ImagePath) }}\" height = \"100\" width = \"100\" alt=\"Profile image\">
                <p class=\"mb-1 mt-3 font-weight-semibold\">{{app.user.name}} {{app.user.LastName}}</p>
                <p class=\"fw-light text-muted mb-0\">{{app.user.email}}</p>
              </div>
              <a class=\"dropdown-item\" href = \"{{ path('app_utilisateur_show', {'id': app.user.id}) }}\"><i class=\"dropdown-item-icon mdi mdi-account-outline text-primary me-2\" ></i> My Profile </a>
              <a class=\"dropdown-item\" href=\"{{ path('app_logout') }}\"><i class=\"dropdown-item-icon mdi mdi-power text-primary me-2\"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class=\"navbar-toggler navbar-toggler-right d-lg-none align-self-center\" type=\"button\" data-bs-toggle=\"offcanvas\">
          <span class=\"mdi mdi-menu\"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class=\"container-fluid page-body-wrapper\">
      <!-- partial:partials/_settings-panel.html -->
      <div class=\"theme-setting-wrapper\">
        <div id=\"settings-trigger\"><i class=\"ti-settings\"></i></div>
        <div id=\"theme-settings\" class=\"settings-panel\">
          <i class=\"settings-close ti-close\"></i>
          <p class=\"settings-heading\">SIDEBAR SKINS</p>
          <div class=\"sidebar-bg-options selected\" id=\"sidebar-light-theme\"><div class=\"img-ss rounded-circle bg-light border me-3\"></div>Light</div>
          <div class=\"sidebar-bg-options\" id=\"sidebar-dark-theme\"><div class=\"img-ss rounded-circle bg-dark border me-3\"></div>Dark</div>
          <p class=\"settings-heading mt-2\">HEADER SKINS</p>
          <div class=\"color-tiles mx-0 px-4\">
            <div class=\"tiles success\"></div>
            <div class=\"tiles warning\"></div>
            <div class=\"tiles danger\"></div>
            <div class=\"tiles info\"></div>
            <div class=\"tiles dark\"></div>
            <div class=\"tiles default\"></div>
          </div>
        </div>
      </div>
      <div id=\"right-sidebar\" class=\"settings-panel\">
        <i class=\"settings-close ti-close\"></i>
        <ul class=\"nav nav-tabs border-top\" id=\"setting-panel\" role=\"tablist\">
          <li class=\"nav-item\">
            <a class=\"nav-link active\" id=\"todo-tab\" data-bs-toggle=\"tab\" href=\"#todo-section\" role=\"tab\" aria-controls=\"todo-section\" aria-expanded=\"true\">TO DO LIST</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" id=\"chats-tab\" data-bs-toggle=\"tab\" href=\"#chats-section\" role=\"tab\" aria-controls=\"chats-section\">CHATS</a>
          </li>
        </ul>
        <div class=\"tab-content\" id=\"setting-content\">
          <div class=\"tab-pane fade show active scroll-wrapper\" id=\"todo-section\" role=\"tabpanel\" aria-labelledby=\"todo-section\">
            <div class=\"add-items d-flex px-3 mb-0\">
              <form class=\"form w-100\">
                <div class=\"form-group d-flex\">
                  <input type=\"text\" class=\"form-control todo-list-input\" placeholder=\"Add To-do\">
                  <button type=\"submit\" class=\"add btn btn-primary todo-list-add-btn\" id=\"add-task\">Add</button>
                </div>
              </form>
            </div>
            <div class=\"list-wrapper px-3\">
              <ul class=\"d-flex flex-column-reverse todo-list\">
                <li>
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
                <li>
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
                <li>
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
                <li class=\"completed\">
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
                <li class=\"completed\">
                  <div class=\"form-check\">
                    <label class=\"form-check-label\">
                      <input class=\"checkbox\" type=\"checkbox\" checked>
                      Project review
                    </label>
                  </div>
                  <i class=\"remove ti-close\"></i>
                </li>
              </ul>
            </div>
            <h4 class=\"px-3 text-muted mt-5 fw-light mb-0\">Events</h4>
            <div class=\"events pt-4 px-3\">
              <div class=\"wrapper d-flex mb-2\">
                <i class=\"ti-control-record text-primary me-2\"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class=\"mb-0 font-weight-thin text-gray\">Creating component page build a js</p>
              <p class=\"text-gray mb-0\">The total number of sessions</p>
            </div>
            <div class=\"events pt-4 px-3\">
              <div class=\"wrapper d-flex mb-2\">
                <i class=\"ti-control-record text-primary me-2\"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class=\"mb-0 font-weight-thin text-gray\">Meeting with Alisa</p>
              <p class=\"text-gray mb-0 \">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class=\"tab-pane fade\" id=\"chats-section\" role=\"tabpanel\" aria-labelledby=\"chats-section\">
            <div class=\"d-flex align-items-center justify-content-between border-bottom\">
              <p class=\"settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0\">Friends</p>
              <small class=\"settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal\">See All</small>
            </div>
            <ul class=\"chat-list\">
              <li class=\"list active\">
                <div class=\"profile\"><img src=\"images/faces/face1.jpg\" alt=\"image\"><span class=\"online\"></span></div>
                <div class=\"info\">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class=\"text-muted my-auto\">19 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face2.jpg\" alt=\"image\"><span class=\"offline\"></span></div>
                <div class=\"info\">
                  <div class=\"wrapper d-flex\">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class=\"badge badge-success badge-pill my-auto mx-2\">4</div>
                <small class=\"text-muted my-auto\">23 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face3.jpg\" alt=\"image\"><span class=\"online\"></span></div>
                <div class=\"info\">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class=\"text-muted my-auto\">14 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face4.jpg\" alt=\"image\"><span class=\"offline\"></span></div>
                <div class=\"info\">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class=\"text-muted my-auto\">2 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face5.jpg\" alt=\"image\"><span class=\"online\"></span></div>
                <div class=\"info\">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class=\"text-muted my-auto\">5 min</small>
              </li>
              <li class=\"list\">
                <div class=\"profile\"><img src=\"images/faces/face6.jpg\" alt=\"image\"><span class=\"online\"></span></div>
                <div class=\"info\">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class=\"text-muted my-auto\">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class=\"sidebar sidebar-offcanvas\" id=\"sidebar\">
        <ul class=\"nav\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ path('app_dashboard') }}\">
              <i class=\"mdi mdi-grid-large menu-icon\"></i>
              <span class=\"menu-title\">Dashboard</span>
            </a>
          </li>
          <li class=\"nav-item nav-category\">Manage</li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" data-bs-toggle=\"collapse\" href=\"#ui-basic\" aria-expanded=\"false\" aria-controls=\"ui-basic\">
              <i class=\"menu-icon mdi mdi-floor-plan\"></i>
              <span class=\"menu-title\"> Manage </span>
              <i class=\"menu-arrow\"></i> 
            </a>
            <div class=\"collapse\" id=\"ui-basic\">
              <ul class=\"nav flex-column sub-menu\">
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"{{ path('app_utilisateur_index') }}\">Users</a></li>
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"pages/ui-features/dropdowns.html\"> FIll </a></li>
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"pages/ui-features/typography.html\"> Fill </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class=\"main-panel\">
        <div class=\"content-wrapper\">
         {% block contentblock %}{% endblock %}
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class=\"footer\">
         
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
 </div>
  <!-- container-scroller -->
  
  <!-- plugins:js -->
  <script src=\"{{asset('vendors/js/vendor.bundle.base.js')}}\"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src=\"{{asset('vendors/chart.js/Chart.min.js')}}\"></script>
  <script src=\"{{asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}\"></script>
  <script src=\"{{asset('vendors/progressbar.js/progressbar.min.js')}}\"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src=\"{{asset('js/off-canvas.js')}}\"></script>
  <script src=\"{{asset('js/hoverable-collapse.js')}}\"></script>
  <script src=\"{{asset('js/template.js')}}\"></script>
  <script src=\"{{asset('js/settings.js')}}\"></script>
  <script src=\"{{asset('js/todolist.js')}}\"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src=\"{{asset('js/jquery.cookie.js')}}\" type=\"text/javascript\"></script>
  <script src=\"{{asset('js/dashboard.js')}}\"></script>
  <script src=\"{{asset('js/Chart.roundedBarCharts.js')}}\"></script>
  <!-- End custom js for this page-->
</body>

</html>


", "baseBack.html.twig", "C:\\Users\\Firas\\Desktop\\TestUser\\templates\\baseBack.html.twig");
    }
}

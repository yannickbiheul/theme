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

/* modules/custom/banner_chic/templates/my-template.html.twig */
class __TwigTemplate_04e7f378de6242c269106a0654f84d7e extends \Twig\Template
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
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<section class=\"container-fluid\">

    ";
        // line 5
        echo "    <div class=\"row banniere d-flex justify-content-between align-items-center\" style=\"border: 1px solid green;\">

        ";
        // line 8
        echo "        <div class=\"col banniere1 d-flex flex-column justify-content-center align-items-center\">
            <h1>L'intranet du CHIC</h1>
            <div class=\"recherche\">
                <input type=\"text\">
                <button class=\"btn btn-primary\">Rechercher</button>
            </div>
        </div>

        ";
        // line 17
        echo "        <div class=\"col banniere2 d-flex justify-content-center\">
            <div class=\"acces-rapides\">
                <h3>Accès Rapides</h3>
                <ul>
                    <li><a href=\"";
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lien_service1"] ?? null), 21, $this->source), "html", null, true);
        echo "\" target=\"_blank\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["service1"] ?? null), 21, $this->source), "html", null, true);
        echo "</a></li>
                    <li><a href=\"";
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lien_service2"] ?? null), 22, $this->source), "html", null, true);
        echo "\" target=\"_blank\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["service2"] ?? null), 22, $this->source), "html", null, true);
        echo "</a></li>
                    <li><a href=\"";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lien_service3"] ?? null), 23, $this->source), "html", null, true);
        echo "\" target=\"_blank\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["service3"] ?? null), 23, $this->source), "html", null, true);
        echo "</a></li>
                    <li><a href=\"";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lien_service4"] ?? null), 24, $this->source), "html", null, true);
        echo "\" target=\"_blank\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["service4"] ?? null), 24, $this->source), "html", null, true);
        echo "</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<style>
.banniere {
    background-color: #2980b9;
    color: #fff;
    height: 400px;
}

.acces-rapides {
    background-color: #fff;
    color: #000;
    width: 300px;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 4px 4px 4px;
}

.acces-rapides a {
    text-decoration: none;
    color: #000;
}

.acces-rapides ul li {
    margin-bottom: 5px;
}
</style>";
    }

    public function getTemplateName()
    {
        return "modules/custom/banner_chic/templates/my-template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 24,  75 => 23,  69 => 22,  63 => 21,  57 => 17,  47 => 8,  43 => 5,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/banner_chic/templates/my-template.html.twig", "C:\\Users\\yannick.biheul\\UwAmp\\www\\theme\\modules\\custom\\banner_chic\\templates\\my-template.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 21);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}

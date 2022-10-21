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

/* modules/custom/actus/templates/actus-template.html.twig */
class __TwigTemplate_70126363d6339d953d1b28c3f09d648b extends \Twig\Template
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
        // line 1
        echo "<section class=\"container\">
    ";
        // line 3
        echo "    <div class=\"row actus d-flex justify-content-between pt-5\">
        <div class=\"col-5 evenements\">
            ";
        // line 6
        echo "            <div class=\"row titre d-flex justify-content-between\">
                <h2 style=\";width:40%;\">Événements</h2>
                <a href=\"#\" class=\"btn btn-primary\" style=\"width:40%;\">Voir tout</a>
            </div>
            ";
        // line 11
        echo "            <div class=\"row d-flex justify-content-center\">
                <div class=\"carte-evenement\">
                    <div class=\"date\">
                        <div class=\"carre\">
                            <p>Date</p>
                        </div>
                    </div>
                    <div class=\"contenu\">
                        <h3>Nom de l'événement</h3>
                        <p>Description de l'événement</p>
                    </div>
                </div>
            </div>
            ";
        // line 25
        echo "            <div class=\"row d-flex justify-content-center\">
                <div class=\"carte-evenement\">
                    <div class=\"date\">
                        <div class=\"carre\">
                            <p>Date</p>
                        </div>
                    </div>
                    <div class=\"contenu\">
                        <h3>Nom de l'événement</h3>
                        <p>Description de l'événement</p>
                    </div>
                </div>
            </div>
            ";
        // line 39
        echo "            <div class=\"row d-flex justify-content-center\">
                <div class=\"carte-evenement\">
                    <div class=\"date\">
                        <div class=\"carre\">
                            <p>Date</p>
                        </div>
                    </div>
                    <div class=\"contenu\">
                        <h3>Nom de l'événement</h3>
                        <p>Description de l'événement</p>
                    </div>
                </div>
            </div>
            ";
        // line 53
        echo "            <div class=\"row d-flex justify-content-center\">
                <div class=\"carte-evenement\">
                    <div class=\"date\">
                        <div class=\"carre\">
                            <p>Date</p>
                        </div>
                    </div>
                    <div class=\"contenu\">
                        <h3>Nom de l'événement</h3>
                        <p>Description de l'événement</p>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-6 actualites\">
            ";
        // line 69
        echo "            <div class=\"row titre d-flex justify-content-between\">
                <h2 style=\";width:40%;\">Actualités</h2>
                <a href=\"#\" class=\"btn btn-primary\" style=\"width:40%;\">Voir tout</a>
            </div>
            ";
        // line 74
        echo "            <div class=\"row d-flex justify-content-center\">
                <div class=\"carte-evenement carte-actualite\">
                    <div class=\"date\">
                        <div class=\"carreActu\">
                            <p>Image</p>
                        </div>
                    </div>
                    <div class=\"contenu\">
                        <h3>Nom de l'actualité</h3>
                        <p>Description de l'actualité</p>
                    </div>
                </div>
            </div>
            ";
        // line 88
        echo "            <div class=\"row d-flex justify-content-center\">
                <div class=\"carte-evenement carte-actualite\">
                    <div class=\"date\">
                        <div class=\"carreActu\">
                            <p>Image</p>
                        </div>
                    </div>
                    <div class=\"contenu\">
                        <h3>Nom de l'actualité</h3>
                        <p>Description de l'actualité</p>
                    </div>
                </div>
            </div>
            <div class=\"row d-flex justify-content-center\">
                <div class=\"carte-evenement carte-actualite\">
                    <div class=\"date\">
                        <div class=\"carreActu\">
                            <p>Image</p>
                        </div>
                    </div>
                    <div class=\"contenu\">
                        <h3>Nom de l'actualité</h3>
                        <p>Description de l'actualité</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.titre {
    margin-bottom: 40px;
}

.carte-evenement {
    border: 1px solid #ccc;
    box-shadow: 2px 2px 4px #000;
    padding: 5px;
    width: 80%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-bottom: 20px;
}

.carte-actualite {
    width: 100%;
}

.carre {
    border: 1px solid #ccc;
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carreActu {
    border: 1px solid #ccc;
    width: 150px;
    height: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.contenu {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
}
</style>";
    }

    public function getTemplateName()
    {
        return "modules/custom/actus/templates/actus-template.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  135 => 88,  120 => 74,  114 => 69,  97 => 53,  82 => 39,  67 => 25,  52 => 11,  46 => 6,  42 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/actus/templates/actus-template.html.twig", "C:\\Users\\yannick.biheul\\UwAmp\\www\\theme\\modules\\custom\\actus\\templates\\actus-template.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
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

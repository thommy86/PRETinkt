<?php

/* home/index.php */
class __TwigTemplate_421ccef7e3d1d391c0d5eeba8c3514226da877c352d2c3f0c33d9d7136772499 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '__internal_3d4cf27ff5a03fb18e6ea349fda5bf54dbe35e250c1dad4d51a25a3a10cbc9cd' => array($this, 'block___internal_3d4cf27ff5a03fb18e6ea349fda5bf54dbe35e250c1dad4d51a25a3a10cbc9cd'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Hallloo 
<br>
<?php echo \$data['product']->naam; echo \$data['product']->omschrijving; ?>
<br>
<?php echo \$data['config']->webwinkelnaam ?>

";
        // line 7
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, (string) $this->renderBlock("__internal_3d4cf27ff5a03fb18e6ea349fda5bf54dbe35e250c1dad4d51a25a3a10cbc9cd", $context, $blocks)), "html", null, true);
    }

    public function block___internal_3d4cf27ff5a03fb18e6ea349fda5bf54dbe35e250c1dad4d51a25a3a10cbc9cd($context, array $blocks = array())
    {
        // line 8
        echo "    This text becomes uppercase
";
    }

    public function getTemplateName()
    {
        return "home/index.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  28 => 7,  20 => 1,);
    }
}
/* Hallloo */
/* <br>*/
/* <?php echo $data['product']->naam; echo $data['product']->omschrijving; ?>*/
/* <br>*/
/* <?php echo $data['config']->webwinkelnaam ?>*/
/* */
/* {% filter upper %}*/
/*     This text becomes uppercase*/
/* {% endfilter %}*/

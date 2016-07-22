<?php
class __MyTemplates_890f9cac0e0664cee66aab81469a878b extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('header')) {
            $buffer .= $partial->renderInternal($context, '');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '<p>Page content</p>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context, '');
        }
        return $buffer;
    }
}

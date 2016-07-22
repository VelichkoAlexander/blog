<?php
class __MyTemplates_421d3af304589f5ebd4a81b53c18d315 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<h2>Category</h2>
';
        $value = $this->resolveValue($context->find('breadcrumbs'), $context, $indent);
        $buffer .= $indent . call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '
';
        // 'cat_list' section
        $buffer .= $this->sectionD174dfd7a4a2c493cbe1ce4c5615c76a($context, $indent, $context->find('cat_list'));
        return $buffer;
    }

    private function sectionD174dfd7a4a2c493cbe1ce4c5615c76a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
    <a href="../Items/{{uri}}">{{title}}</a>
    </br>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '    <a href="../Items/';
                $value = $this->resolveValue($context->find('uri'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('title'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a>
';
                $buffer .= $indent . '    </br>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

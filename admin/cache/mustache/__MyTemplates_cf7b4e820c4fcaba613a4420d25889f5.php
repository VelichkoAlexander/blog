<?php
class __MyTemplates_cf7b4e820c4fcaba613a4420d25889f5 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'posts' section
        $buffer .= $this->section0a6b4f4309dc3adc99f7a1496f88f42f($context, $indent, $context->find('posts'));
        return $buffer;
    }

    private function section0a6b4f4309dc3adc99f7a1496f88f42f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
    <h2><a href="post/{{uri}}">{{title}}</a></h2>
    <p>{{short_text}}</p>

';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '    <h2><a href="post/';
                $value = $this->resolveValue($context->find('uri'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('title'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a></h2>
';
                $buffer .= $indent . '    <p>';
                $value = $this->resolveValue($context->find('short_text'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</p>
';
                $buffer .= $indent . '
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

<?php
class __MyTemplates_b3002142155dda399f643f71a3af92cd extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="container">
';
        $buffer .= $indent . '    <div class="row">
';
        $buffer .= $indent . '
';
        // 'posts' section
        $buffer .= $this->section8aa9cc539aed35c9e04bda86477f82a6($context, $indent, $context->find('posts'));
        $buffer .= $indent . '        <div class="row">
';
        $buffer .= $indent . '            <div class="text-center">
';
        $buffer .= $indent . '                ';
        $value = $this->resolveValue($context->find('pagination'), $context, $indent);
        $buffer .= $value;
        $buffer .= '
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        return $buffer;
    }

    private function section8aa9cc539aed35c9e04bda86477f82a6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
            <h2><a href="Posts/{{uri}}">{{title}}</a></h2>
            <p>{{{short_text}}}</p>
        ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '            <h2><a href="Posts/';
                $value = $this->resolveValue($context->find('uri'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('title'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a></h2>
';
                $buffer .= $indent . '            <p>';
                $value = $this->resolveValue($context->find('short_text'), $context, $indent);
                $buffer .= $value;
                $buffer .= '</p>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

<?php
class __MyTemplates_b0dc45d9610640e5ea3f07a0b160f5ed extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<spna>';
        $value = $this->resolveValue($context->find('nice_date'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</spna>
';
        $buffer .= $indent . '<h1>';
        $value = $this->resolveValue($context->find('title'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</h1>
';
        $buffer .= $indent . '<div>';
        $value = $this->resolveValue($context->find('category_title'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</div>
';
        $buffer .= $indent . '<div>';
        $value = $this->resolveValue($context->find('text'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</div>
';
        $buffer .= $indent . '
';
        // 'tags' section
        $buffer .= $this->section0f0853c9e35039936749b5344c422a14($context, $indent, $context->find('tags'));
        return $buffer;
    }

    private function section0f0853c9e35039936749b5344c422a14(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
   <p>{{title}}</p>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '   <p>';
                $value = $this->resolveValue($context->find('title'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</p>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

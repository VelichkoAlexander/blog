<?php
class __MyTemplates_481e85647b21bc1043484e8b62c11991 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'posts' section
        $buffer .= $this->section6026b9bd3404b85342a34d0a65528d98($context, $indent, $context->find('posts'));
        return $buffer;
    }

    private function section6026b9bd3404b85342a34d0a65528d98(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
    <h2><a href="Posts/{{uri}}">{{title}}</a></h2>
    <p>{{short_text}}</p>

';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '    <h2><a href="Posts/';
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
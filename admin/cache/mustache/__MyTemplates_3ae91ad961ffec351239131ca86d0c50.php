<?php
class __MyTemplates_3ae91ad961ffec351239131ca86d0c50 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h1>Dashboard</h1>
';
        $value = $this->resolveValue($context->find('msg'), $context, $indent);
        $buffer .= $indent . call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<form action="Admin/record_add" method="post">
';
        $buffer .= $indent . '    <div>
';
        $buffer .= $indent . '        <label for="uri">URI</label>
';
        $buffer .= $indent . '        <input type="text" id="uri" name="uri" value="" placeholder="uri"/>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div>
';
        $buffer .= $indent . '        <label for="title">title</label>
';
        $buffer .= $indent . '        <input type="text" id="title" name="title" value="" placeholder="title"/>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div>
';
        $buffer .= $indent . '        <textarea name="body" id="body" rows="10" cols="40" placeholder="Post"> </textarea>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <input type="submit" value="Submit Post"/>
';
        $buffer .= $indent . '</form>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<a href="Admin/logout">logout</a>';
        return $buffer;
    }
}

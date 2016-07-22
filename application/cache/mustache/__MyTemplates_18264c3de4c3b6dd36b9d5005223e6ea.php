<?php
class __MyTemplates_18264c3de4c3b6dd36b9d5005223e6ea extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h1>Dashboard</h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<form action="Admin/record_add" method="post">
';
        $buffer .= $indent . '    <div>
';
        $buffer .= $indent . '        <input type="text" id="title" name="title" value="title"/>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div>
';
        $buffer .= $indent . '        <textarea name="body" id="body" rows="10" cols="40"> Comment</textarea>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <input type="submit" value="Submit Post"/>
';
        $buffer .= $indent . '</form>';
        return $buffer;
    }
}

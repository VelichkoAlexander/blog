<?php
class __MyTemplates_07a4a649adde40eb461e8d0a0c029062 extends Mustache_Template
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
        $buffer .= $indent . '        <input type="text" id="uri" name="uri" value="" placeholder="uri"/>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div>
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
        $buffer .= $indent . '</form>';
        return $buffer;
    }
}

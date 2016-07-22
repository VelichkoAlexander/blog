<?php
class __MyTemplates_52db18f8d3168b9e3d0d3a1c2bde358c extends Mustache_Template
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
        $buffer .= $indent . '        <input type="text" id="title" name="title" value="" placeholder="uri"/>
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

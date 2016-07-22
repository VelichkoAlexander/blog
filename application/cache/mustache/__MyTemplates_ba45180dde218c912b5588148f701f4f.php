<?php
class __MyTemplates_ba45180dde218c912b5588148f701f4f extends Mustache_Template
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

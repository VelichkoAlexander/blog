<?php
class __MyTemplates_b9b3baecd326a4c976c8fb2a238114ad extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h1>Loin forms</h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<form action="Login/login" method="post"/>
';
        $buffer .= $indent . '    <input type="text" id="login" name="login" value="" placeholder="login"/>
';
        $buffer .= $indent . '    <input type="text" id="password" name="password" value="" placeholder="pass"/>
';
        $buffer .= $indent . '    <input type="submit"/>
';
        $buffer .= $indent . '</form>';
        return $buffer;
    }
}

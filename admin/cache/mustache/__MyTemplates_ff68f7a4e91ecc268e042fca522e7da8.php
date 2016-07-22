<?php
class __MyTemplates_ff68f7a4e91ecc268e042fca522e7da8 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h1>Loin forms</h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<form action="Login/login" id="login" name="login" value="" placeholder="guest"/>
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

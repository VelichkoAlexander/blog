<?php
class __MyTemplates_95cda26cd5c5e438ec5f513c9d73e11f extends Mustache_Template
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
        $buffer .= $indent . '    <input type="text" id="password" name="password" value="" placeholder="guest"/>
';
        $buffer .= $indent . '    <input type="submit"/>
';
        $buffer .= $indent . '</form>';
        return $buffer;
    }
}

<?php
class __MyTemplates_433adf08bd963a72d13b0f011436bfa1 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="container">
';
        $buffer .= $indent . '    <div class="row">
';
        $buffer .= $indent . '        <div class="col-md-4 col-md-offset-4">
';
        $buffer .= $indent . '            <div class="login-panel panel panel-default">
';
        $buffer .= $indent . '                <div class="panel-heading">
';
        $buffer .= $indent . '                    <h3 class="panel-title">Please Sign In</h3>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <div class="panel-body">
';
        $buffer .= $indent . '                    <form role="form" action="/admin/auth/login" method="post">
';
        $buffer .= $indent . '                        <fieldset>
';
        $buffer .= $indent . '                            <div class="form-group">
';
        $buffer .= $indent . '                                <input class="form-control" placeholder="Login" name="username" type="text"
';
        $buffer .= $indent . '                                       autofocus="">
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="form-group">
';
        $buffer .= $indent . '                                <input class="form-control" placeholder="Password" name="password" type="password"
';
        $buffer .= $indent . '                                       value="">
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="checkbox">
';
        $buffer .= $indent . '                                <label>
';
        $buffer .= $indent . '                                    <input name="remember" type="checkbox" value="1">Remember Me
';
        $buffer .= $indent . '                                </label>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <button class="btn btn-lg btn-success btn-block">Login</button>
';
        $buffer .= $indent . '                        </fieldset>
';
        $buffer .= $indent . '                    </form>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        // 'auth_message' section
        $buffer .= $this->section6bb0a6ac09860d3269f66b4e2d398921($context, $indent, $context->find('auth_message'));
        $buffer .= $indent . '</div>';
        return $buffer;
    }

    private function section6bb0a6ac09860d3269f66b4e2d398921(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{auth_message}}
                </div>
            </div>
        </div>
    ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '        <div class="row">
';
                $buffer .= $indent . '            <div class="col-md-6 col-md-offset-3">
';
                $buffer .= $indent . '                <div class="alert alert-success alert-dismissable">
';
                $buffer .= $indent . '                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
';
                $buffer .= $indent . '                    ';
                $value = $this->resolveValue($context->find('auth_message'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

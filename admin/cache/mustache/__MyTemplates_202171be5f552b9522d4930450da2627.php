<?php
class __MyTemplates_202171be5f552b9522d4930450da2627 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div class="row">
';
        $buffer .= $indent . '            <div class="col-lg-12">
';
        $buffer .= $indent . '                <div class="panel panel-default">
';
        $buffer .= $indent . '                    <div class="panel-heading">
';
        $buffer .= $indent . '                        <a href="edit_post" class="btn btn-success"> Add post</a>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <div class="panel-body">
';
        $buffer .= $indent . '                        <div class="dataTable_wrapper">
';
        $buffer .= $indent . '                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
';
        $buffer .= $indent . '                                <thead>
';
        $buffer .= $indent . '                                <tr>
';
        $buffer .= $indent . '                                    <th>Title</th>
';
        $buffer .= $indent . '                                    <th>uri</th>
';
        $buffer .= $indent . '                                    <th>Short text</th>
';
        $buffer .= $indent . '                                    <th>is visible</th>
';
        $buffer .= $indent . '                                    <th>Controls</th>
';
        $buffer .= $indent . '                                </tr>
';
        $buffer .= $indent . '                                </thead>
';
        $buffer .= $indent . '                                <tbody>
';
        // 'list' section
        $buffer .= $this->section27ee28c0f888f97d7695cc0a78570b09($context, $indent, $context->find('list'));
        $buffer .= $indent . '                                </tbody>
';
        $buffer .= $indent . '                            </table>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                        <!-- /.table-responsive -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <!-- /.panel-body -->
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <!-- /.panel -->
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <!-- /.col-lg-12 -->
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <!-- /.row -->
';
        return $buffer;
    }

    private function sectionAf6306e9ad7896ea7879a535ada7b6e3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
                                                ON
                                            ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '                                                ON
';
                $context->pop();
            }
        }
        return $buffer;
    }

    private function section27ee28c0f888f97d7695cc0a78570b09(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
                                    <tr class="odd gradeX">
                                        <td>{{title}}</td>
                                        <td>{{uri}}</td>
                                        <td>{{short_text}}</td>
                                        <td>

                                            {{#is_visible}}
                                                ON
                                            {{/is_visible}}
                                            {{^is_visible}}
                                                OFF
                                            {{/is_visible}}

                                        </td>
                                        <td>
                                            <a data-id="{{id}}" href="post" class="btn btn-primary">Edit</a>
                                            <a class="btn btn-danger" href="/admin/posts/del_post/{{id}}">Delete</a>
                                        </td>
                                    </tr>
                                ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '                                    <tr class="odd gradeX">
';
                $buffer .= $indent . '                                        <td>';
                $value = $this->resolveValue($context->find('title'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</td>
';
                $buffer .= $indent . '                                        <td>';
                $value = $this->resolveValue($context->find('uri'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</td>
';
                $buffer .= $indent . '                                        <td>';
                $value = $this->resolveValue($context->find('short_text'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</td>
';
                $buffer .= $indent . '                                        <td>
';
                $buffer .= $indent . '
';
                // 'is_visible' section
                $buffer .= $this->sectionAf6306e9ad7896ea7879a535ada7b6e3($context, $indent, $context->find('is_visible'));
                // 'is_visible' inverted section
                $value = $context->find('is_visible');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                                                OFF
';
                }
                $buffer .= $indent . '
';
                $buffer .= $indent . '                                        </td>
';
                $buffer .= $indent . '                                        <td>
';
                $buffer .= $indent . '                                            <a data-id="';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" href="post" class="btn btn-primary">Edit</a>
';
                $buffer .= $indent . '                                            <a class="btn btn-danger" href="/admin/posts/del_post/';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">Delete</a>
';
                $buffer .= $indent . '                                        </td>
';
                $buffer .= $indent . '                                    </tr>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

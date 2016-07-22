<?php
class __MyTemplates_5fc3744f65c64c6d57e10424e0320892 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div id="page-wrapper">
';
        $buffer .= $indent . '    <div class="row">
';
        $buffer .= $indent . '        <div class="col-lg-12">
';
        $buffer .= $indent . '            <h1 class="page-header">Add post</h1>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <!-- /.col-lg-12 -->
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div class="row">
';
        $buffer .= $indent . '        <div class="col-lg-12">
';
        $buffer .= $indent . '            <div class="panel panel-default">
';
        $buffer .= $indent . '                <div class="panel-heading">
';
        $buffer .= $indent . '                    Edit post
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <div class="panel-body">
';
        $buffer .= $indent . '                    <div class="row">
';
        $buffer .= $indent . '                        <div class="col-lg-6 col-lg-push-3">
';
        $buffer .= $indent . '                            <form id="add_post" role="form" action="/admin/posts/add_post" method="post">
';
        $buffer .= $indent . '                                <div class="form-group">
';
        $buffer .= $indent . '                                    <label>Title</label>
';
        $buffer .= $indent . '                                    <input id="title_post" class="form-control" name="title" value="';
        $value = $this->resolveValue($context->find('title'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" placeholder="Enter title">
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                                <div class="form-group">
';
        $buffer .= $indent . '                                    <label>Slug</label>
';
        $buffer .= $indent . '                                    <input id="slug_post" class="form-control" name="uri" placeholder="" readonly>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                                <div class="form-group">
';
        $buffer .= $indent . '                                    <label>Preview</label>
';
        $buffer .= $indent . '                                    <input class="form-control" name="short_text" value="';
        $value = $this->resolveValue($context->find('short_text'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" placeholder="Enter short text">
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                                <div class="form-group">
';
        $buffer .= $indent . '                                    <label>Visibility</label>
';
        $buffer .= $indent . '                                    <select class="form-control" name="visibility">
';
        // 'is_visible' section
        $buffer .= $this->sectionB8df7dcb1ce6c263781bfa7f94b19345($context, $indent, $context->find('is_visible'));
        // 'is_visible' inverted section
        $value = $context->find('is_visible');
        if (empty($value)) {
            
            $buffer .= $indent . '                                            <option value="1">On</option>
';
            $buffer .= $indent . '                                            <option selected  value="0">Off</option>
';
        }
        $buffer .= $indent . '                                    </select>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                                <div class="form-group">
';
        $buffer .= $indent . '                                    <label>Post text</label>
';
        $buffer .= $indent . '                                <textarea class="form-control" name="body" rows="3"
';
        $buffer .= $indent . '                                          style="margin: 0px -14px 0px 0px; width: 781px; height: 198px;">';
        $value = $this->resolveValue($context->find('text'), $context, $indent);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</textarea>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                                <button type="submit" class="btn btn-default">Submit Button</button>
';
        $buffer .= $indent . '                                <button type="reset" class="btn btn-default">Reset Button</button>
';
        $buffer .= $indent . '                            </form>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <!-- /.row (nested) -->
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <!-- /.panel-body -->
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <!-- /.panel -->
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <!-- /.col-lg-12 -->
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<!-- /#page-wrapper -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<!-- /#wrapper -->
';
        return $buffer;
    }

    private function sectionB8df7dcb1ce6c263781bfa7f94b19345(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
                                            <option selected value="1">On</option>
                                            <option value="0">Off</option>
                                        ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '                                            <option selected value="1">On</option>
';
                $buffer .= $indent . '                                            <option value="0">Off</option>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

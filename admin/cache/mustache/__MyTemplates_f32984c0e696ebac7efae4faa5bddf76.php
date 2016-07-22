<?php
class __MyTemplates_f32984c0e696ebac7efae4faa5bddf76 extends Mustache_Template
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
        // 'post' section
        $buffer .= $this->sectionB49b776c6ef7e1f7a28a659273a0dc61($context, $indent, $context->find('post'));
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

    private function section9e2875c627d2dbad7c957250bbb623f7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = 'selected';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= 'selected';
                $context->pop();
            }
        }
        return $buffer;
    }

    private function sectionB49b776c6ef7e1f7a28a659273a0dc61(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
                                <form id="add_post" role="form" action="/admin/posts/update_post/{{id}}" method="post">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input id="title_post" class="form-control" name="title" value="{{title}}"
                                               placeholder="Enter title">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input id="slug_post" class="form-control" name="uri" placeholder="" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Preview</label>
                                        <input class="form-control" name="short_text" value="{{short_text}}"
                                               placeholder="Enter short text">
                                    </div>
                                    <div class="form-group">
                                        <label>Visibility</label>
                                        <select class="form-control" name="visibility">

                                            <option {{#is_visible}}selected{{/is_visible}}value="1">On</option>
                                            <option {{^is_visible}}selected{{/is_visible}}value="0">Off</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Post text</label>
                                <textarea class="form-control" name="body" rows="3"
                                          style="margin: 0px -14px 0px 0px; width: 781px; height: 198px;">{{text}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                </form>
                            ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '                                <form id="add_post" role="form" action="/admin/posts/update_post/';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" method="post">
';
                $buffer .= $indent . '                                    <div class="form-group">
';
                $buffer .= $indent . '                                        <label>Title</label>
';
                $buffer .= $indent . '                                        <input id="title_post" class="form-control" name="title" value="';
                $value = $this->resolveValue($context->find('title'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '"
';
                $buffer .= $indent . '                                               placeholder="Enter title">
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                    <div class="form-group">
';
                $buffer .= $indent . '                                        <label>Slug</label>
';
                $buffer .= $indent . '                                        <input id="slug_post" class="form-control" name="uri" placeholder="" readonly>
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                    <div class="form-group">
';
                $buffer .= $indent . '                                        <label>Preview</label>
';
                $buffer .= $indent . '                                        <input class="form-control" name="short_text" value="';
                $value = $this->resolveValue($context->find('short_text'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '"
';
                $buffer .= $indent . '                                               placeholder="Enter short text">
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                    <div class="form-group">
';
                $buffer .= $indent . '                                        <label>Visibility</label>
';
                $buffer .= $indent . '                                        <select class="form-control" name="visibility">
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '                                            <option ';
                // 'is_visible' section
                $buffer .= $this->section9e2875c627d2dbad7c957250bbb623f7($context, $indent, $context->find('is_visible'));
                $buffer .= 'value="1">On</option>
';
                $buffer .= $indent . '                                            <option ';
                // 'is_visible' inverted section
                $value = $context->find('is_visible');
                if (empty($value)) {
                    
                    $buffer .= 'selected';
                }
                $buffer .= 'value="0">Off</option>
';
                $buffer .= $indent . '                                        </select>
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                    <div class="form-group">
';
                $buffer .= $indent . '                                        <label>Post text</label>
';
                $buffer .= $indent . '                                <textarea class="form-control" name="body" rows="3"
';
                $buffer .= $indent . '                                          style="margin: 0px -14px 0px 0px; width: 781px; height: 198px;">';
                $value = $this->resolveValue($context->find('text'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</textarea>
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                    <button type="submit" class="btn btn-default">Submit Button</button>
';
                $buffer .= $indent . '                                </form>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

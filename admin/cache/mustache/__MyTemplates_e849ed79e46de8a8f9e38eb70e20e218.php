<?php
class __MyTemplates_e849ed79e46de8a8f9e38eb70e20e218 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div id="wrapper">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <!-- Navigation -->
';
        $buffer .= $indent . '    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
';
        $buffer .= $indent . '        <div class="navbar-header">
';
        $buffer .= $indent . '            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
';
        $buffer .= $indent . '                <span class="sr-only">Toggle navigation</span>
';
        $buffer .= $indent . '                <span class="icon-bar"></span>
';
        $buffer .= $indent . '                <span class="icon-bar"></span>
';
        $buffer .= $indent . '                <span class="icon-bar"></span>
';
        $buffer .= $indent . '            </button>
';
        $buffer .= $indent . '            <a class="navbar-brand" href="/">My blog</a>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <!-- /.navbar-header -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <ul class="nav navbar-top-links navbar-right">
';
        $buffer .= $indent . '            <li class="dropdown">
';
        $buffer .= $indent . '                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
';
        $buffer .= $indent . '                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
';
        $buffer .= $indent . '                </a>
';
        $buffer .= $indent . '                <ul class="dropdown-menu dropdown-user">
';
        $buffer .= $indent . '                    <li><a href="/admin/auth/logout/"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                </ul>
';
        $buffer .= $indent . '                <!-- /.dropdown-user -->
';
        $buffer .= $indent . '            </li>
';
        $buffer .= $indent . '            <!-- /.dropdown -->
';
        $buffer .= $indent . '        </ul>
';
        $buffer .= $indent . '        <!-- /.navbar-top-links -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div class="navbar-default sidebar" role="navigation">
';
        $buffer .= $indent . '            <div class="sidebar-nav navbar-collapse">
';
        $buffer .= $indent . '                <ul class="nav" id="side-menu">
';
        $buffer .= $indent . '                    <li class="sidebar-search">
';
        $buffer .= $indent . '                        <div class="input-group custom-search-form">
';
        $buffer .= $indent . '                            <input type="text" class="form-control" placeholder="Search...">
';
        $buffer .= $indent . '                                <span class="input-group-btn">
';
        $buffer .= $indent . '                                <button class="btn btn-default" type="button">
';
        $buffer .= $indent . '                                    <i class="fa fa-search"></i>
';
        $buffer .= $indent . '                                </button>
';
        $buffer .= $indent . '                            </span>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                        <!-- /input-group -->
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="/admin"><i class="fa fa-table fa-fw"></i> Posts</a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                </ul>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <!-- /.sidebar-collapse -->
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <!-- /.navbar-static-side -->
';
        $buffer .= $indent . '    </nav>
';
        $buffer .= $indent . '<div id="page-wrapper">
';
        $buffer .= $indent . '    <div class="row">
';
        $buffer .= $indent . '        <div class="col-lg-12">
';
        $buffer .= $indent . '            <h1 class="page-header">Edit post</h1>
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
        $buffer .= $this->sectionFc0da3dbc3526060e554e01548b838e2($context, $indent, $context->find('post'));
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

    private function sectionC877874b20aed109ed5be9bdc0ef9c49(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = 'selected="selected"';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= 'selected="selected"';
                $context->pop();
            }
        }
        return $buffer;
    }

    private function sectionFc0da3dbc3526060e554e01548b838e2(Mustache_Context $context, $indent, $value)
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

                                            <option {{#is_visible}}selected="selected"{{/is_visible}} value="1">On</option>
                                            <option {{^is_visible}}selected="selected"{{/is_visible}} value="0">Off</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Post text</label>
                                <textarea class="form-control" name="body" rows="3"
                                          style="margin: 0px -14px 0px 0px; width: 781px; height: 198px;">{{text}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Update</button>
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
                $buffer .= $this->sectionC877874b20aed109ed5be9bdc0ef9c49($context, $indent, $context->find('is_visible'));
                $buffer .= ' value="1">On</option>
';
                $buffer .= $indent . '                                            <option ';
                // 'is_visible' inverted section
                $value = $context->find('is_visible');
                if (empty($value)) {
                    
                    $buffer .= 'selected="selected"';
                }
                $buffer .= ' value="0">Off</option>
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
                $buffer .= $indent . '                                    <button type="submit" class="btn btn-default">Update</button>
';
                $buffer .= $indent . '                                </form>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

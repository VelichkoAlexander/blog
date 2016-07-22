<?php
class __MyTemplates_bfdfbc6de1ed2efc54c75aa70dcac40b extends Mustache_Template
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
        $buffer .= $indent . '            <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
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
        $buffer .= $indent . '                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
';
        $buffer .= $indent . '                </a>
';
        $buffer .= $indent . '                <ul class="dropdown-menu dropdown-messages">
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <strong>John Smith</strong>
';
        $buffer .= $indent . '                                    <span class="pull-right text-muted">
';
        $buffer .= $indent . '                                        <em>Yesterday</em>
';
        $buffer .= $indent . '                                    </span>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <strong>John Smith</strong>
';
        $buffer .= $indent . '                                    <span class="pull-right text-muted">
';
        $buffer .= $indent . '                                        <em>Yesterday</em>
';
        $buffer .= $indent . '                                    </span>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <strong>John Smith</strong>
';
        $buffer .= $indent . '                                    <span class="pull-right text-muted">
';
        $buffer .= $indent . '                                        <em>Yesterday</em>
';
        $buffer .= $indent . '                                    </span>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a class="text-center" href="#">
';
        $buffer .= $indent . '                            <strong>Read All Messages</strong>
';
        $buffer .= $indent . '                            <i class="fa fa-angle-right"></i>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                </ul>
';
        $buffer .= $indent . '                <!-- /.dropdown-messages -->
';
        $buffer .= $indent . '            </li>
';
        $buffer .= $indent . '            <!-- /.dropdown -->
';
        $buffer .= $indent . '            <li class="dropdown">
';
        $buffer .= $indent . '                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
';
        $buffer .= $indent . '                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
';
        $buffer .= $indent . '                </a>
';
        $buffer .= $indent . '                <ul class="dropdown-menu dropdown-tasks">
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <p>
';
        $buffer .= $indent . '                                    <strong>Task 1</strong>
';
        $buffer .= $indent . '                                    <span class="pull-right text-muted">40% Complete</span>
';
        $buffer .= $indent . '                                </p>
';
        $buffer .= $indent . '                                <div class="progress progress-striped active">
';
        $buffer .= $indent . '                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
';
        $buffer .= $indent . '                                         aria-valuemin="0" aria-valuemax="100" style="width: 40%">
';
        $buffer .= $indent . '                                        <span class="sr-only">40% Complete (success)</span>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <p>
';
        $buffer .= $indent . '                                    <strong>Task 2</strong>
';
        $buffer .= $indent . '                                    <span class="pull-right text-muted">20% Complete</span>
';
        $buffer .= $indent . '                                </p>
';
        $buffer .= $indent . '                                <div class="progress progress-striped active">
';
        $buffer .= $indent . '                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
';
        $buffer .= $indent . '                                         aria-valuemin="0" aria-valuemax="100" style="width: 20%">
';
        $buffer .= $indent . '                                        <span class="sr-only">20% Complete</span>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <p>
';
        $buffer .= $indent . '                                    <strong>Task 3</strong>
';
        $buffer .= $indent . '                                    <span class="pull-right text-muted">60% Complete</span>
';
        $buffer .= $indent . '                                </p>
';
        $buffer .= $indent . '                                <div class="progress progress-striped active">
';
        $buffer .= $indent . '                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
';
        $buffer .= $indent . '                                         aria-valuemin="0" aria-valuemax="100" style="width: 60%">
';
        $buffer .= $indent . '                                        <span class="sr-only">60% Complete (warning)</span>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <p>
';
        $buffer .= $indent . '                                    <strong>Task 4</strong>
';
        $buffer .= $indent . '                                    <span class="pull-right text-muted">80% Complete</span>
';
        $buffer .= $indent . '                                </p>
';
        $buffer .= $indent . '                                <div class="progress progress-striped active">
';
        $buffer .= $indent . '                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
';
        $buffer .= $indent . '                                         aria-valuemin="0" aria-valuemax="100" style="width: 80%">
';
        $buffer .= $indent . '                                        <span class="sr-only">80% Complete (danger)</span>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a class="text-center" href="#">
';
        $buffer .= $indent . '                            <strong>See All Tasks</strong>
';
        $buffer .= $indent . '                            <i class="fa fa-angle-right"></i>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                </ul>
';
        $buffer .= $indent . '                <!-- /.dropdown-tasks -->
';
        $buffer .= $indent . '            </li>
';
        $buffer .= $indent . '            <!-- /.dropdown -->
';
        $buffer .= $indent . '            <li class="dropdown">
';
        $buffer .= $indent . '                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
';
        $buffer .= $indent . '                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
';
        $buffer .= $indent . '                </a>
';
        $buffer .= $indent . '                <ul class="dropdown-menu dropdown-alerts">
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <i class="fa fa-comment fa-fw"></i> New Comment
';
        $buffer .= $indent . '                                <span class="pull-right text-muted small">4 minutes ago</span>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
';
        $buffer .= $indent . '                                <span class="pull-right text-muted small">12 minutes ago</span>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <i class="fa fa-envelope fa-fw"></i> Message Sent
';
        $buffer .= $indent . '                                <span class="pull-right text-muted small">4 minutes ago</span>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <i class="fa fa-tasks fa-fw"></i> New Task
';
        $buffer .= $indent . '                                <span class="pull-right text-muted small">4 minutes ago</span>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a href="#">
';
        $buffer .= $indent . '                            <div>
';
        $buffer .= $indent . '                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
';
        $buffer .= $indent . '                                <span class="pull-right text-muted small">4 minutes ago</span>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li>
';
        $buffer .= $indent . '                        <a class="text-center" href="#">
';
        $buffer .= $indent . '                            <strong>See All Alerts</strong>
';
        $buffer .= $indent . '                            <i class="fa fa-angle-right"></i>
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                </ul>
';
        $buffer .= $indent . '                <!-- /.dropdown-alerts -->
';
        $buffer .= $indent . '            </li>
';
        $buffer .= $indent . '            <!-- /.dropdown -->
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
        $buffer .= $indent . '                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
';
        $buffer .= $indent . '                    </li>
';
        $buffer .= $indent . '                    <li class="divider"></li>
';
        $buffer .= $indent . '                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
        $buffer .= $indent . '                        <a href="/admin"><i class="fa fa-table fa-fw"></i> Tables</a>
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
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div id="page-wrapper">
';
        $buffer .= $indent . '        <div class="row">
';
        $buffer .= $indent . '            <div class="col-lg-12">
';
        $buffer .= $indent . '                <h1 class="page-header">Tables</h1>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <!-- /.col-lg-12 -->
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <!-- /.row -->
';
        $buffer .= $indent . '        <div class="row">
';
        $buffer .= $indent . '            <div class="col-lg-12">
';
        $buffer .= $indent . '                <div class="panel panel-default">
';
        $buffer .= $indent . '                    <div class="panel-heading">
';
        $buffer .= $indent . '                        DataTables Advanced Tables
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <!-- /.panel-heading -->
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
        $buffer .= $indent . '                                    <th>Controls</th>
';
        $buffer .= $indent . '                                </tr>
';
        $buffer .= $indent . '                                </thead>
';
        $buffer .= $indent . '                                <tbody>
';
        // 'list' section
        $buffer .= $this->section939d4c8fc0d2f1473f45d52b1538b404($context, $indent, $context->find('list'));
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
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <!-- /#page-wrapper -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<!-- /#wrapper -->';
        return $buffer;
    }

    private function section939d4c8fc0d2f1473f45d52b1538b404(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (is_object($value) && is_callable($value)) {
            $source = '
                                    <tr class="odd gradeX">
                                        <td>{{title}}</td>
                                        <td>{{uri}}</td>
                                        <td>{{short_text}}</td>
                                        <td><button data-id="{{id}}" class="btn btn-primary">Edit</button> <button class="btn btn-warning" data-id="{{id}}">Delet</button></td>
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
                $buffer .= $indent . '                                        <td><button data-id="';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" class="btn btn-primary">Edit</button> <button class="btn btn-warning" data-id="';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">Delet</button></td>
';
                $buffer .= $indent . '                                    </tr>
';
                $context->pop();
            }
        }
        return $buffer;
    }
}

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ \App\Utils::checkRoute(['dashboard::index', 'admin::index']) ? 'active': '' }}">
        <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="#article_menu" data-toggle="collapse">
            <i class="fa fa-file-text"></i> Articles
        </a>
        <ul class="collapse" data-widget="tree" id="article_menu">
            <li class="{{ \App\Utils::checkRoute(['dashboard::articles.index', 'user::index']) ? 'active': '' }}">
                <a href="{{ route('dashboard::articles.index') }}">
                    <i class="fa fa-file-text"></i> <span>Show Articles</span>
                </a>
            </li>
            <li class="{{ \App\Utils::checkRoute(['dashboard::articles.create', 'user::index']) ? 'active': '' }}">
                <a href="{{ route('dashboard::articles.index') }}">
                    <i class="fa fa-file-text"></i> <span>Create New Articles</span>
                </a>
            </li>
        </ul>
    </li>
    @if (Auth::user()->can('viewList', \App\User::class))
        <li class="{{ \App\Utils::checkRoute(['admin::users.index', 'admin::users.create']) ? 'active': '' }}">
            <a href="{{ route('admin::users.index') }}">
                <i class="fa fa-user-secret"></i> <span>Users</span>
            </a>
        </li>
    @endif
</ul>
<script>
    if($('ul.collapse li').hasClass('active')) {
        $('ul.collapse').addClass('in');
        console.log('true');
    }
    
</script>

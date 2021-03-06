<nav class="navbar navbar-fixed-top {{ $isLandingPage ? 'transparent navbar-inverse' : 'navbar-default' }}" role="navigation">

  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a href="{{ $currentUser ? route('home') : route('index') }}" class="navbar-brand">
        <img src="/images/logo_laravel.png" style="display: inline-block; height: 30px;"/>
      </a>
    </div>

    <div class="collapse navbar-collapse navbar-responsive-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{ route('lessons.show') }}">
            {!! icon('book') !!} {{ trans('lessons.title_lessons') }}
          </a>
        </li>
        <li>
          <a href="{{ route('articles.index') }}">
            {!! icon('forum') !!} {{ trans('forum.title_forum') }}
          </a>
        </li>

        @if(! auth()->check())
          <li>
            <a href="{{ route('sessions.create', ['return' => urlencode($currentUrl)]) }}">
              {!! icon('login') !!} {{ trans('auth.title_login') }}
            </a>
          </li>
          <li>
            <a href="{{ route('users.create', ['return' => urlencode($currentUrl)]) }}">
              {!! icon('certificate') !!} {{ trans('auth.title_signup') }}
            </a>
          </li>
        @else
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              {!! icon('user') !!} {{ $currentUser->name }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('sessions.destroy') }}">
                  {!! icon('logout') !!} {{ trans('auth.title_logout') }}
                </a>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
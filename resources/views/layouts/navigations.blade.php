
     <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">@lang('app.title')</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            @if (Auth::User())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        @lang('app.admin')
                        <span class="caret"></span>
                    </a>
    
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/roles">
                                @lang('app.role') @lang('app.management')
                            </a>
                            <a href="/users">
                                @lang('app.user') @lang('app.management')
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="/profile">@lang('app.profile')</a></li>
                <li><a href="/worksheet">@lang('app.worksheet')</a></li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('app.user') <span class="caret"></span></a>
              <ul class="dropdown-menu">
              @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}">@lang('app.dashboard')</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                @lang('auth.logout')
                            </a>    
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">@lang('app.user') @lang('auth.login')</a></li>
                        <li><a href="{{ route('register') }}">@lang('app.user') @lang('auth.register')</a></li>
                    @endauth
            @endif
              </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    @if(App()->getLocale() === 'mr') @lang('app.marathi') @else @lang('app.english') @endif
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="http://localhost:8000/setlocale/mr">
                            @lang('app.marathi')
                        </a>
                        <a href="http://localhost:8000/setlocale/en">
                            @lang('app.english')
                        </a>
                    </li>
                </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
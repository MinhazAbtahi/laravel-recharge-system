<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('BiLLPayBD') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#recharge" aria-expanded="false">
          <!--<i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>-->
          <i class="material-icons">mobile_screen_share</i>
          <p>{{ __('Recharge') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="recharge">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'recharge' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('recharge') }}">
                <i class="material-icons">mobile_screen_share</i>
                <span class="sidebar-normal">{{ __('TopUp Recharge') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'skitto_recharge' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('recharge') }}">
                    <i class="material-icons">mobile_screen_share</i>
                  <span class="sidebar-normal"> {{ __('Skitto Recharge') }} </span>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'bulk_recharge' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('recharge') }}">
                    <i class="material-icons">mobile_screen_share</i>
                  <span class="sidebar-normal"> {{ __('Bulk Recharge') }} </span>
                </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false">
        <i class="material-icons">timeline</i>
          <p>{{ __('Reports') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="report">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'Recharge Report' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('recharge_report') }}">
                <i class="material-icons">timeline</i>
                <span class="sidebar-normal">{{ __('Recharge Report') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'Refill Report' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('refill_report') }}">
                    <i class="material-icons">timeline</i>
                  <span class="sidebar-normal"> {{ __('Refill Report') }} </span>
                </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">account_circle</i>
            <p>{{ __('Profile') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'operators' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">business</i>
            <p>{{ __('Operators') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'tickets' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">live_help</i>
            <p>{{ __('Tickets') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>


 <!--
    <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons">account_circle</i>
                <span class="sidebar-normal">{{ __('Profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('map') }}">
                    <i class="material-icons">location_ons</i>
                <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'recharge' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('recharge') }}">
                    <i class="material-icons">mobile_screen_share</i>
                  <span class="sidebar-normal"> {{ __('Recharge') }} </span>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'report' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('table') }}">
                    <i class="material-icons">timeline</i>
                  <span class="sidebar-normal"> {{ __('Report') }} </span>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'tickets' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="material-icons">live_help</i>
                  <span class="sidebar-normal"> {{ __('Tickets') }} </span>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'operators' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="material-icons">business</i>
                  <span class="sidebar-normal"> {{ __('Operators') }} </span>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="material-icons">supervised_user_circle</i>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>

      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('upgrade') }}">
          <i class="material-icons">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
    -->

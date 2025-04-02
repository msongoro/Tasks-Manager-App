  <!-- Sidebar -->
 <div class="">
    <div class="sidebar mt-16 h-[24rem] border-l border-[1px] border-[#e5e7eb] px-4">
        <h4 class="text-start text-gray-950 font-bold text-xl ml-6">User Panel</h4>
            <a href="{{ route('home')}}"><span class="mdi mdi-view-dashboard"></span> Dashboard</a>
            <a href="{{route('admin.users')}}"><span class="mdi mdi-account-group"></span> Users</a>
            <a href="{{route('admin.users')}}" class=""><span class="mdi mdi-account-cog pr-2"></span>Administrations</a>
            <a href="{{ route('users-projects') }}"><span class="mdi mdi-folder"></span> Projects</a>
            <a href="{{ route('users-tasks') }}"><span class="mdi mdi-format-list-bulleted"></span> Tasks</a>
            <a href="#"><span class="mdi mdi-cog"></span> Settings</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <span class="mdi mdi-logout"></span>
             {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
 </div>

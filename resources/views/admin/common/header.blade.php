<div class="wrapping-nav" id="wrappingNav">
    <nav class="navbar navbar-expand nav-aside">
        <div class="px-3">
            <a class="navbar-brand" href="{{route('admin.dashboard')}}"><img src="{{asset('admin/images/logo/logo.png')}}" class="img-fluid" alt="Logo"></a>
        </div>
    </nav>
    <nav class="navbar navbar-expand nav-content">
        <div class="container-fluid">
            <div class="d-flex">
                <a href="#" class="nav-link px-0 make-resize"><i class="fa fa-bars text-14"></i></a>

            </div>
            <div class="d-flex fs-5 fw-bold fw-bold ms-3  ">
                <a href="{{url('/')}}" target="_blank"> > </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ms-auto mb-0 nav-menu align-items-center">
                <li class="nav-item">
                    <div class="nav-link">
                        <label class="mode-switch m-0 nav-icon-box">
                            <input type="checkbox" aria-label="input" id="darkMode">
                            <i class="fa fa-moon-o"></i>
                        </label>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="nav-icon-box">
                            <i class="icon-bell text-muted"></i>
                            <span class="new-notify-count">5</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <span class="nav-icon-box" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-language"></i>
                        </span>
                        <ul class="dropdown-menu">
                            @foreach(get_language() as $language)
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('language.switch',$language->iso_code)}}">
                                        <img src="{{asset('language/'.$language->image)}}" alt="User 1" class="rounded-circle" width="24" height="24">
                                        <span class="ms-2" >{{$language->language}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="nav-link">
                        <span class="nav-user">
                            <span class="nav-user-text">{{__('app.hi')}}, {{Auth()->user()->name}}</span>
                            <span class="nav-icon-box rounded-circle">
                                <!--<i class="icon-user"></i>-->
{{--                                @if(profile_picture(Auth()->user()->id) === 'yes')--}}
{{--                                    <img src="{{asset('profile/'.profile_picture(Auth()->user()->id))}}" class="rounded-circle" alt="Avatar">--}}
{{--                                @endif--}}
                               @if(profile_picture_check(Auth()->user()->id) === 'yes')
                                    <img src="{{asset('profile/profile.jpg')}}" class="rounded-circle" alt="Avatar">

                                @else
                                    @foreach(profile_picture()->where('user_id',Auth()->user()->id)->take(1) as $profile_image)
                                        <img src="{{asset('profile/'.$profile_image->image)}}" class="rounded-circle" alt="Avatar">
                                    @endforeach
                               @endif
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu nav-dropdown-menu dropdown-menu-end right @if($activeMenu == 'profile')  @endif">
                        <div class="dropdown-content">
                            <div class="dropdown-content-header d-flex align-items-center bg-info p-2 ">
                                <div class="me-3">
                                    <div class="box-50 rounded-circle bg-light">
                                        @if(profile_picture_check(Auth()->user()->id) === 'yes')
                                            <img src="{{asset('profile/profile.jpg')}}" class="rounded-circle img-fit" alt="Avatar">

                                        @else
                                            @foreach(profile_picture()->where('user_id',Auth()->user()->id)->take(1) as $profile_image)
                                                <img src="{{asset('profile/'.$profile_image->image)}}" class="rounded-circle img-fit" alt="Avatar">
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="nav-user-name text-white">{{Auth()->user()->name}}</div>
                                    <small class="d-block nav-user-title text-white">Owner of the profile</small>
                                </div>
                            </div>
                            <div class="dropdown-content-body p-2  ">
                                <a href="{{route('profile.index',[Auth()->user()->id])}}" class="d-flex align-items-center dropdown-item  @if($activeMenu == 'profile')  active @endif">
                                    <span class="me-3 text-info"><i class="icon-user"></i></span>
                                    <span class="text-14">{{__('app.profile')}}</span>
                                </a>
                                <a href="#" class="d-flex align-items-center dropdown-item">
                                    <span class="me-3 text-info"><i class="icon-envelope"></i></span>
                                    <span class="text-14">{{__('app.inbox')}}</span>
                                    <span class="ms-auto"><span class="new-notify-count message-count">5</span></span>
                                </a>
                                <a href="{{ route('chat.index') }}" class="d-flex align-items-center dropdown-item">
                                    <span class="me-3 text-info"><i class="icon-bubble"></i></span>
                                    <span class="text-14">{{__('app.chat')}}</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a href="javascript:void (0);" onclick="handleLogout()" class="d-flex align-items-center dropdown-item">
                                    <span class="me-3 text-info"><i class="icon-logout"></i></span>
                                    <span class="text-14">{{__('app.logout')}}</span>
                                </a>
                            </div>
                            <div class="dropdown-content-footer">

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

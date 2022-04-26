<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
            <input id="searchbox" type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
            </span>
        </div><!-- input-group -->
    </div><!-- br-header-left -->
    <div class="br-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name hidden-md-down">{{auth()->user()->name}}</span>
                    <img src="{{ (!is_null(auth()->user()->image)) ? 
                        asset('storage/uploads/users/' . auth()->user()->image) :
                        asset('storage/uploads/users/profile.png') }}" class="wd-32 rounded-circle" alt="">
                    <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-250">
                    <div class="tx-center">
                        <a href="">
                            <img src="{{ (!is_null(auth()->user()->image)) ? 
                                asset('storage/uploads/users/' . auth()->user()->image) :
                                asset('storage/uploads/users/profile.png') }}" class="wd-80 rounded-circle" alt=""></a>
                        <h6 class="logged-fullname">{{auth()->user()->name}}</h6>
                        <p>{{auth()->user()->email}}</p>
                    </div>
                    <hr>
                    <ul class="list-unstyled user-profile-nav">
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="formbtn">
                                    <i class="icon ion-power"></i> Sign Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="icon ion-ios-chatboxes-outline"></i>
                <!-- start: if statement -->
                <span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>
                <!-- end: if statement -->
            </a>
        </div><!-- navicon-right -->
    </div><!-- br-header-right -->
</div><!-- br-header -->

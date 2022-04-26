<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
        <li class="br-menu-item">
            <a href="{{ route('dashboard') }}" class="br-menu-link {{ session()->get('active_menu') == 'dashboard' ? 'active' : null }}">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="{{route('category.index')}}" class="br-menu-link {{ (session()->has('acive_menu') && session()->get('acive_menu') == 'category') ? 'active' : null }}">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Category Manager</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{route('product.index')}}" class="br-menu-link {{session()->has('acive_menu') && session()->get('acive_menu') == 'products' ? 'active' : null }}">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Product Manager</span>
            </a>
        </li>
    </ul><!-- br-sideleft-menu -->

    <br>
</div><!-- br-sideleft -->

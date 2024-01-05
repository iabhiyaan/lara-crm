<div data-kt-menu-trigger="click" class="menu-item">
    <span class="menu-link py-2">
        <span class="menu-title">{{ $menuTitle }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        @can($viewRole)
            <div class="menu-item">
                <a class="menu-link py-2" href="{{ $listRoute }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">All Lists</span>
                </a>
            </div>
        @endcan

        @can($alterRole)
            <div class="menu-item">
                <a class="menu-link py-2" href="{{ $createRoute }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Add New</span>
                </a>
            </div>
        @endcan
    </div>
</div>

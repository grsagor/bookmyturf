<header class="top-header cbp-af-header">
    <nav class="navbar navbar-expand-md fixed-top" id="scrollnavbar">
        <div class="container-fluid navbar-container">
            <a class="navbar-brand logo" href="{{ route('front.index') }}">
                <img class="img-fluid h-100 object-fit-cover" alt="Playspots" src="{{ asset('assets/images/logo.png') }}"
                    style="--smush-placeholder-width: 271px; --smush-placeholder-aspect-ratio: 271/117;">
            </a>
            <div class="desktop-only">
                <a class="micro-interaction-btns hide-interaction" href="{{ route('front.bookings') }}">
                    <span class="icon">
                        <img data-src="https://www.playspots.in/wp-content/uploads/2024/12/running.png" alt="Book Icon"
                            src="https://www.playspots.in/wp-content/uploads/2024/12/running.png"
                            style="--smush-placeholder-width: 32px; --smush-placeholder-aspect-ratio: 32/32;">
                    </span>
                    <span class="text">Book Your Spot</span>
                </a>
            </div><a class="menu-btn">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </a>
        </div>
    </nav>
    <div class="overlayer-menu">
        <div class="menu-wrapper">
            <ul id="menu-header-menu" class="menu-list">
                <li id="menu-item-149"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-124 current_page_item menu-item-149 nav-item">
                    <a class="nav-link" href="{{ route('front.index') }}">Home</a>
                </li>
                <li id="menu-item-149"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-124 current_page_item menu-item-149 nav-item">
                    <a class="nav-link" href="{{ route('front.about') }}">About</a>
                </li>
                <li id="menu-item-149"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-124 current_page_item menu-item-149 nav-item">
                    <a class="nav-link" href="{{ route('front.bookings') }}">Book A Slot</a>
                </li>
                <li id="menu-item-149"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-124 current_page_item menu-item-149 nav-item">
                    <a class="nav-link" href="{{ route('front.gallery') }}">Gallery</a>
                </li>
                <li id="menu-item-149"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-124 current_page_item menu-item-149 nav-item">
                    <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</header>

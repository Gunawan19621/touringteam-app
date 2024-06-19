<header id="header-top" class="header-top">
    <ul>
        <li>
            <div class="header-top-left">
                <ul>
                    <li class="select-opt">
                        <select name="language" id="language">
                            <option value="default">EN</option>
                            <option value="Bangla">BN</option>
                            <option value="Arabic">AB</option>
                        </select>
                    </li>
                    <li class="select-opt">
                        <select name="currency" id="currency">
                            <option value="usd">USD</option>
                            <option value="euro">Euro</option>
                            <option value="bdt">BDT</option>
                        </select>
                    </li>
                    <li class="select-opt">
                        <a href="#"><span class="lnr lnr-magnifier"></span></a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="head-responsive-right pull-right">
            <div class="header-top-right">
                <ul>
                    <li class="header-top-contact">
                        +1 222 777 6565
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <li class="header-top-contact">
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="header-top-contact">
                                <a href="{{ route('login') }}">sign in</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="header-top-contact">
                                    <a href="{{ route('register') }}">register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </li>
    </ul>

</header>

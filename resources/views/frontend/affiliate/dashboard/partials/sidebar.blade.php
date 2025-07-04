<div class="user-sidebar">
    <ul class="links">
        <li>
            <a href="{{ route('affiliate.dashboard') }}" class="{{ request()->routeIs('affiliate.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}
            </a>
        </li>
        <li>
            <a href="{{ route('affiliate.commission.history') }}" class="{{ request()->routeIs('affiliate.commission.history') ? 'active' : '' }}">
                <i class="fas fa-history"></i> {{ __('Commission History') }}
            </a>
        </li>
        {{-- Placeholder for future links like Profile Edit, Payment Settings etc.
        <li>
            <a href="#">
                <i class="fas fa-user-edit"></i> {{ __('Edit Profile') }}
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-money-check-alt"></i> {{ __('Payment Settings') }}
            </a>
        </li>
        --}}
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('affiliateLogoutForm').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
            </a>
        </li>
    </ul>
</div>

<form id="affiliateLogoutForm" action="{{ route('affiliate.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

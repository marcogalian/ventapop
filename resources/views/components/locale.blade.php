
    <form action="{{ route('locale.set', $lang) }}" method="POST" class="m-0 p-0">
        @csrf
        <button type="submit" class="nav-link m-0 p-0" style="background: transparent; border: none">
            <span class="flag-icon flag-icon-{{ $country }}"></span>
        </button>
    </form>


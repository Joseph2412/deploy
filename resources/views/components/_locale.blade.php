<form action="{{route('setLocale', $lang)}}" class="me-3" method="POST">
    @csrf
    <button class="btn-revisore mt-3 mx-1 btn-locale d-flex justify-content-center" type="submit">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="24" height="22" />
    </button>
</form>


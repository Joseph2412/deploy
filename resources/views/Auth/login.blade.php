
<x-layout title="{{__('ui.login')}}">
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <x-button/>

    {{-- Toggle button area --}}
    <div class="container-fluid container-login">
        <div class="text-center my-4">
            <a href="{{ route('login') }}" class="btn mx-2 {{ request()->routeIs('login') ? 'btn-tab-active' : 'btn-tab-inactive' }}">
                {{ __('ui.login') }}
            </a>
            <a href="{{ route('register') }}" class="btn mx-2 {{ request()->routeIs('register') ? 'btn-tab-active' : 'btn-tab-inactive' }}">
                {{ __('ui.register') }}
            </a>
        </div>

        {{-- Login Form --}}
        <div class="container d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <h2 class="text-center mb-3">{{ __('ui.login') }}</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email">{{ __('ui.yourEmail') }}</label>
                        <input type="email" id="email" name="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">{{ __('ui.yourPassword') }}</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('ui.login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
<x-footer/>

<x-layout title="{{__('ui.register')}}">
    <x-button/>

    {{-- Toggle button area --}}
    
    <div class="container-fluid container-login mb-5">

        <div class="text-center my-4">
            <a href="{{ route('login') }}" class="btn mx-2 {{ request()->routeIs('login') ? 'btn-tab-active' : 'btn-tab-inactive' }}">
                {{ __('ui.login') }}
            </a>
            <a href="{{ route('register') }}" class="btn mx-2 {{ request()->routeIs('register') ? 'btn-tab-active' : 'btn-tab-inactive' }}">
                {{ __('ui.register') }}
            </a>
            
        </div>
        
    
        {{-- Register Form --}}
        <div class="container d-flex justify-content-center flipper">
            <div class="col-md-6">
                <h2 class="text-center mb-3">{{ __('ui.register') }}</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{ __('ui.contact_name') }}</label>
                        <input type="text" id="name" name="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">{{ __('ui.contact_email') }}</label>
                        <input type="email" id="email" name="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">{{ __('ui.yourPassword') }}</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation">{{ __('ui.confirmPassword') }}</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('ui.register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
<x-footer/>

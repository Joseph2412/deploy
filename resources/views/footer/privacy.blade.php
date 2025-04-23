<x-layout>
    
    <div class="container my-5">
        <x-button/>
        <h1 class="text-center">{{ __('ui.privacy_policy.title') }}</h1>
        <p class="text-center">{{ __('ui.privacy_policy.last_update') }}{{ date('d/m/Y') }}</p>

        <div class="mt-4">
            <h3>{{ __('ui.privacy_policy.sections.introduction.title') }}</h3>
            <p>{{ __('ui.privacy_policy.sections.introduction.content') }}</p>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.privacy_policy.sections.data_collected.title') }}</h3>
            <ul>
                @foreach(__('ui.privacy_policy.sections.data_collected.content') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.privacy_policy.sections.use_of_data.title') }}</h3>
            <p>{{ __('ui.privacy_policy.sections.use_of_data.content') }}</p>
            <ul>
                @foreach(__('ui.privacy_policy.sections.use_of_data.list') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.privacy_policy.sections.data_sharing.title') }}</h3>
            <p>{{ __('ui.privacy_policy.sections.data_sharing.content') }}</p>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.privacy_policy.sections.security.title') }}</h3>
            <p>{{ __('ui.privacy_policy.sections.security.content') }}</p>
        </div>
    </div>
    
</x-layout>
<x-footer/>
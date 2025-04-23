<x-layout>

    <div class="container my-5">
        <x-button/>
    
        <h1 class="text-center mb-4">{{ __('ui.legal_notes.title') }}</h1>
        <p class="text-muted text-center">{{ __('ui.legal_notes.last_update') }} {{ date('d/m/Y') }}</p>

        <div class="mt-4">
            <h3>{{ __('ui.legal_notes.sections.general_info.title') }}</h3>
            <p>{{ __('ui.legal_notes.sections.general_info.content') }}</p>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.legal_notes.sections.intellectual_property.title') }}</h3>
            <p>{{ __('ui.legal_notes.sections.intellectual_property.content') }}</p>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.legal_notes.sections.terms_of_use.title') }}</h3>
            <p>{{ __('ui.legal_notes.sections.terms_of_use.content') }}</p>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.legal_notes.sections.responsibility.title') }}</h3>
            <p>{{ __('ui.legal_notes.sections.responsibility.content') }}</p>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.legal_notes.sections.privacy.title') }}</h3>
            <p>{{ __('ui.legal_notes.sections.privacy.content') }}</p>
        </div>

        <div class="mt-4">
            <h3>{{ __('ui.legal_notes.sections.legal_changes.title') }}</h3>
            <p>{{ __('ui.legal_notes.sections.legal_changes.content') }}</p>
        </div>
    </div>

</x-layout>
<x-footer/>
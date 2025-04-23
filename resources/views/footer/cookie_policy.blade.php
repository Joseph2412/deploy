<x-layout>

    <div class="container my-5 p-4" style="background-color: var(--colore-primario); color: white; border-radius: 10px;">
        <x-button/>  
    
        <h1 class="text-center mb-4">Cookie Policy</h1>
    
        <p class="text-muted text-center">{{__('ui.last_up')}} {{ date('d/m/Y') }}</p>
    
        <div class="mt-4">
            <h3>{{__('ui.what_cookie')}}</h3>
            <p>{{__('ui.cookie')}}</p>
        </div>
    
        <div class="mt-4">
            <h3>{{__('ui.type')}}</h3>
            <ul>
                <li><strong>{{__('ui.tecn.strong')}}</strong> {{__('ui.tecn.suffix')}}</li>
                <li><strong>{{__('ui.analysis.strong')}}</strong>{{__('ui.analysis.suffix')}}</li>
                <li><strong>{{__('ui.third_party.strong')}}</strong>{{__('ui.third_party.suffix')}}</li>
            </ul>
        </div>
    
        <div class="mt-4">
            <h3>{{__('ui.manage')}}</h3>
            <p>{{__('ui.manage_2')}}</p>
            <ul>
                <li><strong>{{__('ui.chrome.strong')}}</strong> {{__('ui.chrome.suffix')}}</li>
                <li><strong>{{__('ui.firefox.strong')}}</strong>{{__('ui.firefox.suffix')}}</li>
                <li><strong>{{__('ui.safari.strong')}}</strong>{{__('ui.safari.suffix')}}</li>
            </ul>
            <p>{{__('ui.cookie_warning')}}</p>
        </div>
    
        <div class="mt-4">
            <h3>{{__('ui.fourth_party.title')}}</h3>
            <p>{{__('ui.fourth_party.description')}}</p>
            <ul>
                <li><strong>{{__('ui.fourth_party.google_analytics.strong')}}</strong> {{__('ui.fourth_party.google_analytics.suffix')}} <a href="https://policies.google.com/privacy" target="_blank">{{__('ui.fourth_party.google_analytics.finish')}}</a>.</li>
                <li><strong>{{__('ui.fourth_party.social_media.strong')}}</strong>{{__('ui.fourth_party.social_media.suffix')}}</li>
            </ul>
        </div>
    
        <div class="mt-4">
            <h3>{{__('ui.final_party.title')}}</h3>
            <p>{{__('ui.final_party.description')}}</p>
        </div>
    </div>

</x-layout>
<x-footer/>

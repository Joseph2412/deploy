<x-layout>
    <div class="container my-5">
        <x-button/>
    
        <h1 class="text-center mb-4">{{__('ui.faqs_title')}}</h1>  
        
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading0">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="true" aria-controls="collapse0">
                        {{__('ui.faqs_q1')}}
                    </button>
                </h2>
                <div id="collapse0" class="accordion-collapse collapse show" aria-labelledby="heading0" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{__('ui.faqs_a1')}}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        {{__('ui.faqs_q2')}}
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{__('ui.faqs_a2')}}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        {{__('ui.faqs_q3')}}
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{__('ui.faqs_a3')}}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        {{__('ui.faqs_q4')}}
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{__('ui.faqs_a4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<x-footer/>
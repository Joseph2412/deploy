<x-layout>
    <x-button/>
        <div class="contact-container container-fluid">
            <h1 class="text-center mb-3">{{ __('ui.contact_title') }}</h1>
            <p>{{ __('ui.contact_paragraph') }}</p>
            
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="{{ __('ui.contact_name') }}" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="{{ __('ui.contact_email') }}" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="message" rows="4" placeholder="{{ __('ui.contact_message') }}" required></textarea>
                </div>
                <button type="submit" class="btn btn-submit">{{ __('ui.contact_send') }}</button>
            </form>
      
        <div class="row">
            <div class="cta-section">
               <h2 class="text-center mb-3">{{ __('ui.contact_title2') }}</h2> 
                <div class="col-12 d-flex justify-content-center mt-3">
                    <a href="{{ route('su_di_noi') }}" class=" btn">{{ __('ui.contact_findmore') }}</a>
                </div>
            </div>
        </div>
    </div>
          
        
      
    </x-layout>
    
    <x-footer/>
</div>
<x-layout>

    <div class="container my-5">
        <x-button />
        <h1 class="text-center mb-4">{{__('ui.team')}}</h1>
        
        <div class="row">
            @foreach($team as $member)
                <div class="col-md-12 mb-4">
                    <div class="card shadow p-3">
                        <div class="row align-items-center">
                            <!-- Avatar -->
                            <div class="col-md-2 text-center">
                                <img src="{{ asset('media/' . $member['avatar']) }}" class="rounded-circle img-fluid" alt="{{ $member['name'] }}" style="width: 70px; height: 100px;">
                            </div>
    
                            <!-- Nome e Descrizione -->
                            <div class="col-md-10">
                                <h3 class="weight">{{ $member['name'] }}</h3>
                                <p class="card-text">{{__('ui.' . $member['id'])}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

     
    
    </x-layout>
    <x-footer/>
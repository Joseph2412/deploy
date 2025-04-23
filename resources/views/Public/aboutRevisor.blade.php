<x-layout title="Diventa Un Revisore">
    
    <x-button />
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
        <div class="container my-5 p-4">
        
        <h1 class="text-center mb-4">{{__('ui.title_rev')}}</h1>
        
        <p class="text-center ">{{__('ui.sub_rev')}}</p>
        
        <div class="mt-4 p-3  rounded">
            <h3 >{{__('ui.title_rev_1')}}</h3>
            <p>{{__('ui.sub_1')}}</p> 
            <p class="text-up">{{__('ui.sub_2')}}</p>
            <ul>
                <li>{{__('ui.point_1')}}</li>
                <li>{{__('ui.point_2')}}.</li>
                <li>{{__('ui.point_3')}}</li>
                <li>{{__('ui.point_4')}}</li>
                <li>{{__('ui.point_5')}}</li>
            </ul>
        </div>
        
        <div class="mt-4 p-3  rounded">
            <h3 >{{__('ui.title_rev_2')}}</h3>
            <ul>
                <li>{{__('ui.point_6')}}</li>
                <li>{{__('ui.point_7')}}</li>
                <li>{{__('ui.point_8')}}</li>
                <li>{{__('ui.point_9')}}</li>
            </ul>
        </div>
        
        <div class="mt-4 text-center">
            <h3>{{__('ui.become')}}</h3>
            <p>{{__('ui.became_2')}}</p>
            
            <form action="{{ route('become.revisor') }}" method="POST" class="d-flex justify-content-center">
                @csrf
              
                <button type="submit" class="btn btn-warning">{{__('ui.join_us')}}</button>
            </form>
            </div
        </x-layout>
        <x-footer />
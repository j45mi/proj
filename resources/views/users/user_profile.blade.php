hellou user profile todo:


<x-layout>
    @include('partials._search')
        
    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
        <img class="w-24" src="{{asset('image/user.png')}}" alt="" class="logo"/>
    
            <h3 class="text-2xl mb-2">{{$user->name}}</h3>
            <div class="text-xl font-bold mb-4">{{$user->email}}</div>
                
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Player Description
                </h3>
                <div class="text-lg space-y-6">
                   {{--{{$listing->descriptions}}--}}
    
                    <a
                        href="mailto:{{$user->email}}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Player
                    </a>

                    
                    <a 
                        href="/users/{{$user->id}}/edit"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-globe"></i> 
                        Edit Profile
                    </a>

                </div>
            </div>
        </div>
    </x-card>
        
    <x-card class="mt-4 p-2 flex space-x-6">
    
    <form method="POST" action="/users/{{$user->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete </button>
    </x-card>
    </div>
    
    </x-layout>
        
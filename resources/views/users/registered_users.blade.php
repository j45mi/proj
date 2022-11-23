<x-layout>
    
    @include('partials._search')
    @include('partials._hero')
    
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
        @unless(count($users) == 0)
        @foreach($users as $user)
            
            <x-user-card :user="$user" />
    
        @endforeach
            
        @else
            <p>No user found</p>
        @endunless
    
    </div>
    
    
</x-layout>
<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit My Profile
            </h2>
        </header>

    <form method="POST" action="/users/{{auth()->user()->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{auth()->user()->name}}"
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{auth()->user()->email}}"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            @if( auth()->user()->is_admin === 1 )
                <div class="mb-6">
                    Administrator
                    <span>&#10003;</span>
                </div>

            @endif

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Edit My Profile
                </button>
            </div>
        </form>
    </x-card>
</x-layout>
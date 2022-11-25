
<x-layout>
<x-card
    class="rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Create a Tournament
        </h2>
        <p class="mb-4">Schedule It</p>
    </header>

    <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="title"
                class="inline-block text-lg mb-2"
                >*Title</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                value="{{old('title')}}"
            />
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="location"
                class="inline-block text-lg mb-2"
                >*Location</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="location"
                placeholder="Example: SA PPV hall court 1 (tennis, floorball)"
                value="{{old('location')}}"
            />
            @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >*Contact Email</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{old('email')}}"
            />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="website"
                class="inline-block text-lg mb-2"
            >
                *Website/Application URL
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="website"
                value="{{old('website')}}"
            />
            @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="descriptions"
                class="inline-block text-lg mb-2"
            >
                *Tournament Descriptions
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="descriptions"
                rows="3"
                placeholder="Include who are you looking for etc"
                value="{{old('descriptions')}}"
            ></textarea>
            @error('descriptions')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label
                for="conditions"
                class="inline-block text-lg mb-2"
            >
                *Tournament Conditions
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="conditions"
                rows="3"
                placeholder="Include requirements, conditions etc"
                value="{{old('conditions')}}"
            ></textarea>
            @error('conditions')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">

            <label for="start">Start date:</label>

            <input  type="date" id="start" name="trip-start"
                    value="2018-07-22"
                    min="2018-01-01" max="2018-12-31">

        </div>

        <div class="mb-6">

            <label for="sport"></label>
            Choose sport:

            <select name="sport">
                <option selected>Please choose:</option>
                <option value="tenis">tenis</option>
                <option value="pingpong">pingpong</option>
                <option value="basketball">basketball</option>
                <option value="football">football</option>
                <option value="hockeyball">hockeyball</option>
                <option value="hockey">hockey</option>
                <option value="karate">karate</option>
                <option value="judo">judo</option>
                <option value="badminton">badminton</option>
                <option value="softball">softball</option>
                <option value="floorball">floorball</option>
                <option value="handball">handball</option>
            </select>

        </div>

        <div class="mb-6">

            <label for="max_players"></label>
            *Choose number of Players//Teams:

            <select name="max_players">
                <option selected>Please choose:</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
            </select>

        </div>
        

        <div>
            <label
                for="prize"
                class="inline-block text-lg mb-2"
            >
                Prize
            </label>
            <input
                class="border border-gray-200 rounded p-2 w-full mb-6"
                name="prize"
                placeholder="Gift card, etc..."
                value="{{old('prize')}}"
            ></input>
        </div>

        <div class="mb-6">
            <button
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Create Tournament
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
        
    </form>
</x-card>
</x-layout>

@props(['user'])

<!-- Item 1 --> <!--new component-->
<x-card>
    <div class="flex">
        <img class="w-24" src="{{asset('image/user.png')}}" alt="" class="logo"/>
        <div>
            <h3 class="text-2xl">
                {{--<div class="text-xl font-bold mb-4">{{$user->name}}</div>--}}
                <a href="./users/{{$user->id}}''">{{$user->name}}</a>
            </h3>

            <div class="text-lg mt-4"> <i class="fa fa-envelope"></i> {{$user->email}}</div>
            
        
        </div>
    </div>
</x-card>
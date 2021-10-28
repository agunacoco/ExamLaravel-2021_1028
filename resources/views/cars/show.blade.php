<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car Show') }}
        </h2>
        <button onclick=location.href='{{ route('cars.index') }}' type="button" class="btn btn-info text-white hover:bg-blue-700">Post List</button>
        </div>
    </x-slot>

    <div class="m-4 p-3">
        <div class="card mb-3">
            <div class="row">
              <div class="col">
                <img src="{{ '/storage/images/'.$car->이미지 }}" class="card-img-top p-2 mt-3 ml-auto mr-auto" alt="my post image" style="width:100%">  
              </div>
              <div class="col-md-8">
                <div class="card-body mt-3">
                  <h5 class="card-title text-2xl md:font-black">{{ $car->제조회사 }}</h5>
                  <h6 class="card-subtitle mb-2 text-lg text-muted">{{ $car->user->name}}</h6>
                  <p class="card-text text-lg md:font-bold mt-3 mb-4">{{$car->자동차명 }}</p>
                  <p class="card-text text-lg md:font-bold mt-3 mb-4">{{$car->제조년도 }}</p>
                  <p class="card-text text-lg md:font-bold mt-3 mb-4">{{$car->가격 }}</p>
                  <p class="card-text text-lg md:font-bold mt-3 mb-4">{{$car->차종 }}</p>
                  <p class="card-text text-lg md:font-bold mt-3 mb-4">{{$car->외형 }}</p>
                  <p class="card-text mb-2 text-lg text-muted">Created {{ $car->created_at }}</p>
                  <p class="card-text mb-2 text-lg text-muted">Last updated {{ $car->updated_at->diffForHumans() }}</p>
                </div>
              </div>
            </div>
            @auth
            @if ($car->user_id == auth()->user()->id)
            <div class="card-body flex mt-3">
                <a href="{{ route('cars.edit', ["id"=>$car->id]) }}" >Update</a>
                <form action="{{ route('cars.destory', ["id"=>$car->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="ml-3" type="submit">Delete</button>
                </form>
            </div>
            @endif  
            @endauth

            <x-car-comment :car="$car" :comments="$comments ?? '' "/>
            
        </div>
    </div>
    
</x-app-layout>

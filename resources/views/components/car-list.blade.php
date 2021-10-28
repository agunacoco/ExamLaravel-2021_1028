<div class="m-4 p-4">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($cars as $car )
        <div class="col mb-3">
            <div class="card">
            <div class="card-body">
                <a href="{{ route('cars.show', ['id' => $car->id]) }}">
                    <h5 class="card-title text-xl font-bold mt-4">{{ $car->제조회사 }}</h5>
                    <h5 class="card-title text-xl font-bold mt-4">{{ $car->자동차명 }}</h5>
                    <h5 class="card-title text-xl font-bold mt-4">{{ $car->제조년도 }}</h5>
                </a>
            </div>
            </div>
        </div>
        @endforeach
       
    </div>
    {{ $cars->links() }}
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
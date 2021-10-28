<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car Create') }}
        </h2>
        <button onclick=location.href='{{ route('cars.index') }}' type="button" class="btn btn-info text-white hover:bg-blue-700">List</button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="이미지" class="form-label">이미지</label>
            <input type="file" class="form-control" id="이미지" name="이미지">
        </div>
        <div class="mb-3">
            <label for="t제조회사" class="form-label">제조회사</label>
            <input type="text" class="form-control" id="제조회사" name="제조회사" placeholder="제조회사" value="{{ old('제조회사') }}">
            @error('제조회사')
                <div class="text-red-600">{{ $message }} </div>     
            @enderror
        </div>
        <div class="mb-3">
            <label for="자동차명" class="form-label">자동차명</label>
            <input type="text" class="form-control" id="자동차명" name="자동차명" placeholder="자동차명" value="{{ old('자동차명') }}">
            @error('자동차명')
                <div class="text-red-600">{{ $message }} </div>     
            @enderror
        </div>
        <div class="mb-3">
            <label for="제조년도" class="form-label">제조년도</label>
            <input type="text" class="form-control" id="제조년도" name="제조년도" placeholder="제조년도" value="{{ old('제조년도') }}">
            @error('제조년도')
                <div class="text-red-600">{{ $message }} </div>     
            @enderror
        </div>
        <div class="mb-3">
            <label for="가격" class="form-label">가격</label>
            <input type="text" class="form-control" id="가격" name="가격" placeholder="가격" value="{{ old('가격') }}">
            @error('가격')
                <div class="text-red-600">{{ $message }} </div>     
            @enderror
        </div>
        <div class="mb-3">
            <label for="차종" class="form-label">차종</label>
            <input type="text" class="form-control" id="차종" name="차종" placeholder="차종" value="{{ old('차종') }}">
            @error('차종')
                <div class="text-red-600">{{ $message }} </div>     
            @enderror
        </div>
        <div class="mb-3">
            <label for="외형" class="form-label">외형</label>
            <input type="text" class="form-control" id="외형" name="외형" placeholder="외형" value="{{ old('title') }}">
            @error('외형')
                <div class="text-red-600">{{ $message }} </div>     
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    
</x-app-layout>

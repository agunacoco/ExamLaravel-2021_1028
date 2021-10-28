<div class="card mb-3">
    <div class="p-5">
        <div class="p-3">
            <h5 class="card-title text-2xl md:font-black">Comment</h5>
            <form action="{{ route("comment.store", ['car_id'=>$car->id]) }}" method="post">
                @csrf  
                <div class="flex justify-between">
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    @error('content')
                        <div class="text-red-600">{{ $message }} </div>     
                    @enderror
                    <button class="btn btn-primary" type="submit">Comment</button>
                </div>
            </form>
        </div>
        
        
        <div class="mt-2 p-4">
            @foreach ($comments as $comment )
            <div class="card mb-3 flex justify-center p-3">
                <h5 class="card-title text-xl md:font-black">{{ $comment->user->name }}</h5>
                <p class="text-lg">{{ $comment->content }}</p>
                <div class="flex justify-between">
                    <p class="card-text mb-2 text-sm text-muted">Last updated {{ $comment->updated_at->diffForHumans() }}</p>
                    @auth
                    @if ($comment->user_id == auth()->user()->id)
                    <form action="{{ route('comment.destory', ["comment_id"=>$comment->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                    @endif
                    @endauth
                    
                </div>
            </div>
            @endforeach
            {{ $comments->links(); }}
        </div>
    </div>
    
    
</div>
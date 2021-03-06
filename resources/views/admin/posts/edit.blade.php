@extends('layouts.app')



@section('content')

    
    <div class="card">
        <div class="card-header">
            Edit Post
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', ['id' => $post->id ]) }}" method="POST" enctype="multipart/form-data">
                
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="" value="{{ $post->title}}">
                </div>

                <div class="form-group">
                        <label for="featured">Featured Img</label>
                        <input type="file" name="featured" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select name="category_id" id="category" class="form-control">
                        
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                
                                @if($post->category->id == $category->id)
                                    selected
                                @endif
                                >{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                        <label for="tags"> Select tags </label>
                        @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                
                                @foreach($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                @endforeach
                                
                                > {{ $tag->tag }}</label>
                        </div>
                        @endforeach
                    </div>

                <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" name="content" id="summary-ckeditor" class="form-control" cols="5" rows="5">{{ $post->content }}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success btn-lg">Update  Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endsection
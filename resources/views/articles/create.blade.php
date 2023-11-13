@extends('partials.layout')

@section('content')
    <div class="container mx-auto w-1/2">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Title</span>

                        </label>
                        <input name="title" type="text" placeholder="Article Title" class="input input-bordered w-full @error('title') input-error @enderror"/>
                        @error('title')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>

                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Content</span>
                        </label>
                        <textarea name="body" class="textarea textarea-bordered @error('title') textarea-error @enderror" placeholder="Content here"></textarea>
                        @error('body')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text-alt">Tags</span>
                        </label>
                        <select class="select select-bordered" multiple name="tags[]">
                            @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tags.*')
                        <label class="label">
                            <span class="label-text-alt text-error">{{$message}}</span>
                        </label>
                        @enderror

                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Images</span>
                        </label>
                        <input name="images[]" type="file" multiple class="file-input input-bordered w-full @error('image.*') input-error @enderror"/>
                        @error('image.*')
                            <label class="label">
                                <span class="label-text-alt text-error">{{$message}}</span>
                            </label>
                        @enderror
                    </div>
                    <input type="submit" value="Create" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection

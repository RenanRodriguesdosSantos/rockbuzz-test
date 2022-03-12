@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts Edit</div>

                    <div class="card-body">
                        <form action="{{ url('post/update/' . $post->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="text-muted">Title</label>
                                <input id="title" type="text" value="{{ $post->title }}" name="title"
                                       class="form-control">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cover" class="text-muted">Cover</label>
                                <inputimage id="cover" name="cover" :defaulturl="'{{$post->cover ? '/storage/covers/' . $post->cover : ''}}'" />
                                @if ($errors->has('cover'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="text-muted">Body</label>
                                <input type="hidden" name="body"/>
                                <editor name="body" defaultvalue="{{$post->body}}"></editor>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="tags" class="text-muted">Tags</label>
                                <custumselect :options="{{\App\Tag::all(['id','name'])}}" :defaultvalue="{{$post->tags->pluck('id')}}"></custumselect>
                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="published" type="checkbox" name="published" checked="{{ $post->title }}">
                                <label for="published" class="text-muted">Published</label>
                                @if ($errors->has('published'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('published') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

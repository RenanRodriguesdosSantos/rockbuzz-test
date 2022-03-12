@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts Create</div>
                    <div class="card-body">
                        <form action="{{ url('post/store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="text-muted">Title</label>
                                <input id="title" type="text" name="title" class="form-control">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title" class="text-muted">Cover</label>
                                <inputimage id="cover" name="cover"/>
                                @if ($errors->has('cover'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="text-muted">Body</label>
                                <editor name="body"></editor>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tags" class="text-muted">Tags</label>
                                <custumselect :options="{{\App\Tag::all(['id','name'])}}" ></custumselect>
                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="published" type="checkbox" name="published">
                                <label for="published" class="text-muted">Published</label>
                                @if ($errors->has('published'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('published') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">store</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

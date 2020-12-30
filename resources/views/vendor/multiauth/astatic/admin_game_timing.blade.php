@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="col-12">
    <div class="card mt-5">
        <div class="card-body">  
            @foreach($content as $row)
            <form action="{{route('admin.game_timing_update')}}" method='get'>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{$title}}</span>
                    </div>
                    <input type="hidden" name='id' value="{{$row->id}}" />
                    <textarea id="messageArea" name="content" rows="7" aria-label="With textarea" class="form-control ckeditor" >{{$row->content}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@include('multiauth::includes.footer')
@endsection

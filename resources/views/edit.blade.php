@extends('layouts.app')

@section('title', 'Update Exisiting Event')
    
@section('content')
<div class="text-center mt-5">
    <h2>Update Existing Event</h2>
    <form  method="POST" action="{{ route('events.update', ['event'=>$events->uuid]) }}">
        @csrf
        @method('PUT')
            <div class="row justify-content-center mt-5">    
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Event Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $events->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $events->slug }}">
                </div>   
                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="datetime-local" class="form-control" name="startAt" value="{{ $events->startAt }}">
                </div>  
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="datetime-local" class="form-control" name="endAt" value="{{ $events->endAt }}">
                </div>  
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-arrow-repeat"></i>
                        Update
                    </button>
                    <a href="/events" class="btn btn-danger">
                        <i class="bi bi-backspace"></i>
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
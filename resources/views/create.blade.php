@extends('layouts.app')

@section('title', 'Create New Event')
    
@section('content')
<div class="text-center mt-5">
    <h2>Create New Event</h2>
    <br>
    <form class="row g-3 justify-content-center" method="POST" action="{{route('events.store')}}">
        @csrf
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Event Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug">
            </div>    
            <div class="mb-3">
                <label class="form-label">Start Time</label>
                <input type="datetime-local" class="form-control" name="startAt">
            </div>
            <div class="mb-3">
                <label class="form-label">End Time</label>
                <input type="datetime-local" class="form-control" name="endAt">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-plus"></i>
                    Add
                </button>
                <a href="/events" class="btn btn-danger">
                    <i class="bi bi-backspace"></i>
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
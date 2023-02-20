@extends('layouts.app')

@section('title', 'Display Exisiting Event')
    
@section('content')
<div class="text-center mt-5">
    <div class="card-body">
        <h2>Display Existing Event</h2>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">
                        <strong>Event Name:</strong>
                    </label>
                    <h6>{{ $events->name }}</h6>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <strong>Slug:</strong>
                    </label>
                    <h6>{{ $events->slug }}</h6>
                </div>   
                <div class="mb-3">
                    <label class="form-label">
                        <strong>Start Date:</strong>
                    </label>
                    <h6>{{ $events->startAt }}</h6>
                </div>  
                <div class="mb-3">
                    <label class="form-label">
                        <strong>End Date</strong>
                    </label>
                    <h6>{{ $events->endAt }}</h6>
                </div>
            </div>
        </div>
        <br>
        <a href="/events" class="btn btn-primary">
            <i class="bi bi-arrow-left-square"></i>
            Go Back
        </a>
    </div>
</div>
@endsection
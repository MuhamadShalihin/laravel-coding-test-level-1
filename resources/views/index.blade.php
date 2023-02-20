@extends(('layouts.app'))

@section('title', 'Laravel Coding Test Level 1 - Index')

@section('content')
    <div class="text-center">
        <h2>Event List</h2>
        <br>
        @if (Auth::check())
        <a href="events/create" class="btn btn-primary">
            <i class="bi bi-plus"></i>
            New Event
        </a>
        @else
        <br>
        <br>
        @endif    
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">UUID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        @if (Auth::check())
                            <th scope="col">Action</th>
                        @else
                            
                        @endif                        
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($events as $event)
                        <tr>
                            <th>
                                <a href="{{ route('events.show', ['event' => $event->uuid]) }}" style="text-decoration: none;">
                                    {{ $event->uuid }}
                                </a>
                            </th>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->slug }}</td>
                            <td>{{ $event->startAt }}</td>
                            <td>{{ $event->endAt }}</td>
                            @if (Auth::check())
                                <td>
                                    <a href="events/{{ $event->uuid }}/edit" class="btn btn-info">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('events.destroy', ['event' => $event->uuid]) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete selected list?') }}')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form> 
                                </td>
                            @else
                                
                            @endif                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection
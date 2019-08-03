@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-7">
                <nav class="panel">
                    
                        <div class="panel-heading">
                            List of all friends
                        </div>
                    

                    
                    @forelse($friends as $friend)
                    
                        <a  href="{{ route('chat.show', $friend->id) }}" class="panel-block">{{ $friend->name }}</a>
                       
                    @empty
                    <div class="panel-block">
                    You don't have any friend. 
                    </div>
                    @endforelse    
                    
                    
                </nav>
            </div>
        </div>
    </div>
@endsection
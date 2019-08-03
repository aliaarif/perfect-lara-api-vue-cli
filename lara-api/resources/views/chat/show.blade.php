@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-7">
                <nav class="panel">
                    
                        <div class="panel-heading">
                            {{ $friend->name }}
                            
                       
                        <div class="contain is-pulled-right">
                            <a href="{{ url('/chat') }}" class="is-link"> <i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    
                    
                    

                    

                        </div>
                     
                    
                    
                </nav>
            </div>
        </div>
    </div>
@endsection
@extends('layout.layout')
@section('content')
    <?php #phpinfo(); ?>
    @livewire('show-posts')

    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            {{--@include('shared.error-message')--}}
            @include('shared.submit-idea')
            @if($ideas->isEmpty())
                <h2 class="text-center">NO RESULTS FOUND</h2>

            @else
            @foreach($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
            @endforeach
            <!-- PAGINAZIONE -->
            <div class="mt-3">
                {{$ideas->withQueryString()->links()}}
            </div>
            @endif

        </div>

        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')


        </div>
    </div>
@endsection


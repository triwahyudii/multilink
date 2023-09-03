@extends('admin')

@section('content')

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">

                {!! $chart->container() !!}

            </div>
        </div>
    </div>
</section>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

@endsection
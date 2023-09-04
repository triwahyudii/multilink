@extends('admin')

@section('content')

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! $userChart->container() !!}
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ $userChart->cdn() }}"></script>

{{ $userChart->script() }}

@endsection
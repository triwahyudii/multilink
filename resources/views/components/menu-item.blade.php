<div class="row bg-white border-4 p-3">

    @foreach($menu as $item)
    <div class="col-4 col-sm-6 col-md-4 col-lg-3 p-2">
        <div class="card h-100 border-0">
            <div class="card-body text-center">
                <i class="{{ $item['icon'] }}" style="color: #1f66e0; display:flex; justify-content:center; align-items:center; font-size:40px;"></i>
                <h5 class="card-title pt-2 mb-0">{{ $item['title'] }}</h5>
            </div>
        </div>
    </div>
    @endforeach

</div>
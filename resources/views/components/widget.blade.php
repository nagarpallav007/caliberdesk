<div class="card shadow mb-4" @if(!empty($id)) id="{{$id}}" @endif>
    @if(empty($header))
        @if(!empty($title) || !empty($tool))
        <div class="card-header py-3">
            <div class="d-flex justify-content-between h-100">
            <div class=" justify-content-center align-self-center">
            {!!$icon ?? '' !!}
            <h6 class="m-0 font-weight-bold text-primary">{{ $title ?? '' }}</h6>
        </div>
        <div>
            {{$tool ?? ''}}
        </div>
        </div>
        </div>
        @endif
    @else
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$header}}</h6>
        </div>
    @endif

    <div class="card-body">
                <div class="container-fluid">

        <div class="row">
        {{$slot}}
    </div>
    </div>
    </div>
    <!-- /.box-body -->
</div>
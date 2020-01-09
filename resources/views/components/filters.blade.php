<div class="card  @if(!empty($class)) {{$class}} @else box-primary @endif" id="accordion">
  <div class="card-header with-border" style="cursor: pointer;">
    <h6 class="m-0 font-weight-bold text-primary" >
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
        @if(!empty($icon)) {!! $icon !!} @else <i class="fa fa-filter" aria-hidden="true"></i> @endif {{$title ?? ''}}
      </a>
    </h6>
  </div>
  <div id="collapseFilter" class="panel-collapse active collapse @if(empty($closed)) in @endif" aria-expanded="true">
    <div class="card-body">
      <div class="container-fluid">
      <div class="row">
      {{$slot}}
    </div>
    </div>
  </div>
</div>
</div>





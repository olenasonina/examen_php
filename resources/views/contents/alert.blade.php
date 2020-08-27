<div class="container">
    <div class="row">
        <div class="col-12">
            @if(Session::has('info'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('info') }}
            </div>
            @endif
        </div>
    </div>
</div>
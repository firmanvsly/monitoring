@if ($errors->any())
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="alert alert-danger dark" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

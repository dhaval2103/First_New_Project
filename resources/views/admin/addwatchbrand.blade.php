@extends('adminlayout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <h1>Add Watch Brand</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <form method="POST" id="form" action="{{ route('admin.insertwatch') }}">
                            @csrf
                            <input type="hidden" class="form-control id" name="id">
                            <div class="alert alert-success d-none" id="msg_div">
                                <span id="res_message"></span>
                            </div>
                            <div class="form-group">
                                <label for="watch" class="col-form-label">Watch :</label>
                                <input type="text" class="form-control watch" name="watch">
                                @error('watch')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><a
                                        href="{{ route('admin.productdetail') }}">Back</a></button>
                                <button type="submit" class="btn btn-success">Add Watch</button>
                                {{-- <input type="submit" class="btn btn-primary" value="Submit"> --}}
                                <div id="msgdisplay"></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
<script>
    {{-- $document.on("") --}}
</script>

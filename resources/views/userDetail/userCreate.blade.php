@extends('layouts.layout')

@section('content')
    <a href="{{ route('users.index') }}">Home</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (isset($message))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
    <h2>create user</h2>
    <span id="output"></span>

    <form action="{{ route('users.store') }}" method="post" id="myForm">
        @csrf
        <div class="row">
        <div class="form-group col-md-6">
            <label for="">First_name</label>
            <input type="text" name="first_name" id="" class="form-control">
        </div>
        <div class="form-group  col-md-6 col-md-6">
            <label for="">last_name</label>
            <input type="text" name="last_name" id="" class="form-control">
        </div>
        <div class="form-group  col-md-4">
            <label for="">father_name</label>
            <input type="text" name="father_name" id="" class="form-control">
        </div>
        <div class="form-group  col-md-4">
            <label for="">mobile_number</label>
            <input type="number" name="mobile_number" id="" class="form-control">
        </div>
        <div class="form-group  col-md-4">
            <label for="">address</label>
            <input type="text" name="address" id="" class="form-control">
        </div>
    </div>
    <input type="submit" class="btn btn-success  col-md-3" id="btnSubmit">

    </form>
<script>
$(document).ready(function() {
    $('#myForm').submit(function(event) {
        event.preventDefault();
        var data = $('#myForm')[0];
        var data = new FormData(data);
        $.ajax({
            type: "POST",
            url: '{{ route("users.store") }}',
            data: data,
            processData: false,
            contentType: false,
            success:function(data) {
                $('#output').text(data.res);
                $('input[type ="text"]').val('');
                $('input[type ="number"]').val('');
                $('#btnSubmit').prop("disabled", false);

            },
            error: function(e) {
                $('#output').text(e.responseText);
        $('#btnSubmit').prop("disabled", false);

            }
        });
    });
});

</script>
@endsection

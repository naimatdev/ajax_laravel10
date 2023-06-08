@extends('layouts.layout')
@section('content')
        @if (isset($message))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
        <h4>ajax crud operation in laravel</h4>
        <a href="{{ route('users.create') }}" class="btn btn-success float-right mb-2">Add</a>
       
    <table id="tableContainer" class="table">
       <th>S.no</th>
       <th>FullName</th>
       <th>FatherName</th>
       <th>Mobile</th>
       <th>Address</th>
       <th>Actions</th>

    </table>
   <script>

    $(document).ready(function() {
        // setInterval(fetchData, 5000);

        // function fetchData() {
        $.ajax({
            type: 'GET',
            url: '{{ url("test/view") }}',
             success: function(data) {
            console.log(data);
                if(data.users.length > 0)
                {
                  for(let i=0; i < data.users.length; i++){
                  var table = document.getElementById('tableContainer');
            // Create the table
            // Create a new row
            var newRow = table.insertRow();
// Create new cells and add data
var cell0 = newRow.insertCell();
cell0.innerHTML = i + 1;
var cell1 = newRow.insertCell();
cell1.innerHTML = data.users[i]['first_name'] + ' ' + data.users[i]['last_name'];
var cell2 = newRow.insertCell();
cell2.innerHTML = data.users[i]['father_name'];
var cell3 = newRow.insertCell();
cell3.innerHTML = data.users[i]['mobile_number'];
var cell4 = newRow.insertCell();
cell4.innerHTML = data.users[i]['address'];
let id = data.users[i]['id'];
var cell5 = newRow.insertCell();
cell5.innerHTML = '<a href="/users/' + id + '/edit" class="btn btn-info">Edit</a> <a class="btn btn-danger">Delete</a>';
        }
        container.appendChild(table);
                }
                else{
                    alert('else works');
                }
              
    },
    error: function(xhr) {
        // Handle any errors here
        console.log(xhr.responseText);
    }
    });
// }
});

   </script>
@endsection

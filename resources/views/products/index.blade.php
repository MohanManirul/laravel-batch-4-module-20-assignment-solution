@extends('products.layout')
     
@section('content')
<div class="card mt-5">
  <h2 class="card-header text-center">Laravel 11 CRUD with Image Upload Ostad</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="mb-3">
            <input type="text" id="search" class="form-control" placeholder="Search products...">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/images/{{ $product->image }}" width="100px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            
            </tbody>
  
        </table>
        
        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
  
  </div>
</div>  



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 

    $(document).ready(function() {
        $('#search').on('keyup', function() {
            // debugger;
            let query = $(this).val();
          
            $.ajax({
                url: "{{ route('products.search') }}",
                type: 'GET',
                data: { 'query': query },
                success: function(data) {
                    $('tbody').html(data); // Update only the tbody with new rows
                },
                error: function() {
                    alert('Search failed. Please try again.');
                }
            });

        });
    });
</script>


@endsection

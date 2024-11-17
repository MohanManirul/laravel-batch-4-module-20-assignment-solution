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

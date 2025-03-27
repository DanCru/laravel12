<h1>Trang category</h1>
<table class="table">
        <thead>
                <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                </tr>
        </thead>
        <tbody>
                @foreach ($cate as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                                {{-- <a href="{{ route('edit-cate', $item->id) }}"><button>Edit</button></a>
                                <a href="{{ route('del-cate', $item->id) }}"><button>Delete</button></a> --}}
                        </td>
                    </tr>
                @endforeach
        </tbody>
</table>
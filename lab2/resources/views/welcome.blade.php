<h1>Trang chu</h1>
<table class="table" border="1">
        <thead>
                <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                </tr>
        </thead>
        <tbody>
                @foreach ($products as $item)
                        <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                        <a href="/edit/{{ $item->id }}"><button>Edit</button></a>
                                        <a href="/del/{{ $item->id }}"><button>Delete</button></a>
                                </td>
                        </tr>
                @endforeach
        </tbody>
</table>

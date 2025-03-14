<div class="container">
        <h1>Bai 2 - Tin mới nhất</h1>
        <table class="table table-danger">
                <thead>
                        <tr>
                                <th>Id</th>
                                <th>Tieu De</th>
                                <th>Ngay Dang</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($data as $item)
                                <tr>
                                        <td>{{ $item->id }}</td>
        <td>{{ $item->tieuDe }}</td>
        <td>{{ $item->ngayDang }}</td>
        
                                </tr>
                        @endforeach
                </tbody>
        </table>
        
</div>
<table>
    <thead>
        <tr>
            <th>optnik</th>
            <th>optnama</th>
            <th>optversati</th>
            <th>optsite</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($operator as $operator)
            <tr>
                <td>{{ $operator->optnik }}</td>
                <td>{{ $operator->optnama }}</td>
                <td>{{ $operator->optversati }}</td>
                <td>{{ $operator->optsite }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
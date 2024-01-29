<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(46, 54, 95);
        }
        h1, th{
            color: white;
        }
        a, td {
            text-align: center;
            color: rgb(207, 207, 207);
        }
    </style>
</head>
<body>
    <h1>SUPPORTS - LIST</h1>
    <a href="{{ route('support.create') }}">Novo support</a>
    <table>
        <thead>
            <th>ASSUNTO | </th>
            <th>| STATUS | </th>
            <th>| DESCRIÇÃO</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td> 
                    <form action="{{ route('support.delete', $support->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('support.show', $support->id) }}"> ver </a> |
                        <a href="{{ route('support.edit', $support->id) }}"> editar </a> |
                        <button type="submit"> deletar </button>
                    </form
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
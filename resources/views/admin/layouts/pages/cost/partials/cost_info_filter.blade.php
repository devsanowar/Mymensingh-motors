@foreach ($costs as $key => $cost)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $cost->date }}</td>
        <td>{{ $cost->spend_by ?? 'N/A' }}</td>
        <td>{{ $cost->category->category_name ?? 'N/A' }}</td>
        <td>{{ $cost->field->field_name ?? 'N/A' }}</td>
        <td>{!! $cost->description ?? 'N/A' !!}</td>
        <td>{{ $cost->amount }}</td>
        <td>
            <a href="#" class="btn btn-info btn-sm view-cost-btn" data-id="{{ $cost->id }}"><i
                    class="material-icons text-white">visibility</i> </a>

            <a href="{{ route('cost.edit', $cost->id) }}" class="btn btn-warning btn-sm">
                <i class="material-icons text-white">edit</i></a>

            <form class="d-inline-block" action="{{ route('cost.destroy', $cost->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                        class="material-icons">delete</i></button>
            </form>
        </td>
    </tr>
@endforeach

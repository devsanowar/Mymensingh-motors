@foreach ($incomes as $key => $income)
    <tr id="incomeRow-{{ $income->id }}">
        <td>{{ $key + 1 }}</td>
        <td>{{ $income->date }}</td>
        <td>{{ $income->income_by ?? 'N/A' }}</td>
        <td>{{ $income->category->category_name ?? 'N/A' }}</td>
        <td>{{ $income->field->field_name ?? 'N/A' }}</td>
        <td>{!! $income->description ?? 'N/A' !!}</td>
        <td>{{ $income->amount }}</td>
        <td>
            <a href="#" class="btn btn-info btn-sm view-income-btn" data-id="{{ $income->id }}"><i
                    class="material-icons text-white">visibility</i> </a>

            <a href="{{ route('income.edit', $income->id) }}" class="btn btn-warning btn-sm">
                <i class="material-icons text-white">edit</i></a>


            <form class="d-inline-block delete-income-form" data-id="{{ $income->id }}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm delete-income-btn">
                    <i class="material-icons">delete</i>
                </button>
            </form>

        </td>
    </tr>
@endforeach

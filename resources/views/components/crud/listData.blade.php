@extends('layouts.dashBoard')
@section('title')

@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                @php
                    $notId = false;
                    $columns = $data == null ? [] : array_keys($data[0]);
                @endphp
                @foreach ($columns as $column)
                    @if ($notId)
                        <th scope="col">{{ $column }}</th>
                    @elseif(!$notId)
                        @php
                            $notId = true;
                        @endphp
                    @endif
                @endforeach
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $data = $data == null ? [] : $data;
            @endphp
            @foreach ($data as $i => $dataRecord)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    @php
                        $notId = false;
                    @endphp
                    @foreach ($dataRecord as $column)
                        @if ($notId)
                            <td>{{ $column }}</td>
                        @elseif(!$notId)
                            @php
                                $notId = true;
                            @endphp
                        @endif
                    @endforeach

                    <td class="d-flex flex-column flex-sm-column flex-lg-row">
                        <a class="btn btn-sm btn-warning" href="{{ route("$name.edit", $dataRecord['id']) }}">Edit</a>
                        <form action="{{ route("$name.destroy", $dataRecord['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="form-control btn btn-sm btn-danger mt-2 mt-lg-0 ml-sm-0 ml-lg-2">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

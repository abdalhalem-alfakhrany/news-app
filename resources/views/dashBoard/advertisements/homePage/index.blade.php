@extends('layouts.dashBoard')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">image</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($advertisements as $i => $advertisement)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    <th>{{ $advertisement['name'] }}</th>
                    <th>{{ $advertisement['image'] }}</th>
                    <td class="d-flex flex-column flex-sm-column flex-lg-row">
                        <button id="{{ "advertisements-add-${advertisement['id']}" }}"
                            class="btn btn-sm btn-warning {{ $advertisement['added'] ? 'disabled' : '' }}"
                            onclick="addToHomePageAds('{{ $advertisement['id'] }}')">Add</button>
                        <button id="{{ "advertisements-remove-${advertisement['id']}" }}"
                            class="btn btn-sm btn-danger {{ !$advertisement['added'] ? 'disabled' : '' }}"
                            onclick="removeFromHomePageAds('{{ $advertisement['id'] }}')">Remove</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<script>
    const addToHomePageAds = (id) => {
        fetch(`home-page-advertisement/add/${id}`).then(
            (data) => {
                document.getElementById(`advertisements-add-${id}`).classList.add('disabled');
                document.getElementById(`advertisements-remove-${id}`).classList.remove('disabled');
            }
        )
    }
    const removeFromHomePageAds = (id) => {
        fetch(`home-page-advertisement/remove/${id}`).then(
            (data) => {
                document.getElementById(`advertisements-add-${id}`).classList.remove('disabled');
                document.getElementById(`advertisements-remove-${id}`).classList.add('disabled');
            }
        )
    }
</script>

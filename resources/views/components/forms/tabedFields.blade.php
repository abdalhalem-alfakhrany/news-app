@php
$id = \Illuminate\Support\Str::uuid();
@endphp

<div class="nav nav-tabs">

    @foreach ($tabs as $i => $tab)
        <button class="nav-link {{ $i == 0 ? 'active' : '' }}" type="button" data-bs-toggle="tab"
            data-bs-target={{ "#$tab-nav-$id" }}>{{ $tab }}</button>
    @endforeach

</div>

<div class="tab-content">

    @foreach ($tabs as $i => $tab)
        <div class="tab-pane fade {{ $i == 0 ? 'show active' : '' }}" id={{ "$tab-nav-$id" }}>
            {{ ${"$tab"} }}
        </div>
    @endforeach

</div>

<div>
    <x-data-table :data="$data" :model="$business_categories">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nama Kategori
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th>Gambar</th>
                <th><a wire:click.prevent="sortBy('type')" role="button" href="#">
                    Jenis Bisnis
                    @include('components.sort-icon', ['field' => 'type'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($business_categories as $row)
                <tr x-data="window.__controller.dataTableController({{ $row->id }})">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>
                        <img src="{{ asset('assets/img/business-category/' . $row->image) }}" class="img-fluid" style="max-height: 50pt; width: auto;" alt="{{$row->name}}">
                    </td>
                    <td>{{ $row->type }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/row/edit/{{ $row->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>

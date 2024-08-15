@if ($brands->count() == 0)
    <tr>
        <td colspan="4" class="px-4 py-3 text-center font-medium text-zinc-900 dark:text-white">
            No hay marcas
        </td>
    </tr>
@else
    @foreach ($brands as $brand)
        <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
            <th scope="row" class="whitespace-nowrap px-4 py-3 font-medium text-zinc-900 dark:text-white">
                {{ $loop->iteration }}
            </th>
            <td class="px-4 py-3">
                <span>{{ $brand->name }}</span>
            </td>
            <td class="px-4 py-3">
                <span>
                    @if ($brand->description != null)
                        {{ $brand->description }}
                    @else
                        <span class="text-zinc-500">No hay descripción</span>
                    @endif
                </span>
            </td>
            <td class="px-4 py-3">
                <div class="flex gap-2">
                    <x-button type="button" data-href="{{ route('admin.brands.edit', $brand->id) }}"
                        data-action="{{ route('admin.brands.update', $brand->id) }}" typeButton="success" icon="edit"
                        onlyIcon="true" class="editBrand" />

                    <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                        id="formDeleteBrand-{{ $brand->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="button" data-form="formDeleteBrand-{{ $brand->id }}" class="buttonDelete"
                            onlyIcon="true" icon="delete" typeButton="danger" data-modal-target="deleteModal"
                            data-modal-toggle="deleteModal" />
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
@endif

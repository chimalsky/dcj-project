<tr data-controller="togglable form-item-edit">
    <td>
        {{ $item->name }}
    </td>
    <td>
        {{ $item->label }}
    </td>
    <td>
        <button data-action="togglable#toggle" 
            data-target="toggler"
            class="button hollow">
            edit
        </button>

        <div data-target="togglable.togglable">
            @include('form.item.edit', ['item' => $item])
        </div>
    </td>
</tr>
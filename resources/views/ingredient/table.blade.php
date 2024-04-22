<table class="table table-head-fixed text-nowrap">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price cost</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @forelse ($ingredients as $ingredient)
            <tr>
                <td>{{ $ingredient->id }}</td>
                <td>{{ $ingredient->name }}</td>
                <td>{{ $ingredient->price_cost }}</td>
                <td class="text-right">
                    @if($checkbox_view )
                        @if($food)
                            <input type="checkbox" name="ingredients[]" id="ingredient_{{ $ingredient->id }}" value="{{ $ingredient->id }}" data-price="{{ $ingredient->price_cost }}" {{ optional($food->ingredients)->contains($ingredient->id) ? 'checked' : '' }} />
                        @else
                            <input type="checkbox" name="ingredients[]" id="ingredient_{{ $ingredient->id }}" value="{{ $ingredient->id }}" data-price="{{ $ingredient->price_cost }}" />
                        @endif
                    @else
                        <a href="{{ route('ingredient.edit', $ingredient) }}" type="button" class="btn btn-primary">Edit</a>
                    @endif
                </td>
            </tr>                      
        @empty
            <tr>
                <td></td>
                <td>
                    <div class="content-notavailable">
                        <p>No ingredients available</p>
                        <a href="{{ route('ingredient.create') }}" type="button" class="btn btn-secondary">Create</a>
                    </div>
                </td>
                <td></td>
            </tr>
        @endforelse
    </tbody>
  </table>

  <style>
    .content-notavailable {
        width: 100%;
        text-align: center;
        height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .content-notavailable a {
        margin-top: 10px;
    }
  </style>
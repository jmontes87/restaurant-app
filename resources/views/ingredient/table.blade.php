<table class="table table-head-fixed text-nowrap">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($ingredients as $ingredient)
        <tr>
            <td>{{ $ingredient->id }}</td>
            <td>{{ $ingredient->name }}</td>
            <td class="text-right">
                @if($checkbox_view)
                    <input type="checkbox" name="ingredients[]" id="ingredient_{{ $ingredient->id }}" value="{{ $ingredient->id }}" {{ $food->ingredients->contains($ingredient->id) ? 'checked' : '' }} />
                @else
                    <a href="{{ route('ingredient.edit', $ingredient) }}" type="button" class="btn btn-primary">Edit</a>
                @endif
            </td>
        </tr>                      
      @endforeach
    </tbody>
  </table>
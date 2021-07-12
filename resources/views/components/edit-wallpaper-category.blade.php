@if ($currentCategory)
    <option value="">Без категории</option>
    <option selected value="{{ $currentCategory->id }}">{{ $currentCategory->name }}</option>
@else
    <option selected value="">Без категории</option>
@endif

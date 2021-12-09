<div class="form-check">
    <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category->id }}" @if (null !== request('category') && in_array($category->id, request('category'))) checked @endif id="category{{ $category->id }}">
    <label class="form-check-label" for="category{{ $category->id }}">{{$category->name}}</label>
</div>
@each('frontend.includes.filter.static-filter-row-category', $category->childrens, 'category')

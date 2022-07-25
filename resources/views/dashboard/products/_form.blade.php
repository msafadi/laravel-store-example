

    <div class="form-group">
        <x-form.input label="Product Name" class="form-control-lg" role="input" name="name" :value="$product->name" />
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="category_id" class="form-control form-select">
            <option value="">Primary Category</option>
            @foreach(App\Models\Category::all() as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <x-form.textarea name="description" :value="$product->description" />
    </div>
    <div class="form-group">
        <x-form.label id="image">Image</x-form.label>
        <x-form.input type="file" name="image" accept="image/*" />
        @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="" height="60">
        @endif
    </div>
    <div class="form-group">
        <x-form.input label="Price" name="price" :value="$product->price" />
    </div>
    <div class="form-group">
        <x-form.input label="Compare Price" name="compare_price" :value="$product->compare_price" />
    </div>
    <div class="form-group">
        <x-form.input label="Tags" name="tags" :value="$tags" />
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div>
            <x-form.radio name="status" :checked="$product->status" :options="['active' => 'Active', 'draft' => 'Draft', 'archived' => 'Archived']" />
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
    </div>

@push('styles')
<link href="{{ asset('css/tagify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="{{ asset('js/tagify.min.js') }}"></script>
<script src="{{ asset('js/tagify.polyfills.min.js') }}"></script>
<script>
    var inputElm = document.querySelector('[name=tags]'),
    tagify = new Tagify (inputElm);
</script>
@endpush
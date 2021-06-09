
<x-admin.layout>
<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
             @if ($errors->any())
             
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                 </ul>
                </div>
            @endif

        
            <h2>Create Category</h2>
            <form action="{{route('admin.categories.store') }}" method="POST">

           
                
                @csrf
                <!-- <x-forms.input type="text" name="_name" /> -->
                <b>Category Name</b>        : <input type="text" name="category_name" id="category_name" class="form-control" value="{{ old('category_name')}}"
                @error('categories_name')
                    style = "border-color: red;"
                @enderror
                >
                
                <br><br>
                Category Slug: <input type="text" name="slug" id="slug" class="form-control" value="{{ old('category_name') }}"><br><br>
                <b>Category Description</b> : <textarea name="category_desc" id="" cols="30" rows="10" class="form-control">{{ old('category_desc')}}
                
                </textarea><br><br>
                <b>Parent Category</b> :
                <x-forms.select name="parent_id" class="form-control">
                    <option value="">Select a category</option>
                     @foreach( $categories as $category)
                        <option value="{{ $category->id}}" {{ $category->id == old('parent_id') ? "selected": '' }} >{{$category->category_name}}</option>
                     @endforeach
                     
                </x-forms.select><br><br>
                <select name="" id="">
                    <option value="">Mobile</option>
                    <option value="">- Samsung Mobile</option>
                    {{-- <option value="">-- S series</option>
                    <option value="">-LG Mobile</option> --}}
                    <option value="">Laptop</option>
                    <option value="">Accessories</option>
                </select>

                <br>
                <input type="submit" name="submit" values="Save" class="form-control">
                {{-- </form> --}}
                 
            </form>
           
            
        </div>
    </div>
</div>

</x-admin.layout>
<script>
    jQuery(document).ready(function($){
        $('#category_name').on('change', function(){    //category id="category_name"
            var name = $('#category_name').val();
            var slug = name.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(slug);
        })
    })
</script>
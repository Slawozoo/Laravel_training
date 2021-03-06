
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

        
            <h2>Create Product</h2>
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

           
                
                @csrf
                <!-- <x-forms.input type="text" name="_name" /> -->
                <b>Product Name</b>        : <input type="text" name="product_name" id="" class="form-control" value="{{ old('product_name')}}"
                @error('product_name')
                    style = "border-color: red;"
                @enderror
                >
                @error('product_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br><br>
                <b>Product Description</b> : <textarea name="product_desc" id="" cols="30" rows="10" class="form-control"
                @error('product_desc')
                    style = "border-color: red;"
                @enderror
               
                >{{ old('product_desc')}}
                
                </textarea><br><br>
                <b>Price</b> :<input type="text" name="price" id="" class="form-control" value="{{ old('price')}}"
                @error('price')
                    style = "border-color: red;"
                @enderror
                >
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br><br>
                <b>Category</b> :
                <x-forms.select name="category_id" class="form-control">
                    <option value="">Select a category</option>
                     @foreach( $categories as $category)
                        <option value="{{ $category->id}}" {{ $category->id == old('category_id') ? "selected": '' }} >{{$category->category_name}}</option>
                     @endforeach
                     
                </x-forms.select><br><br>
               
                {{-- <form action="/admin/products/store" method="POST" enctype="multipart/form-data">    --}}
                    <input type="file" name="image_upload" id="" >
                
                

        <!-- <select name="category_id" id="">
            <option value="0">Select a category</option>
            {{-- @foreach( $categories as $category)
                <option value="{{ $category->id}}">{{$category->category_name}}</option>
            @endforeach --}}
        </select> -->
                <br>
                <input type="submit" name="submit" values="Save" class="form-control">
                {{-- </form> --}}
                 
            </form>
           
            
        </div>
    </div>
</div>

</x-admin.layout>
@extends('master')

@section('content')
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}"  enctype="multipart/form-data" >
                        @csrf

                        <label for="title">Загрузка товара</label><br>

						<label for="title">Название товара:</label><br>
        				<input type="text" id="title" name="title" value=""><br>
        				<label for="description">Описания товара:</label><br>
        				<textarea id="description" name="description"></textarea><br>
       					<input type="file" id="image" name="image" value=""><br>
        				<button type="submit">Save</button>
						</form>

	<ul>
        @foreach ($categories as $category)
           
            <li>{{ $category->title }}</li>
            <li><?='id = '?>{{ $category->id }}</li>


            <img src="{{ Storage::url($category->image_path) }}" alt="Category Image">

             <form action="{{ route('categories.destroy', [$category->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" id="delete-task-{{ $category->id }}" class="btn btn-danger">
                      Delete
                    </button>
                </form>

<button type="submit" class="btn btn-danger"><a href="{{ route('categories.update', [$category->id]) }} ">Update</a></button>

		@endforeach

        
    </ul>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

		

		
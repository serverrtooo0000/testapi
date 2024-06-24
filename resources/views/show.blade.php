@extends('master')

@section('content')

	

			<div class="container">







    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="container">
		
		<img src="{{ Storage::url($categories->image_path) }}" alt="Category Image">
		</div>

		<div class="container">
			<h3 class="product-name">{{$categories->description}}<a href="#"></a></h3>

			</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', [$categories->id]) }}"  enctype="multipart/form-data" >
                        @csrf

                        <label for="title">Редактирование данных</label><br>

						<label for="title">Название товара:</label><br>
        				<input type="text" id="title" name="title" value=""><br>
        				<label for="description">Описания товара:</label><br>
        				<textarea id="description" name="description"></textarea><br>
       					<input type="file" id="image" name="image" value=""><br>
        				<button type="submit">Save</button>
						</form>




                </div>
            </div>
        </div>
    </div>
</div>



@endsection
			


		

	

  
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container"><br>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Crear Producto
						
					</div>
					<div class="card-body">
						<form action="{{ route('products.store')}}" method="POST">
							@csrf
							<div class="form-group">
								<label for="">Descripción</label>
								<input type="text" class="form-control" name="description">
							</div>
							<div class="form-group">
								<label for="">Precio</label>
								<input type="number" class="form-control" name="price">
							</div>
							<button type="submit" class="btn btn-primary">Gurdar</button>
							<a href="{{route('products.index')}}" class="btn btn-danger">Cancelar</a>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
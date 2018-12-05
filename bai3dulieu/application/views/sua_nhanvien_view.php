<!DOCTYPE html>
<html lang="en"><head>
	<title> Giao diện hiển thị danh sách nhân sự </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	
	<!--trong các đoạn mã thư viện ta phải thêm cái đường dẫn tuyệt đối tới trang web của mình thì mới dùng dc <?php echo base_url() ?>-->
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >
	

	
		<div class="container">
			<div class="text-xs-center">
				<h3 class="display-3">Sửa nhân sự</h3>
				<hr>
			</div>

		</div>
			<!--muốn lấy dữ liệu từ form(view) thì form phải gửi dữ liệu qua bên controller-->
			<!--để gửi file dc thì phải đổi enctype="multidata/form-data" sang enctype="multipart/form-data" thì nó mới chuyển dữ liệu file ảnh upload lên từng phần dc ,ảnh nó phải upload từ từ ko phải 1 phát ăn ngay như kiểu text cho nên phải để kiểu multipart-->
			<form method="post" enctype="multipart/form-data" action="<?= base_url();?>/index.php/nhansu/update_nhansu">

				<?php foreach ($dulieukq as $key => $value): ?>
					
				

				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="anhavatar" class="col-sm-4 form-control-label text-xs-right">Ảnh đại diện</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-6">
										<img src="<?php echo $value['anhavatar'] ?>" alt="" class="img-fludid">
									</div>
								</div>
								<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
								<input type="hidden" name="anhavatar2" value="<?php echo $value['anhavatar'] ?>">
								<input name="anhavatar" type="file" class="form-control" id="anhavatar" placeholder="Upload ảnh">
							
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="row">
							
								<label for="ten" class="col-sm-4 form-control-label text-xs-right">Tên nhân viên</label>
								<div class="col-sm-8">
									<input name="ten" type="text" class="form-control" id="ten" placeholder="Tên nhân viên" value="<?php echo $value['ten'] ?>">
								</div>
							
						</div>
					</div>

					
				</div>

				

				<div class="form-group row">

					<div class="col-sm-6">
						<div class="row">
							<label for="tuoi" class="col-sm-4 form-control-label text-xs-right">Tuổi</label>
							<div class="col-sm-8">
								<input name="tuoi" type="number" class="form-control" id="tuoi" placeholder="Tuổi" value="<?php echo $value['tuoi'] ?>">
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="row">
							<label for="sdt" class="col-sm-4 form-control-label text-xs-right">Tel</label>
							<div class="col-sm-8">
								<input name="sdt" type="text" class="form-control" id="sdt" placeholder="điện thoại" value="<?php echo $value['sdt'] ?>">
							</div>
						</div>
					</div>
					
					
				</div>	
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="sodonhang" class="col-sm-4 form-control-label text-xs-right">Số đơn hàng</label>
							<div class="col-sm-8">
								<input name="sodonhang" type="number" class="form-control" id="sodonhang" placeholder="Số đơn hàng" value="<?php echo $value['sodonhang'] ?>"			
								>
							</div>
						</div>
					
					</div>

					<div class="col-sm-6">
						<div class="row">
							<label for="linkfb" class="col-sm-4 form-control-label text-xs-right">Link Facebook</label>
							<div class="col-sm-8">
								<input name="linkfb" type="text" class="form-control" id="linkfb" placeholder="Link Facebook" value="<?php echo $value['linkfb'] ?>">
							</div>
						</div>
					
					</div>
				</div>
				
			<?php endforeach ?>
				<!--text-xs-right canh phải -->
				<!--text-xs-center canh giữa -->
				<div class="form-group row text-xs-center">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-outline-success">Lưu</button>
						
					</div>
				</div>
			</form>
		
	</div>
 
</body>
</html>


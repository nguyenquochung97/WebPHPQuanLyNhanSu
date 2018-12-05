<!DOCTYPE html>
<html lang="en"><head>
	<title> Giao diện hiển thị danh sách nhân sự </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	
	<!--trong các đoạn mã thư viện ta phải thêm cái đường dẫn tuyệt đối tới trang web của mình thì mới dùng dc <?php echo base_url() ?>-->
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>

	

	<!-- jquery upload , vô trang https://blueimp.github.io/jQuery-File-Upload/ mục download để download bản jquery upload về -->
	<script type="text/javascript" src="<?php echo base_url() ?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>jqueryupload/js/jquery.fileupload.js"></script>

 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >

	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3">Danh sách nhân sự</h3>
			<hr>
		</div>

	</div>

	<div class="container">
		<div class="row">

			<div class="card-deck-wrapper">
					<div class="card-deck">
					
			
				<?php foreach ($mangketqua as $key => $value): ?>
					<div class="col-sm-4">
						<div class="card">
							<img class="card-img-top img-fluid" src="<?= $value['anhavatar'] ?>" alt="Card image cap">
							<div class="card-block">
								<h4 class="card-title ten"><?= $value['ten'] ?></h4>
								<p class="card-text tuoi">Tuổi:<b><?= $value['tuoi'] ?></b></p>
								<p class="card-text sdt">Tel:<b><?= $value['sdt'] ?></b></p>
								<p class="card-text sodonhang">Số đơn đã hoàn thành:<?= $value['sodonhang'] ?></p>
								<p class="card-text linkfb"><small><a href="<?php echo $value['linkfb'] ?>" class="btn btn-secondary btn-xs">Facebook <i class="fa fa-chevron-right"></i></a></small></p>
								
								<!--truyền nội dung của 1 view sang bên controller thì phải truyền thông qua id tương ứng của cái view đó
								-phải truyền id vào cái đường dẫn đến controller để nó biết là sửa hay xoá theo cái id là bao nhieu
								-->
								<p class="card-text editns">
									<small><a href="<?= base_url();?>/index.php/nhansu/sua_nhansu/<?= $value['id'] ?>" class="btn btn-warning btn-xs">Sửa <i class="fa fa-pencil"></i></a></small>
									<small><a href="<?= base_url();?>/index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>"" class="btn btn-outline-danger btn-xs">Xoá <i class="fa fa-remove"></i></a></small>
									<!--khi click vào nút xoá thì sẽ chuyển hướng đến hàm trong controller có tên là xoa_nhansu, thì cái hàm xoa_nhansu sẽ gọi đến model có tên là removeDataByID và nó dựa vào cái id mà nó truyền từ view về vd cái id của view truyền về là 8 chả hạn ,thì trong hàm removeDataByID sẽ dựa vào số 8 này để xoá cái dữ liệu nào có id là 8 trong csdl-->
								</p>
								
							
						</div>
					</div>
				</div>
				<?php endforeach ?>
				</div>
				</div>
			
		</div>
		<div class="container">
			<div class="text-xs-center">
				<h3 class="display-3">Thêm mới nhân sự</h3>
				<hr>
			</div>

		</div>
			<!--muốn lấy dữ liệu từ form(view) thì form phải gửi dữ liệu qua bên controller-->
			<!--để gửi file dc thì phải đổi enctype="multidata/form-data" sang enctype="multipart/form-data" thì nó mới chuyển dữ liệu file ảnh upload lên từng phần dc ,ảnh nó phải upload từ từ ko phải 1 phát ăn ngay như kiểu text cho nên phải để kiểu multipart-->
			<!-- <form method="post" enctype="multipart/form-data" action="/index.php/nhansu/nhansu_add"> -->
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="anhavatar" class="col-sm-4 form-control-label text-xs-right">Ảnh đại diện</label>
							<div class="col-sm-8">
								<!-- nhận vào là 1 cải mảng , name="files[]" 1 cái mảng lưu trữ file  -->
								<!-- input có kiểu là file đổi name lại là files[] , mục đích là đưa thành dạng mảng lưu trữ -->
								<!-- sau đó tạo ra 1 folder trong nằm trong bai3dulieu(nằm ngoài application) đặt tên folder là files[] -->
								<input name="files[]" type="file" class="form-control" id="anhavatar" placeholder="Upload ảnh">
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="row">
							
								<label for="ten" class="col-sm-4 form-control-label text-xs-right">Tên nhân viên</label>
								<div class="col-sm-8">
									<input name="ten" type="text" class="form-control" id="ten" placeholder="Tên nhân viên">
								</div>
							
						</div>
					</div>

					
				</div>

				

				<div class="form-group row">

					<div class="col-sm-6">
						<div class="row">
							<label for="tuoi" class="col-sm-4 form-control-label text-xs-right">Tuổi</label>
							<div class="col-sm-8">
								<input name="tuoi" type="number" class="form-control" id="tuoi" placeholder="Tuổi">
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="row">
							<label for="sdt" class="col-sm-4 form-control-label text-xs-right">Tel</label>
							<div class="col-sm-8">
								<input name="sdt" type="text" class="form-control" id="sdt" placeholder="điện thoại">
							</div>
						</div>
					</div>
					
					
				</div>	
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="sodonhang" class="col-sm-4 form-control-label text-xs-right">Số đơn hàng</label>
							<div class="col-sm-8">
								<input name="sodonhang" type="number" class="form-control" id="sodonhang" placeholder="Số đơn hàng">
							</div>
						</div>
					
					</div>

					<div class="col-sm-6">
						<div class="row">
							<label for="linkfb" class="col-sm-4 form-control-label text-xs-right">Link Facebook</label>
							<div class="col-sm-8">
								<input name="linkfb" type="text" class="form-control" id="linkfb" placeholder="Link Facebook">
							</div>
						</div>
					
					</div>
				</div>
				
				<!--text-xs-right canh phải -->
				<!--text-xs-center canh giữa -->
				<div class="form-group row text-xs-center">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-outline-success nutxulyajax">Thêm mới(bằng ajax)</button>
						<button type="reset" class="btn btn-outline-danger">Nhập lại</button>
					</div>
				</div>
			<!-- </form> -->
		
	</div>
	<!--id bắt đầu bằng dấu # , val là giá trị của id-->
	<!-- ctrl+? để comment -->
	<!--  -->
	

 	<script>

 		duongdan='<?php echo base_url() ?>';

 		//đối tượng cần upload có id là anhavatar
 		//gọi tới cái hàm fileupload trong jqueryupload/test/basic.html
 		//đây là 1 cái hàm dc sử dụng để viết ra cái đường dẫn của file mà upload lên 
 		//để test thì mình chạy cái web của mình lên rồi chuôt phải kiểm tra source , vô phần network , ta thêm 1 cái ảnh bất kì rồi để ý có cái hàm uploadfile chạy lên , ta nhấn vô đó để kiểm tra xem cái ảnh của mình đã upload thành công hay chưa
 		$('#anhavatar').fileupload({
        url: duongdan+'index.php/nhansu/uploadfile',
        dataType: 'json',
        //done là thành công,sau khi thành công thì mình gọi ra cái hàm 
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                //console.log(file.url);//in ra đường dẫn, file.url chính là đường dẫn 
                tenfile=file.url;
            });
        }
    })

 		//toàn bộ cái hàm này chỉ dc thưc thi khi mà ta click vào nút ajax thôi 
 		//vậy là mình đã dùng ajax để gửi dữ liệu sang cái controller tên là ajax_add, và ajax_add sẽ insert dữ liệu này vào database 
 		//code thứ 1 này thì ta sẽ gửi nội dung qua bên controller để thêm dữ liệu vô database 
 		//phần này để xử lý ở tầng dữ liệu  (xứ lý bên trong)
 		//phần này gửi nội dung điền trong form về controller xử lý dữ liệu
 		//nếu ko có đoạn này thì vẫn có thểm dữ liệu trong html bình thường nhưng khi load lại trang dữ liệu thêm ở ngoài gian diện html sẽ mất vì ko dc lưu trong database
 		//giải thích :tenfile chứa đường dẫn của tấm hình , mình gán nó vào trong biến là anhavatar như trong vd này anhavatar: tenfile sau đó mình truyền cái biến anhavatar đó về cái hàm ajax_add để thêm dữ liệu anhavatar vào database , lưu ý ta truyền tên biến qua controller như thế nào(ở đây là anhavatar) thì qua bên hàm controller thì ta phải nhận đúng tên biến đó (nhận vào là anhavatar )thì mới lấy dc giá trị , nếu ghi ko đúng tên thì sẽ báo lỗi null
 	$('.nutxulyajax').click(function(event) {
 		$.ajax({
 			url: 'nhansu/ajax_add',
 			type: 'POST',
 			dataType: 'json',
 			data: {
 				ten: $('#ten').val(),
 				tuoi: $('#tuoi').val(),
 				sdt: $('#sdt').val(),
 				anhavatar: tenfile,	
 				linkfb: $('#linkfb').val(),
 				sodonhang: $('#sodonhang').val()
 			
 			},
 		})
 		.done(function() {
 			console.log("success");


 		})
 		.fail(function() {
 			console.log("error");
 		})
 		.always(function() {
 			console.log("complete");
 			//them nội dung bằng hàm append 
 			//code thứ 2 thì sau khi thêm dữ liệu vào database xong rồi thì ta dùng hàm append để hiển thị nội dung đó ra bên ngoài html
 			//phần này để xử lý ở tầng giao diện (bên ngoài)  
 			noidung='<div class="col-sm-4">';
 			noidung+='<div class="card">';
 			//noidung+='<img class="card-img-top img-fluid" src="http://localhost/bai3dulieu/Fileupload/lamngyeuemnhe.jpg" alt="Card image cap">';
 			noidung+='<img class="card-img-top img-fluid" src="'+tenfile+'" alt="Card image cap">';
 			noidung+='<div class="card-block">';
 			noidung+='<h4 class="card-title ten">'+$('#ten').val()+'</h4>';
 			noidung+='<p class="card-text tuoi">Tuổi:<b>'+$('#tuoi').val()+'</b></p>';
 			noidung+='<p class="card-text sdt">Tel:<b>'+$('#sdt').val()+'</b></p>';
 			noidung+='<p class="card-text sodonhang">Số đơn đã hoàn thành:'+$('#sodonhang').val()+'</p>';
 			noidung+='<p class="card-text linkfb"><small><a href="'+$('#sodonhang').val()+'" class="btn btn-secondary btn-xs">Facebook <i class="fa fa-chevron-right"></i></a></small></p>';
 			noidung+='<small><a href="<?= base_url();?>/index.php/nhansu/sua_nhansu/<?= $value['id'] ?>" class="btn btn-warning btn-xs">Sửa <i class="fa fa-pencil"></i></a></small>';
 			noidung+='<small><a href="<?= base_url();?>/index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>"" class="btn btn-outline-danger btn-xs">Xoá <i class="fa fa-remove"></i></a></small>';
 			noidung+='</p>';
 			noidung+='</div>';
 			noidung+='</div>';
 			noidung+='</div>';
 			
					
 			//$('.card-deck').append('<h2>Noi dung them moi</h2>');
 			$('.card-deck').append(noidung);
 			//xoá nội dung đã điền đi
 			$('#ten').val('');
 			$('#tuoi').val('');
 			$('#sdt').val('');
 			$('#linkfb').val('');
 			$('#sodonhang').val('');
 		});
 	});
 	
 	</script>
</body>
</html>


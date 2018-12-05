<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//đưa thư viện upload file vào sử dụng 
include 'UploadHandler.php';
class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua=$this->nhansu_model->getAllData();
		//biến cái $ketqua thành 1 cái mảng
		$ketqua=array('mangketqua' => $ketqua );
		//truyền dữ liệu sang cho view 
		$this->load->view('nhansu_view', $ketqua);
		//lưu ý khi ta nên load cái nhansu_view lên ta phải truyền vào cái mangketqua lun vì do đây là hàm index(là hàm dc load đầu tiên khi controller nhansu chạy)  , nếu ta chỉ load cái view nhansu_view mà ko truyền mangketqua thì khi chạy sẽ báo lỗi mảng mangketqua chưa dc định nghĩa vì mình có truyền cái mangketqua sang view đâu mà trong view ta lại đi duyệt cái mangketqua đó
		
	}
	public function nhansu_add()
	{
		
		//xử lý phần upload ảnh avatar
		$target_dir = "Fileupload/";//đường dẫn tới tấm hình, tấm hình sẽ dc lưu trong folder có tên là Fileupload, mình phải có đường dẫn mới lấy dc tấm hình
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		/*if (file_exists($target_file)) {
		    echo "Đã có 1 file trùng tên trong ổ cứng.";
		    $uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Chỉ chấp nhận file ảnh.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Lỗi , file chưa dc upload .";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		       // echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}

		//lấy dữ liệu từ view 
		//<!--muốn lấy dữ liệu từ form(view) thì form phải gửi dữ liệu qua bên controller nhansu có hàm xử lý là nhansu_add()-->
		$ten=$this->input->post('ten');//lấy dữ liệu từ cái trường ten trong form
		$tuoi=$this->input->post('tuoi');//nếu truyền dữ liệu thông qua cái form thì khi controller nhận dữ liệu thì mỗi cái phương thức post trong controller sẽ tương ứng vs 1 cái trường(hay cái input) trong form
		$sdt=$this->input->post('sdt');
		$sodonhang=$this->input->post('sodonhang');
		$linkfb=$this->input->post('linkfb');
		//lấy ra đường dẫn của tấm ảnh thì ta phải dùng hàm base_url(), ta dẫn tới folder là Fileupload , khi mình thêm anhavatar , thì nó sẽ dc lưu trong cái folder Fileupload
		//basename là tên file 
		$anhavatar= base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);
		//$_FILES["fileToUpload"] đưa vào cái tên của cái trường anhavatar để mình lấy về giá trị của thằng anhavatar
		

		//xuất thử kêt quả xem lấy dc dữ liệu ko
		//echo "tên là :$ten,tuổi là :$tuoi,điện thoại:$dienthoai,số đơn hàng:$sodonhang,link facebook:$linkfb";

		//sau khi có dc dữ liệu thì mình sẽ truyền dữ liệu đó cho model để thêm dữ liệu đó vào csdl 
		$this->load->model('nhansu_model');
		$trangthai=$this->nhansu_model->insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang);
		if ($trangthai) {
			//echo "Insert thành công";
			$this->load->view('insert_thanhcong_view');
		} else {
			echo "Insert thất bại";
		}
	
	}

	public function sua_nhansu($idnhanvao)
	{
		//echo "sửa nội dung";
		$this->load->model('nhansu_model');
		$ketqua=$this->nhansu_model->getDataByID($idnhanvao);//trả ra kết quả là 1 cái mảng theo cái id mà mình truyền vào

		//biến dữ liệu thành dạng mảng
		$ketqua = array('dulieukq' => $ketqua);

		//đưa dữ liệu $ketqua sang view sửa
		$this->load->view('sua_nhanvien_view', $ketqua, FALSE); 
	}
	public function xoa_nhansu($id)
	{
		$this->load->model('nhansu_model');
		if ($this->nhansu_model->removeDataByID($id)) {
			$this->load->view('xoa_thanhcong_view');
		} else {
			echo "Xoá không thành công";
		}
		
	}
	//hàm controller update_nhansu nhận(lấy) dữ liệu sửa thì view sua_nhanvien_view
	public function update_nhansu($value='')
	{
		//lấy dữ liệu từ cái view
		//lấy dữ liêu theo cái name của trường input
		$id=$this->input->post('id');
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$sodonhang=$this->input->post('sodonhang');
		$sdt=$this->input->post('sdt');
		$linkfb=$this->input->post('linkfb');

		
		//xử lý phần upload ảnh avatar
		$target_dir = "Fileupload/";//đường dẫn tới tấm hình, tấm hình sẽ dc lưu trong folder có tên là Fileupload, mình phải có đường dẫn mới lấy dc tấm hình
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		/*if (file_exists($target_file)) {
		    echo "Đã có 1 file trùng tên trong ổ cứng.";
		    $uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		   // echo "Chỉ chấp nhận file ảnh.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		   // echo "Lỗi , file chưa dc upload .";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		       // echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}
		$anhavatar= basename($_FILES["anhavatar"]["name"]);

		//kiểm tra điều kiện , nếu có upload ảnh thì lấy ảnh đó
		if ($anhavatar)  
		{
			//nếu có upload ảnh mới thì sẽ lấy cái ảnh upload mới đó ra 
			 $anhavatar=base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);
		} else {
			//nếu mà ko upload ảnh mới thì anhavatar sẽ lấy lại từ cái trường hidden có tên là anhavatar2(lấy lại ảnh cũ)
			$anhavatar=$this->input->post('anhavatar2');
			
		}
		//hết câu lệnh else anhavatar là xử lý xong 
		
		//gọi lun model để xử lý dòng dữ liệu nhân dc
		$this->load->model('nhansu_model');
		//echo $this->nhansu_model->updateByID($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang); xuất dòng này để kiểm tra xem update có thành công ko , nếu trả ra là 1 thì coi như update thành công 
		if ($this->nhansu_model->updateByID($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)) {
			$this->load->view('insert_thanhcong_view');
		} else {
			echo "thất bại";
		}
	 
	}

	public function ajax_add()
	{
		//riêng về phần upload ảnh thì ajax nó ko xử lý dc cái phần lấy ảnh bởi vì lấy ảnh thì mình phải upload trên 1 folder xong mình lấy đường dẫn folder đấy mình chuyển vào ajax để mình cập nhật trực tiếp lun 
		//ajax không gửi nhận dc file ảnh trưc tiếp(file vật lý) mà nó chỉ nhận đường dẫn của tấm ảnh(ajax chỉ nhận dc phần dữ liệu của tấm ảnh) đó thôi 
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$sdt=$this->input->post('sdt');
		$sodonhang=$this->input->post('sodonhang');
		$linkfb=$this->input->post('linkfb');
		
		//$anhavatar= base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);

		//cái đường dẫn của tấm hình 
		//$anhavatar= 'https://cdn.24h.com.vn/upload/4-2018/images/2018-11-16/1542348538-815-154233748137143-thumbnail.jpg';
		$anhavatar=$this->input->post('anhavatar');
		$this->load->model('nhansu_model');
		$trangthai=$this->nhansu_model->insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang);
		if ($trangthai) {
			
			echo "Inset thành công";
			//$this->load->view('insert_thanhcong_view');
		} else {
			echo "Insert thất bại";
		}
	}

	public function uploadfile()
	{
		$uploadfile=new UploadHandler();
	}

}

/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */
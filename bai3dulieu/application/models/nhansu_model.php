<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		//xử lý thong tin nhận về từ controller và upload vào mysql
		$dulieu = array(
		'ten' =>$ten ,
		'tuoi'=>$tuoi,
		'sdt' =>$sdt ,
		'anhavatar'=>$anhavatar,
		'linkfb' =>$linkfb ,
		'sodonhang'=>$sodonhang
		 );//upload dữ liệu vào mysql thì ta cần 1 cái mảng , vì nó chứa nhiều dữ liệu như , ten , sdt , tuoi... và tên key của mảng $dulieu nó phải đúng vs cái tên của cột dữ liệu trong bảng dữ liệu 

		//insert mảng dulieu vào bảng nhanvien trong sql
		$this->db->insert('nhan_vien', $dulieu);//object là giá trị truyền vào bảng, ở đây chính là mảng $dulieu
		//nếu nó insert đúng thì ta phải trả về 1 cái return 
		return $this->db->insert_id();//nếu như cái id này nó bằng 0 nghĩa là ko insert dc gì hết , còn nếu id = 1 thì có nghĩa là insert thành công 



	}

	//lấy dữ liệu từ csdl 
	public function getAllData()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');//sắp xếp dữ liệu trong hàm index của controller tăng dần theo id
		$dulieu=$this->db->get('nhan_vien');
		//sau khi lấy dc dữ liệu rồi ta biến dữ liệu đó thành 1 cái mảng 
		$dulieu=$dulieu->result_array();
		//var_dump($dulieu);
		return $dulieu;//trả về kết quả là 1 cái mảng ,nghĩa là cứ gọi cái hàm getAllData() thì nó trả ra dữ liệu là 1 cái mảng 
		//lưu ý muốn dữ liệu trong database dc hiển thị lên view thì phải chuyển dữ liệu đó sang dạng mảng 
	}
	public function getDataByID($key)
	{
		$this->db->select('*');
		$this->db->where('id', $key);
		$dulieu=$this->db->get('nhan_vien');
		$dulieu=$dulieu->result_array();//lây về dữ liệu dạng mảng 
		return $dulieu;
		/*echo "<pre>";
		var_dump($dulieu);*/
	}
	public function updateByID($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		//muốn lưu dữ liệu dc thì phải đóng gói dữ liệu đó thành 1 cái mảng, bởi vì đóng gói thành 1 mảng mới truyền dc , chứ truyền lẻ tẻ sao truyền dc 
		//đóng gói các biến thành 1 cái mảng dữ liệu
		//ctrl+shift+d để copy 
		$data = array(
			'id' => $id,
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang
			
			 );
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);//dữ liệu truyền vào là 1 cái $object tức là 1 cái đối tượng bao gồm tất cả các dữ liệu truyền vào($id,$ten,$tuoi...) tức là 1 cái mảng 
		//lý do return là để xem update dữ liệu có thành công hay chưa , thành công thì trả về 1  , trả về 0 thì ko thành công

	}

	//muốn xoá cái nào thì lấy dc id của cái đấy thì mới xoá dc 
	public function removeDataByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
	}

}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */
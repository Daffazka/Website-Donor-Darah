<?php 
 
class M_data extends CI_Model{


    //LOGIN REGISTER
    public function proses_register($user){
        $this->db->insert('tb_user', $user);
    }

    public function proseslogin($user,$password){
         $this->db->where('username', $user);
         // $this->db->where('email', $email);
         $this->db->where('password',$password);
         return $this->db->get('tb_user')->row();
    }

    //DATA USER

	//ADMIN
	public function tampil_stokdarah(){
		return $this->db->get('tb_stokdarah');
	}

    public function input_stokdarah($data){
        $this->db->insert('tb_stokdarah', $data);
    }


    public function delete_stokdarah($no){
        return $this->db->delete('tb_stokdarah',array('id'=>$no));
    }

    public function tampil_pendonor(){
        return $this->db->get('tb_pendonor');
    }

    public function input_datapendonor($data){
        $this->db->insert('tb_pendonor', $data);
    }

    public function delete_datapendonor($no){
        return $this->db->delete('tb_pendonor',array('id'=>$no));
    }

    public function tampil_tranfusi(){
        return $this->db->get('tb_tranfusi');
    }

    public function delete_datatranfusi($no){
        return $this->db->delete('tb_tranfusi',array('id'=>$no));
    }

    //USER
    public function tampil_stokdarahuser(){
        return $this->db->get('tb_stokdarah');
    }

    public function tampil_riwayat(){
        return $this->db->get('tb_tranfusi');
    }

    public function input_datatranfusi($data){
        $this->db->insert('tb_tranfusi', $data);
    }

    //FIND KATEGORI
    public function search_kat($key){
         $results = array();
        // $this->db->select('*');
        // $this->db->from('tb_dataloker');
        // $this->db->like('kategori',$key);
        //  $query = $this->db->get();
         $query = $this->db->query('select * from tb_dataloker where batas_daftar > "'.date('Y-m-d').'" and kategori like "%'.$key.'%"');
         if($query->num_rows() > 0) {
        $results = $query->result();
        return $results;
    }
    return $results;
       
    }

    public function search_kat2($key){
         $results = array();
        // $this->db->select('*');
        // $this->db->from('tb_dataloker');
        // $this->db->like('kategori',$key);
        //  $query = $this->db->get();
         $query = $this->db->query('select * from tb_dataloker where id!='.$key.'  order by id desc limit 4');
         
        
       
    return $query;
       
    }
   
}
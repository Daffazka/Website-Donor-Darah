<?php 
 
class Home extends CI_Controller{
 
 	public function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
    $this->load->library('session');

	}



//LOGIN
  public function index(){
    $this->load->view('login/login');
  }

  public function filter($data)
   {  $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
     return $data;
     unset($data);
   }

   public function ceklogin()
   {
     if(isset($_POST['login'])){
       $user = $this->input->post('username',true);
       $user = $this->filter($user);
       // $email = $this->input->post('email',true);
       // $email = $this->filter($email);
       $password = $this->input->post('password',true);
       $password = $this->filter($password);
       $cek = $this->m_data->proseslogin($user,$password);
       $hasil = count($cek);
       if($hasil > 0){
         $ceklogin = $this->db->get_where('tb_user',array('username' => $user, 'password' => $password))->row();
         if($ceklogin->level == 'admin'){
           $sdata=array();
           $sdata['username']= $cek->username;
           // $sdata['email']= $cek->email;
           $sdata['password']= $cek->password;
           $this->session->set_userdata($sdata);

           if ( $this->session->userdata('username') and 
              $this->session->userdata('password') )
              { 
                redirect('home/index_admin');
              }
          else
              { $this->load->view('login/login');
              }

         }elseif($ceklogin->level == 'user'){
            $sdata=array();
            $sdata['username']= $cek->username;
            // $sdata['email']= $cek->email;
            $sdata['password']= $cek->password;
            $this->session->set_userdata($sdata);

            if ( $this->session->userdata('username') and 
               $this->session->userdata('password') )
               { 
                 redirect('home/index_user');
               } 
            // elseif ( $this->session->userdata('email') and 
            //   $this->session->userdata('password') )
            //    {
            //      redirect('home/index');
            //    } 
            else
               { $this->load->view('login/login');
               }
         }
       }else{
          redirect('home/login_gagal');
       }
       unset($user,$password,$cek,$hasil,$sdata);
     }
   }

   public function login_gagal()
   {  $data['gagal'] = 'Anda Gagal Login';
     $this->load->view('login/login',$data);    
   }

  //LOGOUT
  public function logout()
  {
    $username=$this->session->userdata('username');
    $password=$this->session->userdata('password');
    $array_items = array($username => '', $password => '');
    $this->session->unset_userdata($array_items);
    $this->session->sess_destroy();
    redirect('home/index');
  }

  //ADMIN
	public function index_admin(){
		// $data['user'] = $this->m_data->tampil_dataloker()->result();
		$this->load->view('admin/v_home');
	}

  public function datauser(){
    $data['user'] = $this->m_data->tampil_datauser()->result();
    $this->load->view('admin/v_datauser',$data);
  }


  //STOKDARAH

  public function stokdarah_admin(){
    $data['user'] = $this->m_data->tampil_stokdarah()->result();
    $this->load->view('admin/v_stokdarah', $data);
  }

  public function tambah_stokdarah(){
    $this->load->view('admin/tambah_stokdarah');
  }

  public function input_stokdarah(){
    $jenisdarah=$this->input->post('jenisdarah');
    $golongandarah=$this->input->post('golongandarah');
    $resusdarah=$this->input->post('resusdarah');
    $jumlah=$this->input->post('jumlah');
    if($_POST['submit']){

      $data=array(
        'jenisdarah'=>$jenisdarah,
        'golongandarah'=>$golongandarah,
        'resusdarah'=>$resusdarah,
        'jumlah'=>$jumlah,
      );   
      $this->m_data->input_stokdarah($data,'tb_stokdarah');
      redirect('home/stokdarah_admin','refresh');
      } else{
        alert('gagal');
      }
  }

   public function edit_stokdarah( $no = NULL )
   {
     $this->db->where('id', $no);
     $data['content'] = $this->db->get('tb_stokdarah');
 
     $this->load->view('admin/edit_stokdarah', $data);
   }

   public function proses_edit_stokdarah($no='')
   {
     $jenisdarah=$this->input->post('jenisdarah');
     $golongandarah=$this->input->post('golongandarah');
     $resusdarah=$this->input->post('resusdarah');
     $jumlah=$this->input->post('jumlah');
     if($_POST['submit']){

        $data=array(
          'jumlah'=>$jumlah,
        );  
        $data2=array(
          'jumlah'=>$jumlah,
          'jenisdarah'=>$jenisdarah,
        );  
        $data3=array(
          'jumlah'=>$jumlah,
          'golongandarah'=>$golongandarah,
        );  
        $data4=array(
          'jumlah'=>$jumlah,
          'resusdarah'=>$resusdarah,
        );  
        $data5=array(
          'jumlah'=>$jumlah,
          'jenisdarah'=>$jenisdarah,
          'golongandarah'=>$golongandarah,
        );  
        $data6=array(
          'jumlah'=>$jumlah,
          'jenisdarah'=>$jenisdarah,
          'resusdarah'=>$resusdarah,
        );  
        $data7=array(
          'jumlah'=>$jumlah,
          'golongandarah'=>$golongandarah,
          'resusdarah'=>$resusdarah
        );  
        $data8=array(
          'jumlah'=>$jumlah,
          'jenisdarah'=>$jenisdarah,
          'golongandarah'=>$golongandarah,
          'resusdarah'=>$resusdarah
        );  

        if( $jenisdarah == '-- Pilih Jenis Darah --' and $golongandarah == '-- Pilih Golongan Darah --' and $resusdarah == '-- Pilih Resus Darah --' ){

          $this->db->where('id', $no);
          $this->db->update('tb_stokdarah', $data);
          redirect('home/stokdarah_admin','refresh');
        }
        elseif( $jenisdarah == '-- Pilih Jenis Darah --' and $golongandarah == '-- Pilih Golongan Darah --'){

          $this->db->where('id', $no);
          $this->db->update('tb_stokdarah', $data5);
          redirect('home/stokdarah_admin','refresh');
        }
        elseif( $jenisdarah == '-- Pilih Jenis Darah --' and $resusdarah == '-- Pilih Resus Darah --'){

          $this->db->where('id', $no);
          $this->db->update('tb_stokdarah', $data6);
          redirect('home/stokdarah_admin','refresh');
        }
        elseif( $golongandarah == '-- Pilih Golongan Darah --' and $resusdarah == '-- Pilih Resus Darah --'){

          $this->db->where('id', $no);
          $this->db->update('tb_stokdarah', $data7);
          redirect('home/stokdarah_admin','refresh');
        }
        elseif( $jenisdarah == '-- Pilih Jenis Darah --' ){

          $this->db->where('id', $no);
          $this->db->update('tb_stokdarah', $data2);
          redirect('home/stokdarah_admin','refresh');
        }
        elseif( $golongandarah == '-- Pilih Golongan Darah --' ){

          $this->db->where('id', $no);
          $this->db->update('tb_stokdarah', $data3);
          redirect('home/stokdarah_admin','refresh');
        }
        elseif( $resusdarah == '-- Pilih Resus Darah --' ){

          $this->db->where('id', $no);
          $this->db->update('tb_stokdarah', $data4);
          redirect('home/stokdarah_admin','refresh');
        }
        else {
          $this->db->where('id', $no);
          $this->db->update('tb_stokdarah', $data8);
          redirect('home/stokdarah_admin','refresh');
        }
      }
      else{
        redirect('admin/v_stokdarah');
      }
    }

  public function delete_stokdarah($no=NULL){
    if(empty($no)) show_404();

    if($this->m_data->delete_stokdarah($no)){
      redirect(site_url('home/stokdarah_admin'));
    }
  }

  //DATAPENDONOR

  public function datapendonor_admin(){
    $data['user'] = $this->m_data->tampil_pendonor()->result();
    $this->load->view('admin/v_datapendonor', $data);
  }

  public function tambah_datapendonor(){
    $this->load->view('admin/tambah_datapendonor');
  }

  public function input_datapendonor(){
    $tgl_donor=$this->input->post('tgl_donor');
    $golongandarah=$this->input->post('golongandarah');
    $nama_pendonor=$this->input->post('nama_pendonor');
    if($_POST['submit']){

      $data=array(
        'tgl_donor'=>$tgl_donor,
        'golongandarah'=>$golongandarah,
        'nama_pendonor'=>$nama_pendonor,
      );   
      $this->m_data->input_datapendonor($data,'tb_pendonor');
      redirect('home/datapendonor_admin','refresh');
      } else{
        alert('gagal');
      }
  }

  public function edit_datapendonor( $no = NULL ){
     $this->db->where('id', $no);
     $data['content'] = $this->db->get('tb_pendonor');
 
     $this->load->view('admin/edit_datapendonor', $data);
  }
   
  public function proses_edit_datapendonor($no='')
   {
     $tgl_donor=$this->input->post('tgl_donor');
     $golongandarah=$this->input->post('golongandarah');
     $nama_pendonor=$this->input->post('nama_pendonor');
     if($_POST['submit']){

        $data=array(
          'tgl_donor'=>$tgl_donor,
          'nama_pendonor'=>$nama_pendonor,
        );  

        $data2=array(
          'tgl_donor'=>$tgl_donor,
          'golongandarah'=>$golongandarah,
          'nama_pendonor'=>$nama_pendonor,
        ); 
        
        if($golongandarah=="-- Pilih Golong Darah --"){
          $this->db->where('id', $no);
          $this->db->update('tb_pendonor', $data);
          redirect('home/datapendonor_admin','refresh');
        }else {
          $this->db->where('id', $no);
          $this->db->update('tb_pendonor', $data2);
          redirect('home/datapendonor_admin','refresh');
        }
      }
      else{
      redirect('admin/datapendonor_admin');
      }
    }

  public function delete_datapendonor($no=NULL){
    if(empty($no)) show_404();

    if($this->m_data->delete_datapendonor($no)){
      redirect(site_url('home/datapendonor_admin'));
    }
  }
  
  //DATATRANFUSI

  public function datatranfusi_admin(){
    $data['user'] = $this->m_data->tampil_tranfusi()->result();
    $this->load->view('admin/v_datatranfusi', $data);
  }

  public function tambah_datatranfusi(){
    $this->load->view('admin/tambah_datatranfusi');
  }

  public function delete_datatranfusi($no=NULL){
    if(empty($no)) show_404();

    if($this->m_data->delete_datatranfusi($no)){
      redirect(site_url('home/datatranfusi_admin'));
    }
  }

  //USER

  public function index_user(){
    $this->load->view('user/v_home');
  }

  public function stokdarah_user(){
    $data['user'] = $this->m_data->tampil_stokdarahuser()->result();
    $this->load->view('user/v_stokdarah', $data);
  }

  public function riwayat(){
    $data['user'] = $this->m_data->tampil_riwayat()->result();
    $this->load->view('user/v_riwayat', $data);
  }

  public function message_user(){
    $this->load->view('user/v_message');
  }

  public function input_message(){
    $nik=$this->input->post('nik');
    $nama_pasien=$this->input->post('nama_pasien');
    $tgl_lahir=$this->input->post('tgl_lahir');
    $alamat_pasien=$this->input->post('alamat_pasien');
    $nomor_pasien=$this->input->post('nomor_pasien');
    $tgl_tranfusi=$this->input->post('tgl_tranfusi');
    $golongandarah=$this->input->post('golongandarah');
    $jumlah=$this->input->post('jumlah');
    $rumahsakit=$this->input->post('rumahsakit');
    $alamat_rs=$this->input->post('alamat_rs');
    $nomor_rs=$this->input->post('nomor_rs');
    if($_POST['submit']){

      $data=array(
        'nik'=>$nik,
        'nama_pasien'=>$nama_pasien,
        'tgl_lahir'=>$tgl_lahir,
        'alamat_pasien'=>$alamat_pasien,
        'nomor_pasien'=>$nomor_pasien,
        'tgl_tranfusi'=>$tgl_tranfusi,
        'golongandarah'=>$golongandarah,
        'jumlah'=>$jumlah,
        'rumahsakit'=>$rumahsakit,
        'alamat_rs'=>$alamat_rs,
        'nomor_rs'=>$nomor_rs,

      );   
      $this->m_data->input_datatranfusi($data,'tb_tranfusi');
      redirect('home/riwayat','refresh');
      } else{
        alert('gagal');
      }
  }




}
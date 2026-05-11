<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load helper
        $this->load->helper(['url', 'form']);

        // Load library
        $this->load->library(['session', 'form_validation']);

        // Load model
        $this->load->model('User_model');
        $this->load->model('Capsule_model');
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // Cek login
        if ($this->session->userdata('is_login') != true) {
            redirect('home/login');
        }

        // Ambil user id
        $user_id = $this->session->userdata('iduser');

        // Active capsules
        $data['active_capsules'] = $this->Capsule_model
            ->getActiveCapsules($user_id);

        // History capsules
        $data['history_capsules'] = $this->Capsule_model
            ->getHistoryCapsules($user_id);

        // Load dashboard
        $this->load->view('home', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | HISTORY
    |--------------------------------------------------------------------------
    */
    public function history()
    {
        // Cek login
        if ($this->session->userdata('is_login') != true) {
            redirect('home/login');
        }

        // Ambil user id
        $user_id = $this->session->userdata('iduser');

        // Ambil history capsule
        $data['history_capsules'] = $this->Capsule_model
            ->getHistoryCapsules($user_id);

        // Load halaman history
        $this->load->view('history', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        // Jika sudah login
        if ($this->session->userdata('is_login') === true) {

            redirect('home');
        }

        $data = [
            'title' => 'Login'
        ];

        $this->load->view('login', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER PAGE
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        $this->load->view('register');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES REGISTER
    |--------------------------------------------------------------------------
    */

    public function proses_register()
    {
        $data = [

            'username' => $this->input->post('username'),

            'password' => $this->input->post('password'),

            'fullname' => $this->input->post('fullname'),

            'level' => 'user'
        ];

        $this->User_model->insertUser($data);

        redirect('home/login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function proses_login()
    {
        // Ambil input
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        // Cek database
        $user = $this->User_model->cek_login($username, $password);

        // Jika user ditemukan
        if ($user) {

            // Buat session
            $this->session->set_userdata([
                'is_login'    => true,
                'iduser'      => $user->id,
                'username'    => $user->username,
                'namalengkap' => $user->fullname,
                'level'       => $user->level
            ]);

            // Redirect dashboard
            redirect('home');

        } else {

            // Jika gagal login
            $this->session->set_flashdata(
                'error',
                'Username atau password salah!'
            );

            redirect('home/login');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FORM CREATE CAPSULE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        // Cek login
        if ($this->session->userdata('is_login') != true) {
            redirect('home/login');
        }

        $this->load->view('create_capsule');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN CAPSULE
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        // Cek login
        if ($this->session->userdata('is_login') != true) {
            redirect('home/login');
        }

        // CONFIG UPLOAD
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5000;

        $this->load->library('upload', $config);

        $image = '';

        // Upload gambar
        if($this->upload->do_upload('image')){

            $upload_data = $this->upload->data();

            $image = $upload_data['file_name'];
        }

        // Data capsule
        $data = [

            'user_id' => $this->session->userdata('iduser'),

            'title' => $this->input->post('title'),

            'description' => $this->input->post('description'),

            'open_date' => $this->input->post('open_date'),

            'image' => $image,

            'status' => 'locked'
        ];

        // Simpan database
        $this->Capsule_model->insertCapsule($data);

        redirect('home');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE CAPSULE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        // Cek login
        if ($this->session->userdata('is_login') != true) {
            redirect('home/login');
        }

        // Hapus data
        $this->Capsule_model->deleteCapsule($id);

        // Kembali ke dashboard
        redirect('home');
    }

    /*
    |--------------------------------------------------------------------------
    | VIEW CAPSULE
    |--------------------------------------------------------------------------
    */

    public function view($id)
    {
        // Cek login
        if ($this->session->userdata('is_login') != true) {
            redirect('home/login');
        }

        // Ambil data capsule
        $user_id = $this->session->userdata('iduser');

        $data['capsule'] = $this->Capsule_model
            ->getCapsuleByIdAndUser($id, $user_id);

        // Load halaman detail
        $this->load->view('view_capsule', $data);
    }



    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        // Hapus session
        $this->session->sess_destroy();

        // Flash message
        $this->session->set_flashdata(
            'success',
            'Anda berhasil logout'
        );

        // Redirect login
        redirect('home/login');
    }
}
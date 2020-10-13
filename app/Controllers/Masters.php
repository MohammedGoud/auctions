<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Masters extends Controller
{
    // show users list
    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        //$this->load->view('menu');
        
        return view('masters/list', $data);
    }

    // show add user form
    public function create(){
        return view('masters/add');
    }
 
    // insert data into database
    public function store() {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/masters/list'));
    }

    // show single user
    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('masters/edit', $data);
    }

    // update user data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'username' => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/masters/list'));
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/masters/list'));
    }    
}
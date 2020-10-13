<?php 
namespace App\Controllers;
use App\Models\BuyerModel;
use App\Models\AuctionModel;

use CodeIgniter\Controller;

class Buyers extends Controller
{
    // show buyers list
    public function index(){
        $BuyerModel = new BuyerModel();
        $data['buyers'] = $BuyerModel->orderBy('id', 'DESC')->findAll();
        return view('buyers/list', $data);
    }

    // show add buyer form
    public function create(){
        $AuctionModel = new AuctionModel();
        $data['auctions'] = $AuctionModel->orderBy('id', 'DESC')->findAll();
        
        return view('buyers/add',  $data);
    }
 
    // insert data into database
    public function store() {
        $BuyerModel = new BuyerModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
            'auction_name'  => $this->request->getVar('auction_name'),
        ];
        $BuyerModel->insert($data);
        return $this->response->redirect(site_url('/buyers/list'));
    }

    // show single buyer
    public function singlebuyer($id = null){
        $BuyerModel = new BuyerModel();
        $data['buyer_obj'] = $BuyerModel->where('id', $id)->first();
        return view('buyers/edit', $data);
    }

    // update buyer data
    public function update(){
        $BuyerModel = new BuyerModel();
        $id = $this->request->getVar('id');
        $data = [
            'username' => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
            'auction_name'  => $this->request->getVar('auction_name')
        ];
        $BuyerModel->update($id, $data);
        return $this->response->redirect(site_url('/buyers/list'));
    }
 
    // delete buyer
    public function delete($id = null){
        $BuyerModel = new BuyerModel();
        $data['buyer'] = $BuyerModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/buyers/list'));
    }    
}
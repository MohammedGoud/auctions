<?php 
namespace App\Controllers;
use App\Models\AuctionModel;
use CodeIgniter\Controller;

class Auctions extends Controller
{
    // show auctions list
    public function index(){
        $AuctionModel = new AuctionModel();
        $data['auctions'] = $AuctionModel->orderBy('id', 'DESC')->findAll();
        //$this->load->view('menu');
        
        return view('auctions/list', $data);
    }

    // show add auction form
    public function create(){
        return view('auctions/add');
    }
 
    // insert data into database
    public function store() {
        $AuctionModel = new AuctionModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'location'  => $this->request->getVar('location'),
        ];
        $AuctionModel->insert($data);
        return $this->response->redirect(site_url('/auctions/list'));
    }

    // show single auction
    public function singleAuction($id = null){
        $AuctionModel = new AuctionModel();
        $data['auction_obj'] = $AuctionModel->where('id', $id)->first();
        return view('auctions/edit', $data);
    }

    // update auction data
    public function update(){
        $AuctionModel = new AuctionModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'location'  => $this->request->getVar('location'),
        ];
        $AuctionModel->update($id, $data);
        return $this->response->redirect(site_url('/auctions/list'));
    }
 
    // delete auction
    public function delete($id = null){
        $AuctionModel = new AuctionModel();
        $data['auction'] = $AuctionModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/auctions/list'));
    }    
}
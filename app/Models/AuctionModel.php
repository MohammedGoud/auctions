<?php 
namespace App\Models;
use CodeIgniter\Model;

class AuctionModel extends Model
{
    protected $table = 'auctions';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name', 'location','created_by'];
}
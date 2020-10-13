<?php 
namespace App\Models;
use CodeIgniter\Model;

class BuyerModel extends Model
{
    protected $table = 'buyers';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['username', 'password','master_id', 'auction_name'];
}
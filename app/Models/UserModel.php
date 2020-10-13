<?php 
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'masters_users';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['username', 'password'];
}
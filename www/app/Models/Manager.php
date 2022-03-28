<?php 
namespace App\Models;
use CodeIgniter\Model;
class Manager extends Model{
    protected $table = 'Manager';
    protected $primaryKey = 'managerId';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['managerId','managerPwd','managerName','level','lastDateTime'];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'lastDateTime';
    protected $updatedField  = 'lastDateTime';
    protected $deletedField  = 'lastDateTime';


    // 寫入登入狀態
    function setLoginSession($managerId){
        $_SESSION['managerStatus'] = true;
        $_SESSION['managerId'] = $managerId;
        return true;
    }
    // 取出登入資料
    function getLoginSession(){
        $res['managerStatus'] = $_SESSION['managerStatus'];
        $res['managerId'] = $_SESSION['managerId'];
        return $res;
    }
    // 登出
    function logout(){
        unset($_SESSION['managerStatus']);
        unset($_SESSION['managerId']);
        return true;
    }
    // 頁面用驗證登入
    function chkLoginStatus(){
        if( isset($_SESSION['managerStatus']) && isset($_SESSION['managerId']) ){
            return true;
        }else{
            return false;
        }
    }

}
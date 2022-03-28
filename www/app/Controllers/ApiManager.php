<?php 
/****
 * 管理員帳號
 * 
 */
namespace App\Controllers;
class ApiManager extends BaseController{
    /**
     * 行為
     * 
     */
    function Login(){
        $cols = array('managerId','managerPwd');
        $required = array('managerId','managerPwd');
        $data = $this->input->chkGetPost($cols,$required);
        if($this->manager->where($data)->countAllResults() == 0){
            $this->api->show('500','帳密驗證錯誤');
        }else{
            $manager = $this->manager->find($data['managerId']);
            unset($manager['managerPwd']);
            $this->manager->setLoginSession($manager['managerId']);
            $this->api->show('200','',$this->manager->getLoginSession());
        }
    }
    function Logout(){
        $this->manager->logout();
        $this->api->show('200');
    }
    function getLoginStatus(){
        $res['loginStatus'] = $this->manager->chkLoginStatus();
        $this->api->show('200','',$res);
    }




    /**
     * CRUD ==========================
     */
    function SetOne(){
        $cols = array('managerId','managerPwd','managerName','level');
        $required = array('managerId','managerPwd','managerName');
        $data = $this->input->chkGetPost($cols,$required);
        $this->manager->save($data);
        $this->api->show('200');
    }
    function Once(){
        $cols = array('managerId');
        $required = array('managerId');
        $data = $this->input->chkGetPost($cols,$required);
        if($this->manager->where($data)->countAllResults() == 0){
            $this->api->show('404');
        }else{
            $manager = $this->manager->find($data['managerId']);
            $this->api->show('200','',$manager);
        }
    }
    function RemoveOne(){
        $cols = array('managerId');
        $required = array('managerId');
        $data = $this->input->chkGetPost($cols,$required);
        if($this->manager->where($data)->countAllResults() == 0){
            $this->api->show('404');
        }else{
            $this->manager->where($data)->delete();
            $this->api->show('200');
        }
    }
    function List(){
        $data = $this->manager->orderby('lastDateTime','DESC')->findAll();
        $this->api->show('200','',$data);
    }
}
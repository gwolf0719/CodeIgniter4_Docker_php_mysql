<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function login(){
        return view("./backend/login");
    }
    public function logout(){
        $this->manager->logout();
        return redirect()->to('./login');
    }
    public function index()
    {
        if(!$this->manager->chkLoginStatus()){return redirect()->to('./login');}
        $view = [
            'path'=>"backend/container/index"
        ];
        return view("/backend/layout",$view);
    }
    /**
     * Manager 管理員
     */
    function managerList(){
        if(!$this->manager->chkLoginStatus()){return redirect()->to('./login');}
        
        return view('backend/container/manager/index');
    }


    /**
     * Assets 素材管理
     */
    function assetsList(){
        if(!$this->manager->chkLoginStatus()){return redirect()->to('./login');}
        return view('backend/container/assets/index');
    }

    function messageTask(){
        if(!$this->manager->chkLoginStatus()){return redirect()->to('./login');}
        return view('backend/container/messageTask/index');
    }

    function messageTaskEdit(){
        if(!$this->manager->chkLoginStatus()){return redirect()->to('./login');}
        return view('backend/container/messageTask/edit');
    }
    function mailMember(){
        if(!$this->manager->chkLoginStatus()){return redirect()->to('./login');}
        return view('backend/container/mailMember/index');
    }
    function sendLog(){
        if(!$this->manager->chkLoginStatus()){return redirect()->to('./login');}
        return view('backend/container/sendLog/index');
    }
    
}

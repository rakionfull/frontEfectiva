<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Response;
 
class Auth extends BaseController {

    public function index() {
      
      if(($this->session->logged_in && !$this->session->change)){
        return redirect()->to(base_url('/inicio'));
      }else{
        // //opteniendo el cpatcha
        // $get_endpoint = '/newcaptcha';
        // $response =(perform_http_request('GET', REST_API_URL . $get_endpoint));
        // // var_dump($response);
        // $this->session->remove('captchaword');
        // $this->session->set('captchaword',$response->captcha);
        // $data = [
        //     "captcha" => $response->image,
        // ];

        return view('auth/login');
      
      }
          
      
     
      
    }
    public function getNewCaptcha() {
        //opteniendo el cpatcha
        // $get_endpoint = '/newcaptcha';
        // $response =(perform_http_request('GET', REST_API_URL . $get_endpoint));
        
        // $this->session->remove('captchaword');
        // $this->session->set('captchaword',$response->captcha);
        // $data=$response->image; 
        // return $data;
    }
    public function validaCaptcha() {
      
        // if($this->request->getPost('captcha') !== $this->session->captchaword)
        // {
       
        //   $error = [
        //     'error' => 'Captcha Incorrecto',
          
        //   ];
        //   echo json_encode($error);
        // }else{
          // $get_endpoint = '/validaCaptcha';
          //  $request_data = [
          //   'captcha' => $this->request->getPost('captcha')
          // ];
          //  $response = perform_http_request('POST', REST_API_URL . $get_endpoint,$request_data );
          
          // if($response->msg == 1 ){
            
          //  helper('browser'); 
           
            $post_endpoint = '/login';
            $request_data = (array(
              "username" => $this->request->getPost('username'), 
              "password" => $this->request->getPost('pass'),
              "terminal" =>  navegacion($this->request->getUserAgent()),
              "ip" =>  $this->request->getIPAddress()));
              // echo json_encode($request_data);
            $response = perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data);
            
         
            if(!$response->password){
              if($response->change == 1 ){
                $newdata = [
                  'user' => $response->user,
                  'logged_in' => true,
                  'change'=> false,
                  'id' => $response->id,
                  'token' => $response->access_token->jwt,
                  'escenario' => $response->escenario,
                  'permisos' => $response->permisos,
                  'is_user_negocio' => $response->is_user_negocio
                ];
               
              }else{
                $newdata = [
                  'user' => $response->user,
                  'logged_in' => true,
                  'change' => true,
                  'id' => $response->id,
                  'escenario' => $response->escenario,
                  'token' => $response->access_token->jwt,
                  'escenario' => $response->escenario,

                  'is_user_negocio' => $response->is_user_negocio
                ];
                
              }
               
              $this->session->set($newdata);
              if($response->msg){
                $this->session->setFlashdata('error','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$response->msg.'
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
               </div>');
              }
             
              echo json_encode($response);
                
               
            }else{
              echo json_encode($response);
            }


          
          //}
          // else{
          //   echo json_encode($response);
          //  }
          
       //}
         
         
    }
    public function logout(){
      if($this->session->logged_in){
      
        $get_endpoint = '/api/logout/'.$this->session->id;
        $request_data = [
          "terminal" =>navegacion($this->request->getUserAgent()),
          "ip" =>  $this->request->getIPAddress(),
          "username" =>  $this->session->user,
        ];
        $response = perform_http_request('POST', REST_API_URL . $get_endpoint,$request_data );
        $this->session->destroy();
        echo json_encode($response);
        // if($response->dato){
        //   // $this->session->destroy();
         
        //   return json_encode($response);
        
        //   // return redirect()->to(base_url('/login'));
        // }
        
      }
      else{
        return redirect()->to(base_url('/login'));
      }
     
    }
    public function updatePass(){
    
      if($this->session->logged_in){
        if($this->request->getPost()){
          $post_endpoint = '/api/change_pass';
           $request_data =["passw" => $this->request->getPost('passw'),
              "repassw" => $this->request->getPost('repassw'),
              "id"=> $this->session->id,
              "terminal" =>navegacion($this->request->getUserAgent()),
              "ip" =>  $this->request->getIPAddress(),
              "username" =>  $this->session->user,
             ];
            
           $response = (perform_http_request('POST', REST_API_URL . $post_endpoint,$request_data));
            // var_dump($response);
            if(isset($response->error)){
              $this->session->setFlashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">
             '.$response->error.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            return redirect()->to(base_url('/change_pass'));
           }else{
            $this->session->setFlashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Clave Modificada Correctamente
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
           </div>');
            return redirect()->to(base_url('/login'));
          }
           
           
        }else{
          return redirect()->to(base_url('/login'));
        }
      }

     
    }
    public function change_pass(){
      if($this->session->logged_in &&  $this->session->change ){
       
        return view('auth/change_pass');
      }else{
        return redirect()->to(base_url('/login'));
      }
     

    }
    
  
	
}

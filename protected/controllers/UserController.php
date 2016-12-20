<?php
class UserController extends Controller {

    public function actionCreate() {
        if(isset($_POST['User'])) {
            $user = User::create($_POST['User']);
            if(!$user->errors) {
                $this->renderSuccess(array('user_id'=>$user->id));
            } else {
                $this->renderError($this->getErrorMessageFromModelErrors($user));
            }
        } else {
            $this->renderError('Please Create a new User!');
        }
    }




     public function actionLogin($id) {
        $user = User::model()->findbyPK($id);
        if(!$user) {
            echo "Account does not exist.";
        }
        else {
        //    echo 'hi';
           echo CJSON::encode(array('id'=>$user->id,'status'=>'SUCCESS'));
       }
   }



     public function actionProfile($id) {
        $user = User::model()->findbyPK($id);
        if(!$user) {
            echo "Account does not exist.";
        }
        else {
           echo CJSON::encode(array('name'=>$user->name,'email'=>$user->email,'status'=>'SUCCESS'));
       }
   }




}
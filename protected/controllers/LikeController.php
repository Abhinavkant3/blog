<?php
class LikeController extends Controller {

    public function actionLike() {
        if(isset($_POST['Like'])) {
            $like = Like::create($_POST['Like']);
            if(!$like->errors) {
                $this->renderSuccess(array('blog_id'=>$like->blog_id,'user_id'=>$like->user_id));
            } else {
                $this->renderError($this->getErrorMessageFromModelErrors($like));
            }
        } else {
            $this->renderError('Please send post data!');
        }
    }


}
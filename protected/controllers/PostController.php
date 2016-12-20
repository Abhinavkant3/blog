<?php
class PostController extends Controller {

	public function actionCreate() {
		if(isset($_POST['Post'])) {
			$post = Post::create($_POST['Post']);
			if(!$post->errors) {
				$this->renderSuccess(array('id'=>$post->id));
			} else {
				$this->renderError($this->getErrorMessageFromModelErrors($post));
			}
		} else {
			$this->renderError('Please send post data!');
		}
	}



	public function actionView($id) {

		$post =  Post::model()->findByPk($id);
		if(!$post){
			echo 'This id does not exists';
		} else {
		   echo 'This id exists in the database';
		   "\n\r";
		   echo CJSON::encode(array('id'=>$view->desc,'status'=>'SUCCESS'));
	   }
   }

   public function actionComments($id) {
	$post = Post::model()->findByPk($id);
	$comments = $post->comments;
	foreach ($comments as $comment) {
		 "\n\r";
		echo $comment->comment_description;

	}

		/*if(!$view){
			echo 'This id does not exists';
		}   else {
		 echo 'This id exists in the database';
		 echo "<br>";
		 echo CJSON::encode(array('id'=>$view->desc,'status'=>'SUCCESS'));*/
	 }

	 


 }
<?php

class PostController extends BackedController
{
	public $layout = '/layouts/main';

	public function actionIndex()
	{
		$this->pageTitle = 'FireCMS欢迎你';

		if($this->adminuserinfo['parent_id'] <> 0){
			$area_id = $this->adminuserinfo['area_id'];
			$Condition['condition']= "area_id ='$area_id'";
		}else{
			$Condition['condition']= "";
		}
		$Condition['model']= "Post";
		$Condition['pagesize']= 3;
		$Condition['page']= intval(Yii::app()->request->getParam('page',1)) - 1;

		$DataList = $this->FindList($Condition);

		$data['pages'] = $DataList['pages'];
		$data['postlist'] = $DataList['list'];
		$this->renderpartial('index',$data);
	}


	//添加文章表单
	public function actionAddpost()
	{
		$dosubmit = intval($this->getInput('dosubmit'));
		if($dosubmit){
			list($category_id, $subject, $content) = $this->getInput(array('category_id','subject','content'));
			$Post = new Post;
			$Post->category_id = $category_id;
			$Post->title = $subject;
			$Post->content = $content;
			$Post->save();
			$json=array();
			$json['state'] = 'success';
			$json['message'] = '操作成功';
			$json['referer'] = HostName_Backed."/Post/index";
			echo json_encode($json);
			exit;
		}
		$data=array();
		$catedb = $this->toArray(Category::model()->findAll("parent_id=0"));
		$catelist = '<option>';
		foreach ($catedb as $key => $value) {
			$children = $this->toArray(Category::model()->findAll("parent_id=$value[id]"));
			foreach ($children as $ke => $val) {
				$children[$ke]['sub'] = $this->toArray(Category::model()->findAll("parent_id=$val[id]"));
				foreach ($children[$ke]['sub'] as $kk => $va) {
					$children[$ke]['sub'][$kk]['sub2'] = $this->toArray(Category::model()->findAll("parent_id=$va[id]"));
				}
			}
			$catedb[$key]['forum'] = $children;
		}
		$data['cataloglist'] = $catedb;
		$data['catelist'] = $catelist;
		$this->renderpartial('Addpost',$data);
	}


	//编辑文章表单
	public function actionEditpost()
	{
		$dosubmit = intval($this->getInput('dosubmit'));
		if($dosubmit){
			list($pid, $catalog_id, $subject, $content) = $this->getInput(array('pid', 'catalog_id','subject','content'));
			$Post = Post::model()->findByPk($pid);
			$Post->catalog_id = $catalog_id;
			$Post->title = $subject;
			$Post->content = $content;
			$Post->save();
			$json=array();
			$json['state'] = 'success';
			$json['message'] = '操作成功';
			$json['referer'] = HostName_Backed."/Post/index";
			echo json_encode($json);
			exit;
		}
		$data=array();
		$catedb = $this->toArray(Category::model()->findAll("parent_id=0"));
		foreach ($catedb as $key => $value) {
			$children = $this->toArray(Category::model()->findAll("parent_id=$value[id]"));
			foreach ($children as $ke => $val) {
				$children[$ke]['sub'] = $this->toArray(Category::model()->findAll("parent_id=$val[id]"));
				foreach ($children[$ke]['sub'] as $kk => $va) {
					$children[$ke]['sub'][$kk]['sub2'] = $this->toArray(Category::model()->findAll("parent_id=$va[id]"));
				}
			}
			$catedb[$key]['forum'] = $children;
		}
		$data['cataloglist'] = $catedb;

		list($pid) = $this->getInput(array('pid'));
		$postinfoByPid = Post::model()->findByPk($pid);
		$data['postinfoByPid'] = $postinfoByPid;

		$this->renderpartial('editpost',$data);
	}


	//删除文章
	public function actionPostdel()
	{
			list($pid) = $this->getInput(array('pid'));
			if(is_array($pid)){
				foreach ($pid as $key => $value) {
					Post::model()->deleteByPk($value);
				}
			}else{
				Post::model()->deleteByPk($pid);
			}
			$json=array();
			$json['state'] = 'success';
			$json['message'] = '操作成功';
			$json['referer'] = false;
			echo json_encode($json);
			exit;
	}


	//编辑版块名称
	public function actionEditname() {
		list($fid, $name) = $this->getInput(array('fid', 'name'));
		$Category = Category::model()->findByPk($fid);
		$Category->catalog_name=$name;
		$Category->save();
		echo 'success';
		//$this->showMessage('success', 'bbs/setforum/edit/?fid=' . $fid, true);
	}


	//删除版块
	public function actiondeleteforum()
	{
		list($fid) = $this->getInput(array('fid'));
		$Category = $this->toArray(Category::model()->findAll("parent_id = $fid"));
		if($Category){
			$json['state'] = 'fail';
			$json['message'] = '该版块含有子版块，请先删除子版块，再行删除';
			$json['referer'] = false;
			echo json_encode($json);
			exit;
		}

		$Category = $this->toArray(Post::model()->findAll("catalog_id = $fid"));
		if($Category){
			$json['state'] = 'fail';
			$json['message'] = '该版块含有文章，请先删除文章，再行删除';
			$json['referer'] = false;
			echo json_encode($json);
			exit;
		}

		$Category = Category::model()->deleteByPk($fid);
		$json=array();
		if($Category) $json['state'] = 'success';
		else $json['state'] = 'fail'; $json['message'] = '删除失败';
		$json['referer'] = false;
		echo json_encode($json);
	}

}

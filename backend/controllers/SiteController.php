<?php

namespace backend\controllers;
use backend\extensions\BackendController;
use Yii;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\filters\VerbFilter;

class SiteController extends BackendController
{
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
        'access' => [
        'class' => AccessControl::className(),
        'rules' => [
        [
        'actions' => ['login', 'error','index','webinfo'],
        'allow' => true,
        'roles' => ['@'],
        ],
        [
        'actions' => ['logout','login'],
        'allow' => true,
        'roles' => ['?'],
        ],
        ],
        ],
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'logout' => ['post'],
        ],
        ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionError()
    {
        return $this->render('error');
    }

    public function actionIndex()
    {
        $this->layout = 'main';
        return $this->render('index');
    }

    public function actionWebinfo(){
        return $this->render('webinfo2');
    }



    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $data['model'] = $model;
            return $this->display('login', $data);
        }
    }



    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



    public function actionSiteList(){
        global $categorylists;
        $data=array();
           // $sitelist = Sitelist::model()->getAllSite();

        $where = "";
        $page = intval($this->getInput('page'))-1;
        $sitelistdata = $this->pages('Sitelist',$page,$where);

        $data['sitelist'] = $sitelistdata['result'];
        $data['pages'] = $sitelistdata['pages'];
        $this->display('sitelist',$data);
    }





    public function pages($model,$page,$where='',$select='*',$order='',$pageSize='12'){
        $criteria = new CDbCriteria;
        if(is_array($where) && count($where)>0){
            foreach($where as $key=>$value){
                $criteria->addCondition("$key=$value");
            }

        }
        if(is_string($where) && strlen($where)>0){
            $criteria->condition=$where;
        }
        if($order){
            $criteria->order=$order;
        }



        $mode = new $model;
        $criteria->select =$select;
        $count = $mode->count($criteria);

        $pages = new CPagination($count);
        $pages->pageSize = $pageSize;
        $pages->currentPage=$page;
        $pages->applylimit($criteria);
        $data['pages'] = $pages;

        $data['result'] = $mode->findAll($criteria);

        //这个地方是针对下载列表所设置，其它地方用is_count有可能出错

        return $data;
    }


    public function actionCaiji(){
        global $categorylists;
        $data =array();
        $categorylists = Category::model()->getAllCategory();
        $cate = $this->get_cat_array();
        $string = $this->showTree($cate);
        $data['string'] = $string;
        $this->display('caiji',$data);
    }




    public function actionCaijiSubmit(){
        $url = trim($this->getInput('url'));
        $category_id = $this->getInput('category_id');
        if(empty($url) || empty($category_id)) die('请输入参数');
        $isCaiji = Caijilog::model()->count("url = '$url'");
        if($isCaiji>0) die('此地址已经采集过了');

        $content = file_get_contents($url);
        $reg = '#<a\s?(.*)\s?data="([^"]+)"\s?(.*)>\s*<img\s?(.*)src="([^"]+)"\s?(.*)/>#i';
        preg_match_all($reg,$content,$booktitle);//匹配此页面的标题

        array_shift($booktitle[2]);
        array_shift($booktitle[5]);
        array_shift($booktitle[6]);

        for($i=0; $i<count($booktitle[2]); $i++){
            $detailUrl = $booktitle[2][$i];
            $detail = explode("__", $detailUrl);
            $detail = explode(".", $detail[1]);
            $appid = $detail[0];
            $appidArr[$i] = $appid;

            $Sitelist = new Sitelist();
            $Sitelist->category_id = $category_id;
            $Sitelist->appid = $appid;
            $Sitelist->dlurl = $detailUrl;
            $Sitelist->create_time = date("Y-m-d H:i:s");
            $Sitelist->save(false);
        }

        for($x=0; $x<count($appidArr); $x++){
            $Sitelist = Sitelist::model()->find("appid=$appidArr[$x]");
            $name = explode("\"", $booktitle[6][$x]);
            $Sitelist->sitename =$name[1];
            $Sitelist->pic =$booktitle[5][$x];
            $Sitelist->edit_time = date("Y-m-d H:i:s");
            $Sitelist->save(false);
        }
        $Caijilog = new Caijilog();
        $Caijilog->url = $url;
        $Caijilog->category_id = $category_id;
        $Caijilog->ctime = date("Y-m-d H:i:s");
        $Caijilog->save(false);
        echo "1";
        exit;


        $filename = $this->getInput('filename');
        $this->file_down($filename);
    }







    public function actionAddSite(){
        global $categorylists;
        $data = array();
        $dosubmit = $this->getInput('dosubmit');
        if($dosubmit){
            $Sitelist = new Sitelist;
            $Sitelist->sitename = $this->getInput('sitename');
            $Sitelist->website = Yii::app()->request->getParam('website');
            $Sitelist->category_id = $this->getInput('category_id');
            $Sitelist->pic = $this->getInput('picurl');
            $Sitelist->jietu_url = $this->getInput('jietu_url');
            $Sitelist->create_time = date("Y-m-d H:i:s");
            if($Sitelist->save(false)) echo "1";
            else                    echo "-1";
        }else{
            $categorylists = Category::model()->getAllCategory();
            $cate = $this->get_cat_array();
            $string = $this->showTree($cate);
            $data['string'] = $string;
            $this->display('addsite',$data);
        }
    }


    public function actionEditSite(){
        global $categorylists;
        $data = array();
        $dosubmit = $this->getInput('dosubmit');
        $id = $this->getInput('id');
        $SiteInfo = Sitelist::model()->findByPk($id);
        if($dosubmit){
            $SiteInfo->sitename = $this->getInput('sitename');
            $SiteInfo->category_id = $this->getInput('category_id');
            $SiteInfo->website = Yii::app()->request->getParam('website');
            $SiteInfo->pic = $this->getInput('picurl');
            $SiteInfo->jietu_url = $this->getInput('jietu_url');
            $SiteInfo->edit_time = date("Y-m-d H:i:s");
            if($SiteInfo->save(false)) echo "1";
            else                    echo "-1";
        }else{
            $categorylists = Category::model()->getAllCategory();
            $cate = $this->get_cat_array();
            $string = $this->showTree($cate,$SiteInfo->category_id);
            $data['catelist'] = $string;
            $data['SiteInfo'] = $SiteInfo;
            $this->display('editsite',$data);
        }
    }



    public function actionDelSite(){
        $id = $this->getInput('id');
        Sitelist::model()->deleteByPK($id);
        $this->redirect('/backed/default/sitelist');
    }


    public function actionCategory()
    {
        global $categorylists;
        $data=array();
        $categorylists = Category::model()->getAllCategory();
        $cate = $this->get_cat_array();
        $Trlist = $this->showTreeTr($cate);

        $data['Trlist'] = $Trlist;

        $this->display('category',$data);
    }



    public function actionEditCategory(){
        global $categorylists;
        $data = array();
        $dosubmit = $this->getInput('dosubmit');
        $cid = $this->getInput('cid');
        $CateInfo = Category::model()->findByPk($cid);


        if($dosubmit){
            $CateInfo->category_name = $this->getInput('cname');
            $CateInfo->parent_id = $this->getInput('parent_id');
            $CateInfo->type = $this->getInput('type');
            if($CateInfo->save(false)) echo "1";
            else                    echo "-1";
        }else{
            $categorylists = Category::model()->getAllCategory();
            $cate = $this->get_cat_array();
            $string = $this->showTree($cate,$CateInfo->parent_id);
            $data['string'] = $string;
            $data['CateInfo'] = $CateInfo;

            $this->display('editcate',$data);
        }
    }



    public function actionAddCategory()
    {
        global $categorylists;
        $category = array();

        $dosubmit = $this->getInput('dosubmit');
        if($dosubmit){
            $cname = $this->getInput('cname');
            $parent_id = $this->getInput('parent_id');
            $type = $this->getInput('type');
            $category = new Category;
            $category->category_name = $cname;
            $category->parent_id = $parent_id;
            $category->type = $type;
            if($parent_id){
               $parent_info = Category::model()->findByPk($parent_id);
               $category->path = $parent_id.",".$parent_info->path;
           }
           if($category->save(false)) echo "1";
           else                    echo "-1";
       }else{
        $categorylists = Category::model()->getAllCategory();
        $cate = $this->get_cat_array();
        $string = $this->showTree($cate);
        $data['string'] = $string;
        $this->display('addcategory',$data);
    }
}


public function actionDelCate(){
    $id = $this->getInput('id');

            //删除文章
    $this->deleteSitelist($id);

            //删除分类
    $CDbCriteria = new CDbCriteria;
    $CDbCriteria->condition = "FIND_IN_SET($id,path)";
    Category::model()->deleteAll($CDbCriteria);
    Category::model()->deleteByPK($id);

    $this->redirect('/backed/default/category');
}

        //循环删除文章
public function deleteSitelist($pid){
    $Category = Category::model()->findAll("parent_id = $pid");
    Sitelist::model()->deleteAll("category_id = $pid");
    foreach ($Category as $key => $value) {
        $child = Category::model()->findAll("parent_id = $value->id");
        if($child) $this->deleteSitelist($value->id);
        else Sitelist::model()->deleteAll("category_id = $value->id");
    }
}


function showTree($tree,$id='') {
    global $string;
    $icon ='&nbsp;&nbsp;&nbsp;&nbsp;';
    $str ='';

    foreach ($tree as $k => $v) {
      $selected = '';
      if(count(explode(',', $v['path']))>1) $str = str_repeat($icon, count(explode(',', $v['path']))-1);
      if($id == $v['id']){ $selected = 'selected';}
      $string .= '<option value="'.$v['id'].'" '.$selected.'>'.$str.$v['category_name'].'</option>';
      if (count($v['child']) > 0) {
        $this->showTree($v['child'],$id);
    }
}
return $string;
}



function showTreeTr($tree) {
    global $tr;
    $icon ="<i class='board_z' style='padding-left:33px;'></i>";
    $board = '<i class="board"></i>';
    $str ='';
    foreach ($tree as $k => $v) {
        $tr .= "<tr><td>";
        if(count(explode(',', $v['path']))>1) $str = str_repeat($icon, count(explode(',', $v['path']))-1).$board;
        $tr .= $str.$v['category_name'];
        $tr .="</td>";
        $tr .= "<td><a href='/backed/default/EditCategory?cid=$v[id]' class='btn'>编辑</a>";
        $tr .='<a href=';
        $tr .="javascript:G.ui.tips.confirm('此操作会删除子分类和子分类下面的文章,确定要删除吗?','/backed/default/DelCate/id/$v[id]');";
        $tr .=" class='btn'>";
        $tr .= '删除</a>';
        $tr .= "</td></tr>";
        if (count($v['child']) > 0) {
            $this->showTreeTr($v['child']);
        }
    }
    return $tr;
}



function findChild(&$arr,$id){
    $childs=array();
    foreach ($arr as $k => $v){
       if($v['parent_id']== $id){
          $childs[]=$v;
      }
  }
  return $childs;
}

function build_tree($root_id){
    global $category;
    $childs=$this->findChild($category,$root_id);
    if(empty($childs)){
        return null;
    }
    foreach ($childs as $k => $v){
     $rescurTree=$this->build_tree($v['id']);
     if( null !=   $rescurTree){
         $childs[$k]['child']=$rescurTree;
     }
 }
 return $childs;
}


    //无限分类递归数组
public function get_cat_array($pid = 0)
{
    global $categorylists;
    $arr = array();

    foreach($categorylists as $index => $row){
                //对每个分类进行循环。
                if($categorylists[$index]['parent_id'] == $pid){ //如果有子类
                    $row['child'] = $this->get_cat_array($categorylists[$index]['id']); //调用函数，传入参数，继续查询下级
                    $arr[] = $row; //组合数组
                }
            }
            return $arr;
        }




    /**
     * 输出无限级下拉列表
     * @param array $varrinfo  格式为 $varrInfo = array('parent_id'=>array('id'=>name))
     * @param string $option_string 为输出的option
     * @param int $parent_id 父ID
     * @param int $floor 为分隔符数量
     * @param int $select_id 为下拉列表默认选中的值
     */

    public function getMeunList($varrInfo,&$option_string,$parent_id,$floor=0,$select_id=0)
    {
        if( sizeof($varrInfo[$parent_id]) > 0 )
        {
            $floor += 1;
            foreach( $varrInfo[$parent_id] as $k=>$v)
            {
                $select_info = '';
                if( intval($select_id) > 0 && $select_id == $k)
                {
                    $select_info = ' selected="selected"';
                }
                $option_string .="<option value='{$k}' {$select_info}>"."|".str_repeat("--",($floor*2))."{$v}</option>";
                $parent_id = $k;
                $this->getMeunList($varrInfo,$option_string,$parent_id,$floor,$select_id);
            }
        }

        return $option_string;
    }





}

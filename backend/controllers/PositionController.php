<?php

class PositionController extends BackedController
{
    public $layout = '/layouts/colum1';

    public $pagetitle = "FireCMS欢迎你";
    public $actionName = 'WebInfo';

    public function actionIndex()
    {
        $this->pageTitle = 'FireCMS欢迎你';
        $this->render('index');
    }

    public function actionWebInfo(){
        $data = array();
        $dosubmit = $this->getInput('dosubmit');
        if($dosubmit){
            $adminusers = Adminusers::model()->findByPk($this->adminuserinfo['id']);
            $adminusers->phone =$this->getInput('mobile');
            $adminusers->QQ =$this->getInput('qq');
            $adminusers->email =$this->getInput('email');
            $adminusers->save(false);
        }else{
            $data['adminuserinfo'] = $this->adminuserinfo;
            $this->display('webinfo2',$data);
        }
    }


    public function actionProductList(){
        global $categorylists;
        $data=array();
           // $sitelist = Product::model()->getAllSite();

        $where = "";
        $page = intval($this->getInput('page'))-1;
        $sitelistdata = $this->pages('Product',$page,$where);

        $data['sitelist'] = $sitelistdata['result'];
        $data['pages'] = $sitelistdata['pages'];
        $this->display('prolist',$data);
    }





    public function actionCaiji(){
        global $categorylists;
        $data =array();
        $categorylists = ProCategory::model()->getAllCategory();
        $cate = $this->get_cat_array();
        $string = $this->showTree($cate);
        $data['string'] = $string;
        $this->display('caiji',$data);
    }


    //添加商品
    public function actionAddProduct(){
        global $categorylists;
        $data = array();
        $dosubmit = $this->getInput('dosubmit');
        if($dosubmit){
            $Product = new Product;
            $Product->pname = $this->getInput('pname');
            $Product->desc = Yii::app()->request->getParam('desc');
            $Product->price = Yii::app()->request->getParam('price');
            $Product->category_id = $this->getInput('category_id');
            $Product->image = $this->getInput('picurl');
            $Product->create_time = date("Y-m-d H:i:s");
            if($Product->save(false)) echo "1";
            else                    echo "-1";
        }else{
            $categorylists = ProCategory::model()->getAllCategory();
            $cate = $this->get_cat_array();
            $string = $this->showTree($cate);
            $data['string'] = $string;
            $this->display('addpro',$data);
        }
    }

 //编辑商品
    public function actionEditProduct(){
        global $categorylists;
        $data = array();
        $dosubmit = $this->getInput('dosubmit');
        $id = $this->getInput('id');
        $Product = Product::model()->findByPk($id);
        if($dosubmit){
            $Product->pname = $this->getInput('pname');
            $Product->category_id = $this->getInput('category_id');
            $Product->desc = Yii::app()->request->getParam('desc');
            $Product->price = Yii::app()->request->getParam('price');
            $Product->image = $this->getInput('picurl');
           // $Product->jietu_url = $this->getInput('jietu_url');
            $Product->edit_time = date("Y-m-d H:i:s");
            if($Product->save(false)) echo "1";
            else                    echo "-1";
        }else{
            $categorylists = ProCategory::model()->getAllCategory();
            $cate = $this->get_cat_array();
            $string = $this->showTree($cate,$Product->category_id);
            $data['catelist'] = $string;
            $data['SiteInfo'] = $Product;
            $this->display('editpro',$data);
        }
    }


     //删除商品
    public function actionDelProduct(){
        $id = $this->getInput('id');
        Product::model()->deleteByPK($id);
        $this->redirect('/backed/product/productlist');
    }



//分类
    public function actionCategory()
    {
        global $categorylists;
        $data=array();
        $categorylists = ProCategory::model()->getAllCategory();
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
        $CateInfo = ProCategory::model()->findByPk($cid);


        if($dosubmit){
            $CateInfo->category_name = $this->getInput('cname');
            $CateInfo->parent_id = $this->getInput('parent_id');
            $CateInfo->type = $this->getInput('type');
            if($CateInfo->save(false)) echo "1";
            else                    echo "-1";
        }else{
            $categorylists = ProCategory::model()->getAllCategory();
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
            $category = new ProCategory;
            $category->category_name = $cname;
            $category->parent_id = $parent_id;
            $category->type = $type;
            if($parent_id){
               $parent_info = ProCategory::model()->findByPk($parent_id);
               $category->path = $parent_id.",".$parent_info->path;
           }
           if($category->save(false)) echo "1";
           else                    echo "-1";
       }else{
        $categorylists = ProCategory::model()->getAllCategory();
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
    ProCategory::model()->deleteAll($CDbCriteria);
    ProCategory::model()->deleteByPK($id);

    $this->redirect('/backed/product/category');
}

        //循环删除文章
public function deleteSitelist($pid){
    $Category = ProCategory::model()->findAll("parent_id = $pid");
    Product::model()->deleteAll("category_id = $pid");
    foreach ($Category as $key => $value) {
        $child = ProCategory::model()->findAll("parent_id = $value->id");
        if($child) $this->deleteSitelist($value->id);
        else Product::model()->deleteAll("category_id = $value->id");
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
        $tr .= "<td><a href='/backed/$this->id/EditCategory?cid=$v[id]' class='btn'>编辑</a>";
        $tr .='<a href=';
        $tr .="javascript:G.ui.tips.confirm('此操作会删除子分类和子分类下面的文章,确定要删除吗?','/backed/$this->id/DelCate/id/$v[id]');";
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

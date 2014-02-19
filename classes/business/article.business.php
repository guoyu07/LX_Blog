<?php
/**
 *
 * 文章管理
 *
 * Created by Lane.
 * @Class ArticleBusiness
 * @Author: lane
 * @Mail: lixuan868686@163.com
 * @Date: 14-1-10
 * @Time: 下午4:22
 */
class ArticleBusiness{

    private static $dbModelObj;

    /**
     * 返回对象 ...
     * @return ArticleDbModel
     */
    public static function getInstance() {
        if (is_null(self::$dbModelObj) || !isset(self::$dbModelObj)) {
            self::$dbModelObj = new ArticleDbModel();
        }
        return self::$dbModelObj;
    }

    /**
     * @descrpition 添加数据
     * @param $fields
     */
    public static function setArticle($fields){
        return self::getInstance()->add($fields);
    }

    /**
     * @descrpition 修改数据
     * @param $id
     * @param $fields
     */
    public static function editArticle($id, $fields){
        return self::getInstance()->edit($id, $fields);
    }

    /**
     * @descrpition 删除数据
     * @param $fields
     */
    public static function delArticle($id){
        //删除相关评论
        CommentBusiness::delCommentByAid($id);
        //删除文章
        return self::getInstance()->del($id);
    }

    /**
     * @descrpition 通过ID获取
     * @param $id
     */
    public static function getArticle($id){
        return self::getInstance()->get($id);
    }

    /**
     * @descrpition 通过MID获取
     * @param $id
     */
    public static function getArticleByMid($mid, $page){
        return self::getInstance()->getByMid($mid, $page);
    }

    /**
     * @descrpition 获取列表
     * @param $id
     */
    public static function getArticleList($page){
        return self::getInstance()->getList($page);
    }

    /**
     * @descrpition 获取最新列表
     * @return Ambigous|bool
     */
    public static function getNewList(){
        return self::getInstance()->getNewList();
    }

    /**
     * @descrpition 获取最热列表
     * @return Ambigous|bool
     */
    public static function getHotList(){
        return self::getInstance()->getHotList();
    }

    /**
     * @descrpition 获取最热列表
     * @return Ambigous|bool
     */
    public static function getHotListByMid($mid){
        return self::getInstance()->getHotListByMid($mid);
    }

    /**
     * @descrpition 搜索
     * @param $keyword
     * @param $page
     * @return Ambigous
     */
    public static function search($keyword, $page){
        return self::getInstance()->search($keyword, $page);
    }



}
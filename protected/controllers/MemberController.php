<?php

class MemberController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions'=>array('create','delete'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                'users'=>array('*')
            )
        );
    }

    public function actionCreate()
    {
        if(!isset($_GET['group_id'])){
            throw new CHttpException(404,'The requested page does not exist.');
        }
        $group_id = $_GET['group_id'];
        $group = Group::model()->findByPk($group_id);
        if(!$group){
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $attrs = array(
            'user_id'=>Yii::app()->user->id,
            'group_id'=>$group_id
        );
        $member = Member::model()->findByAttributes($attrs);

        if($member){
            Yii::app()->user->setFlash('notice', '您已经加入过这个群组了');
        }else{
            $member = new Member;
            $member->attributes=$attrs;

            if($member->save()){
                Yii::app()->user->setFlash('success', '加入成功');
            }else{
                Yii::app()->user->setFlash('error', '加入失败');
            }
        }
            
        $this->redirect(array('/group/view', 'id'=>$group_id));
    }

    public function actionDelete()
    {
        if(!isset($_GET['group_id'])){
            throw new CHttpException(404,'The requested page does not exist.');
        }
        $group_id = $_GET['group_id'];
        $group = Group::model()->findByPk($group_id);
        if(!$group){
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $attrs = array(
            'user_id'=>Yii::app()->user->id,
            'group_id'=>$group_id
        );
        $member = Member::model()->findByAttributes($attrs);

        if($member){
            if($member->delete()){
                Yii::app()->user->setFlash('success', '退出成功');
            }else{
                Yii::app()->user->setFlash('error', '退出失败');
            }
        }else{
            Yii::app()->user->setFlash('notice', '您不是这个群组的成员');
        }
            
        $this->redirect(array('/group/view', 'id'=>$group_id));
    }
}
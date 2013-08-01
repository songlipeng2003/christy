<?php

class MemberController extends Controller
{
    public function actionCreate()
    {
        $group_id = $_GET['group_id'];
        if(!$_GET['group_id'])
        {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        $group = Group::model()->findByPk($group_id);
        if(!$group_id)
        {
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

            if($member->save())
            {
                Yii::app()->user->setFlash('success', '加入成功');
            }else{
                Yii::app()->user->setFlash('error', '加入失败');
            }
        }
            
        $this->redirect(array('/group/view', 'id'=>$group_id));
    }

    public function actionDelete()
    {
        $group_id = $_GET['group_id'];
        if(!$_GET['group_id'])
        {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        $group = Group::model()->findByPk($group_id);
        if(!$group_id)
        {
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $attrs = array(
            'user_id'=>Yii::app()->user->id,
            'group_id'=>$group_id
        );
        $member = Member::model()->findByAttributes($attrs);

        if($member){
            if($member->delete())
            {
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
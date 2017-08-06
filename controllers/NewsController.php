<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2016/12/10
 * Time: 13:31
 * Email:liyongsheng@meicai.cn
 */

namespace app\controllers;


use app\models\Category;
use app\models\Content;
use app\models\News;
use yii\data\ActiveDataProvider;
use Yii;
use yii\web\NotFoundHttpException;
use app\components\AppController as Controller;

class NewsController extends Controller
{
    /**
     * 相册详情
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        if(empty($id)){
            return $this->redirect(['list']);
        }
        return $this->actionItem($id);
    }
    /**
     * 新闻详情页
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionItem($id)
    {
        if(empty($id)){
            $this->redirect(['list']);
        }
        $model = News::find()->where(['status'=>News::STATUS_ENABLE, 'id'=>$id])->one();
        if(empty($model)){
            throw new NotFoundHttpException('你查看的页面不存在或者已删除');
        }
        if(!empty($model->keywords)){
            $this->view->registerMetaTag(['name'=>'keywords', 'content'=>$model->keywords],'keywords');
        }
        if(!empty($model->description)){
            $this->view->registerMetaTag(['name'=>'description', 'content'=>$model->description], 'description');
        }
        return $this->render('index',['model'=>$model]);
    }

    /**
     * Displays news page
     *
     * @return string
     */
    public function actionList()
    {
        $categoryId = Yii::$app->request->get('category-id');
        $query = News::find()->where(['status'=>News::STATUS_ENABLE]);
        if($categoryId){
            $query->andWhere(['category_id'=>$categoryId]);
            $category = Category::findOne($categoryId);
        }else{
            $category = new Category();
            $category->type = News::$currentType;
        }
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>['defaultOrder'=>['id'=>SORT_DESC]],
            'pagination' => ['pageSize'=>Yii::$app->params['pageSize']]
        ]);

        return $this->render('list', [
            'category'=>$category,
            'searchModel' => new News(),
            'dataProvider' => $dataProvider
        ]);
    }
}
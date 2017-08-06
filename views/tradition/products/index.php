<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2016/12/7
 * Time: 10:55
 * Email:liyongsheng@meicai.cn
 */

/* @var $this yii\web\View */
/* @var $model \app\models\News */
use yii\bootstrap\Html;
use app\widgets\LastNews;
use app\widgets\ConfigPanel;

$this->title = $model->title;
$this->params['breadcrumbs']=[];
\app\helpers\CommonHelper::categoryBreadcrumbs($model->category, $this->params['breadcrumbs']);
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    @media (min-width:768px) {
        .img-rounded{margin-left: auto;margin-right:auto;width:400px;padding: 15px;max-width: 100%}
        .img-box{
            background-color: #ebebeb;
            height: 360px;width:360px; text-align: center;vertical-align: middle;display: table-cell;
        }
        .img-box img{
            display: inline;
            max-width:100%;max-height: 360px;
        }
    }
    @media (max-width:767px){
        .img-box{
            text-align: center;
        }
        .img-box img{
            display: inline;
            max-height: 400px;
        }
    }
</style>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-3">
                <?=\app\widgets\Category::widget(['type'=>\app\models\Content::TYPE_PRODUCTS,
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\LastNews::widget(['options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\ConfigPanel::widget(['configName'=>'contact_us',
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
                <?=\app\widgets\ConfigPanel::widget(['configName'=>'donate',
                    'options'=>['class'=>'panel panel-default panel-'.\yii\helpers\ArrayHelper::getValue($this->params,'themeColor')]
                ])?>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img-rounded">
                                <div class="img-box">
                                    <img src="<?= $model->image ?>" alt="<?= $model->title ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel-body" style="margin: 15px 15px 15px -5px;padding: 0px">
                                <h4><?= $model->title ?></h4>
                                <div><?= $model->detail->params ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default panel-<?= \yii\helpers\ArrayHelper::getValue($this->params, 'themeColor') ?>"
                    style="margin-top: 20px">
                    <div class="panel-heading"><h3 class="panel-title"><?=Yii::t('app', '产品详情')?></h3></div>


                    <div class="panel-body">
                        <?= $model->detail->detail ?>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <?= $this->render('@app/views/news/_share') ?>
                            </div>
                            <div class="col-lg-9 text-right">
                                <?php if ($previous = $model->previous()): ?>
                                    上一条 <?= Html::a($previous->title, ['/products/item', 'id' => $previous->id]) ?>
                                <?php endif; ?>
                                <?php if ($next = $model->next()): ?>
                                    下一条 <?= Html::a($next->title, ['/products/item', 'id' => $next->id]) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->renderDynamic('\app\models\Content::hitCounters('.$model->id.');')?>
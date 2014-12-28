<?php $this->pageTitle=Yii::app()->name; ?>
<div class="row">
  <?php foreach($datas as $data): ?>
  <?php 
    if($color == '#c8f9bd'){
      $color = 'white';
    }else{
      $color = '#c8f9bd';
    }
  ?>
    <div class="col-xs-6 col-md-3">
      <div class="thumbnail" style="background-color: <?php echo $color; ?>;box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);">
        <a href="<?php echo Yii::app()->createAbsoluteUrl("Shop/ShowList&id=".$data->id); ?>">
          <img src="files/images/<?php echo $data->pic; ?>" class="img-circle">
        </a>
        <div class="caption">
          <a href="<?php echo Yii::app()->createAbsoluteUrl("Shop/ShowList&id=".$data->id); ?>">
            <h3>
              <?php 
              if(strlen($data->shopname) >= 13)
                echo iconv_substr($data->shopname, 0, 13, "UTF-8")."...";
              else
                echo $data->shopname;
              ?>
            </h3>
          </a>
          <a id="btnCP<?php echo $data->id; ?>" onclick="addCompare(<?php echo $data->id; ?>)" class="btn btn-primary btn-sm pull-right" role="button">
            เปรียบเทียบ
          </a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
</div>
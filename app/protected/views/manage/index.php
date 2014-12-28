<div class="alert alert-info" role="alert">
    <form action="index.php?r=Manage/Index" method="POST" name="frm-service" class="form-horizontal">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-ok"></span>
                บันทึก
            </button>
            <button type="reset" class="btn btn-default">
                ยกเลิก
            </button>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ร้าน</label>
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-xs-5">
                        <?php echo CHtml::dropdownList("shopid", $id, $shopList,array(
                            'class' => 'form-control',
                            'empty' => '( เลือกร้าน )',
                            'onchange' => '
                                var url = "index.php?r=Manage/Index&id=" + this.value;
                                window.location = url;
                            ',
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">รายการ</label>
            <div class="col-sm-7">
                <?php foreach($service as $val): ?>
                <div class="row" style="margin-bottom: 5px;">
                    <div class="col-xs-3">
                        <label>
                            <input type="checkbox" name="services[]" value="<?php echo $val->id; ?>">
                            <?php echo $val->list; ?> 
                        </label>
                    </div>
                    <div class="col-xs-3">
                        <input type="text" name="prices[<?php echo $val->id; ?>]" value="0" class="form-control">
                    </div>
                    <div class="col-xs-1">บาท.</div>
                </div>
                <?php endforeach; ?>                
            </div>
        </div>
    </form>
</div>

<?php if(!empty($id)): ?>
<div class="alert alert-success">
    <pre>
        <?php //print_r($model->shopHaveServices); ?>
    </pre>
    <?php foreach ($model->shopHaveServices as $data): ?>
    <div class="row" style="margin-bottom: 5px;">
        <div class="form-group">
            <label class="col-xs-2 control-label">
                <?php echo $data->service->list; ?>
            </label>
            <div class="col-xs-2">
                <?php 
                    $min = $data->price_min;
                    $max = $data->price_max;
                    $value =  $min == 0 ? $max : $min."-".$max; 
                ?>
                <input type="text" value="<?php echo $value; ?>" class="form-control">
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
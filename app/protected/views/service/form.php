<div class="alert alert-info">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'htmlOptions' => array('class' => 'form-inline')
    )); ?>
    <div class="form-group">
        <?php echo $form->labelEx($service,"list"); ?>
        <?php echo $form->textField($service,"list", array('class' => 'form-control')); ?>
    </div>
    <button type="submit" class="btn btn-primary">
        <?php if(empty($_GET['id'])): ?>
        เพิ่มรายการ
        <?php else: ?>
        บันทึก
        <?php endif; ?>
    </button>
    <?php echo $form->hiddenField($service,"id");?>
    <?php $this->endWidget(); ?>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
   'dataProvider' => $datas,
   'columns' => array(
        'id',
        'list',
        array(
            'type' => 'html',
            'value' => 'CHtml::link("แก้ไข",array("service/form","id"=>$data->id))',
        ),
        array(
            'type' => 'html',
            'value' => 'CHtml::link("ลบ",array("service/delete","id"=>$data->id))',
            'htmlOptions' => array(
                'onclick' => 'return confirm("ยืนยันการลบ")'
            )
        )
    )
));
?>
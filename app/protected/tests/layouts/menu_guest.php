<nav class="navbar navbar-default" role="navigation" style="margin-top: 20px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <span class="glyphicon glyphicon-home"></span>
                หน้าแรก
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li id="menuCompare">
                    <a href="<?php echo Yii::app()->createAbsoluteUrl('Shop/Compare'); ?>">
                        เปรียบเทียบ
                        <span id="selectTotal" class="badge"></span>
                    </a>
                </li>
                <?php if(Yii::app()->user->isGuest): ?>
                <li style="padding-left: 10px;">
                    <a href="<?php echo Yii::app()->createAbsoluteUrl('Site/Login'); ?>">
                        <span class="glyphicon glyphicon-user"></span> เข้าสู่ระบบ
                    </a>
                </li>
                <?php else: ?>
                <li style="padding-left: 10px;">
                    <a class="navbar-brand" href="<?php echo Yii::app()->createAbsoluteUrl('Shop/Form'); ?>">
                        <span class="glyphicon glyphicon-cog"></span> 
                        จัดการข้อมูล
                    </a>
                </li>
                <li>
                    <a class="navbar-brand" href="index.php?r=Site/Logout">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
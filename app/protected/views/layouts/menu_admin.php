
<nav class="navbar navbar-inverse" role="navigation" style="margin-top: 20px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" target="_blank">
                <span class="glyphicon glyphicon-globe"></span>
                หน้าเว็บหลัก
            </a>
        </div>
        <?php if(!Yii::app()->user->isGuest): ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php?r=shop/form">ข้อมูลร้านเสริมสวย</a>
                </li>
                <li>
                    <a href="index.php?r=service/form">ข้อมูลรายการ</a>
                </li>
                <li>
                    <a href="index.php?r=manage/index">บริการ</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style="padding-left: 10px;">
                    <a class="navbar-brand">
                        <span class="glyphicon glyphicon-user"></span> 
                        <?php echo Yii::app()->user->name; ?>
                    </a>
                </li>
                <li>
                    <a class="navbar-brand" href="index.php?r=Site/Logout">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</nav>
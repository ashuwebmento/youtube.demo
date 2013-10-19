<!--=================containerstart=====================-->
<div id="container">
    <div class="container-inner" style="width:97%; margin: 0 auto;">
        <!--===============loginstart==========================-->
        <div id="top-search-div">
            <div id="top-searc-bar">
				<h1><?php echo __('Welcome'); ?></h1>
<?php if(Session::instance()->get_once('success_pwd')) { echo "<p><span id=\"success\">Success</span></p>"; } ?>
			</div>
        </div>
	</div>
</div>    
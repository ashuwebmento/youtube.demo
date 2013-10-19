<!--=================containerstart=====================-->
<div id="container">
    <div class="container-inner" style="width:97%; margin: 0 auto;">
        <!--===============loginstart==========================-->
        <div id="top-search-div">
            <div id="top-searc-bar">
                
        
            <h1><?php echo __('Login'); ?></h1>
            <?php if ($errors || $loginerrors) { ?>
            <p class="message">Some errors were encountered, please check the details you entered.</p>
            <p>
            <ul class="errors">
            <?php foreach ($errors as $message): ?>
                <li><?php echo $message ?></li>
            <?php endforeach ?>
            <?php if(isset($loginerrors) && empty($errors)) { echo $loginerrors; } ?>
            </ul>
            </p>
            <?php } else { ?>
            <p>Please enter your login information below:</p>
            <?php } ?>
        
            <?php echo Form::open(); ?>
            <div class="form-div">
                <div><?php echo Form::label('username', 'Username or email') ?></div>
                <div><?php echo Form::input('username', $post['username'], array("class"=>"search-field")) ?></div>
            </div> 
            
            <div class="form-div">
                <div><?php echo Form::label('password', 'Password') ?></div>
                <div><?php echo Form::password('password', '', array("class"=>"search-field")) ?></div>
             </div> 
             
             <div class="form-div">    
                <div><?php echo Form::label('remember', 'Remember my info') ?></div>
                <div><?php echo Form::checkbox('remember', NULL, ! empty($post['remember'])) ?></div>
            </div>    

            <div class="form-div"><?php echo Form::submit(NULL, 'Login', array("class"=>"go-button")); ?></div>
            <?php echo Form::close(); ?>
        
            <p><?php echo HTML::anchor('account/reset', 'Lost my log in information'); ?></p>
            <p><?php echo HTML::anchor('account/create', 'Don\'t have an account?'); ?></p>
            <p><?php echo HTML::anchor('account/help', 'Help'); ?></p>
            
            </div>
        </div>       
        
        <!--===============loginend==========================-->
    </div>
</div>
<!--=================containerstart=====================-->
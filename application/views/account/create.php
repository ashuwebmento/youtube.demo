<!--=================containerstart=====================-->
<div id="container">
    <div class="container-inner" style="width:97%; margin: 0 auto;">
        <!--===============loginstart==========================-->
        <div id="top-search-div">
            <div id="top-searc-bar">
                
        
            <h1><?php echo __('Create an account'); ?></h1>
<style>
.form-div div { display:inline-table; }
.errorSummery { marg in-left:50px; }
.errors { padding:0; list-style:none; margin:0; color:#F00;  } 
.errors li { }
</style>
			<?php if ($errors) { ?>
            <div class="errorSummery">
                <p class="message">Some errors were encountered, please check the details you entered.</p>
                <ul class="errors">
                <?php foreach ($errors as $message): ?>
                    <li><?php echo $message ?></li>
                <?php endforeach ?>
                </ul>
            </div>    
            <?php } ?>
            <br />
            <h3><?php echo __('Personal'); ?></h3>

<?php echo Form::open(NULL, array('enctype' => 'multipart/form-data', 'id' => 'create', 'autocomplete' => 'off')); ?>
<div class="form-div">

		<div class="form-div"> 
			<div><?php echo Form::label('fullname', 'Full name') ?></div>
			<div><?php echo Form::input('fullname', $post['fullname'], array('id' => 'fullname', "class"=>"search-field")) ?></div>
        </div>
        
        <?php /*?><div class="form-div">			
			<div><?php echo Form::label('password', 'Password') ?></div>
			<div><?php echo Form::password('password', $post['password'], array('id' => 'password', "class"=>"search-field")) ?></div>
        </div><?php */?> 
        
        <div class="form-div"> 
			<div><?php echo Form::label('address', 'Address') ?></div>
			<div><?php echo Form::input('address', $post['address'], array('id' => 'address', "class"=>"search-field")) ?></div>
        </div>
        
        <div class="form-div"> 
			<div><?php echo Form::label('postcode', 'Postcode') ?></div>
			<div><?php echo Form::input('postcode', $post['postcode'], array('id' => 'postcode', "class"=>"search-field")) ?></div>
        </div>
        
        <div class="form-div"> 
			<div><?php echo Form::label('city', 'City') ?></div>
			<div><?php echo Form::input('city', $post['city'], array('id' => 'city', "class"=>"search-field")) ?></div>
        </div>

        <div class="form-div"> 
			<div><?php echo Form::label('phone', 'Phone') ?></div>
			<div><?php echo Form::input('phone', $post['phone'], array('id' => 'phone', "class"=>"search-field")) ?></div>
        </div>
        
        			
        <div class="form-div"> 
			<div><?php echo Form::label('email', 'Email') ?></div>
			<div><?php echo Form::input('email', $post['email'], array('id' => 'email', "class"=>"search-field")) ?></div>
        </div>
			
        <div class="form-div"> 
			<div><?php echo Form::label('re_email', 'Repeat e-mail') ?></div>
			<div><?php echo Form::input('re_email', $post['re_email'], array('id' => 're_email', "class"=>"search-field")) ?></div>
        </div>
			
		<div class="form-div">			
			<div><?php echo Form::label('password', 'Password') ?></div>
			<div><?php echo Form::password('password', $post['password'], array('id' => 'password', "class"=>"search-field")) ?></div>
        </div>
        
        
        <h3><?php echo __('Work'); ?></h3>
        
        <div class="form-div"> 
			<div><?php echo Form::label('profession', 'Profession') ?></div>
			<div><?php echo Form::input('profession', $post['profession'], array('id' => 'profession', "class"=>"search-field")) ?></div>
        </div>
        
        <div class="form-div">			
			<div><?php echo Form::label('photo', 'Portrait photo') ?></div>
			<div><?php echo Form::file('photo', array('id' => 'photo', "class"=>"search-field")) ?></div>
        </div>
        
        <div class="form-div">			
			<div><?php echo Form::label('service_name', 'Service') ?></div>
			<div><?php echo Form::input('service_name', $post['service_name'], array('id' =>'service_name', "class"=>"search-field")) ?></div>
			<div><?php echo Form::label('service_price', 'Price') ?></div>
			<div><?php echo Form::input('service_price', $post['service_price'], array('id' =>'service_price', "class"=>"search-field")) ?></div>
			<div><?php echo Form::label('service_duration', 'Duration') ?></div>
			<div><?php echo Form::input('service_duration', $post['service_duration'], array('id' =>'service_duration', "class"=>"search-field")) ?></div>
        </div>
			

		<h3><?php echo __('Member of'); ?></h3>
        
        <div class="form-div">			
			<div><?php echo Form::label('organizations', 'Organizations') ?></div>
			<div class="form-div">
			<?php
			$organizations = ORM::factory('organization')->find_all();
			//$organizations = DB::select()->from('organizations')->as_object()->execute();
			foreach($organizations as $user)
			{
				echo '<div class="form-div">'. Form::checkbox('organizations', $user->org_id) . ' ' . Form::label($user->org_name) . '</div>';
			}
			?>
            </div>
        </div>
        
        <div class="form-div"> 
			<div><?php echo Form::label('tags', 'Tags:') ?></div>
			<div><?php echo Form::input('tags', $post['tags'], array('id' => 'tags', "class"=>"search-field")) ?></div>
        </div>
        
        <div class="form-div"> 
			<div><?php echo Form::label('description', 'Background description:') ?></div>
			<div><?php echo Form::input('description', $post['description'], array('id' => 'description', "class"=>"search-field")) ?></div>
        </div>
        
        
        <div class="form-div"><?php echo Form::submit(NULL, 'Create', array("class"=>"go-button")); ?></div>   
</div>
<?php echo Form::close(); ?>
            
            </div>
        </div>       
        
        <!--===============loginend==========================-->
    </div>
</div>
<!--=================containerstart=====================-->

<?php defined('_JEXEC') or die(); ?>
<div class="jshop" id="comjshop">       
    <?php if ($this->config->shop_user_guest && $this->show_pay_without_reg) {?>
      <span class="text_pay_without_reg"><?php print _JSHOP_ORDER_WITHOUT_REGISTER_CLICK?> <a href="<?php print SEFLink('index.php?option=com_jshopping&controller=checkout&task=step2',1,0, $this->config->use_ssl);?>"><?php print _JSHOP_HERE?></a></span>
    <?php } ?>
	
	<?php echo $this->tmpl_login_html_1?>
    
    <div class="jShopLogin">
    <div class="row">
        <div class="login_block col-sm-6 col-xs-12">
			<?php echo $this->tmpl_login_html_2?>
              <span class="small_header"><?php print _JSHOP_HAVE_ACCOUNT ?></span>
              
              <form method = "post" action="<?php print SEFLink('index.php?option=com_jshopping&controller=user&task=loginsave', 1,0, $this->config->use_ssl)?>" name = "jlogin">
                
                <div class="jShopLoginField">
                    <input placeholder="<?php print _JSHOP_USERNAME ?>" type = "text" name = "username" value = "" class = "usernameField " />
                </div>
                <div class="jShopLoginField">
                    <td><input placeholder="<?php print _JSHOP_PASSWORT ?>" type = "password" name = "passwd" value = "" class = "passwdField" /></td>
                </div>
                <div class="jShopLoginField">
                        <input type = "checkbox" name = "remember" id = "remember_me" value = "yes" />
						<label for = "remember_me"><?php print _JSHOP_REMEMBER_ME ?></label>
                </div>
				<div class="jShopLoginField">
					<input type="submit" class="button" value="<?php print _JSHOP_LOGIN ?>" /> <br>                    
                    <a href = "<?php print $this->href_lost_pass ?>"><?php print _JSHOP_LOST_PASSWORD ?></a>
				</div>
                <input type = "hidden" name = "return" value = "<?php print $this->return ?>" />
                <?php echo JHtml::_('form.token');?>
				<?php echo $this->tmpl_login_html_3?>
              </form>   
        </div>
        
        <div class="register_block col-sm-6 col-xs-12">
			<?php echo $this->tmpl_login_html_4?>
            <span class="small_header"><?php print _JSHOP_HAVE_NOT_ACCOUNT ?></span>
            <!--<span><?php print _JSHOP_REGISTER ?></span>-->
            <?php if (!$this->config->show_registerform_in_logintemplate){?>
                <div class="jShopLoginField"><input type="button" class="button" value="<?php print _JSHOP_REGISTRATION ?>" onclick="location.href='<?php print $this->href_register ?>';" /></div>
            <?php }else{?>
                <?php $hideheaderh1 = 1; include(dirname(__FILE__)."/register.php"); ?>
            <?php }?>
			<?php echo $this->tmpl_login_html_5?>
        </div> 
		
    </div>
    </div>
	<?php echo $this->tmpl_login_html_6?>
</div>    
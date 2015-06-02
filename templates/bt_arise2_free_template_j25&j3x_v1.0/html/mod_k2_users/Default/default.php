<?php
/**
 * @version		$Id: default.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2UsersBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
	<div class="k2UserList">
      <div class="k2UserList-inner">
        <?php foreach($users as $key=>$user): ?>
        <div class="k2UserList-item <?php if(count($users)==$key+1) echo ' lastItem'; ?>">
          <div class="k2UserList-item-inner">
            <div class="k2UserList-item-inner-2">
              
              <?php if($userAvatar && !empty($user->avatar)): ?>
              <div class="bg-ubUserAvatar">
				  <a class="k2Avatar ubUserAvatar" rel="author" href="<?php echo $user->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>">
					<img src="<?php echo $user->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>" style="width:<?php echo $avatarWidth; ?>px;height:auto;" />
                    <div class="empty_div"></div>
				  </a>
				  
			  </div>
              <?php endif; ?>
              
              <?php if($userName): ?>
              <a class="ubUserName" rel="author" href="<?php echo $user->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>">
                <?php echo $user->name; ?>
              </a>
              <?php endif; ?>
              
              
              
            <?php 
				$db = JFactory::getDBO();
				$sql = "SELECT * FROM #__k2_user_groups WHERE id=".$user->group; 
				$db->setQuery($sql);
				$option = $db->loadObject();
				// $option->name;
              ?>
     	<div class="k2Usergroup"> <?php echo $option->name; ?>  </div>
              
              <?php if($userDescription && $user->description): ?>
              <div class="ubUserDescription">
                <?php if($userDescriptionWordLimit): ?>
                <?php echo K2HelperUtilities::wordLimit($user->description, $userDescriptionWordLimit) ?>
                <?php else: ?>
                <?php echo $user->description; ?>
                <?php endif; ?>
                </div>
              <?php endif; ?>
              
              <?php if($userFeed || ($userURL && $user->url) || $userEmail): ?>
              <div class="ubUserAdditionalInfo">
                
                <?php if($userFeed): ?>
                <!-- RSS feed icon -->
                <a class="ubUserFeedIcon" href="<?php echo $user->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_USERS_RSS_FEED'); ?>">
                  <span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_USERS_RSS_FEED'); ?></span>
                </a>
                <?php endif; ?>
                
                <?php if($userURL && $user->url): ?>
                <a class="ubUserURL" rel="me" href="<?php echo $user->url; ?>" title="<?php echo JText::_('K2_WEBSITE'); ?>" target="_blank">
                  <span><?php echo JText::_('K2_WEBSITE'); ?></span>
                </a>
                <?php endif; ?>
                
                <?php if($userEmail): ?>
                <span class="ubUserEmail" title="<?php echo JText::_('K2_EMAIL'); ?>">
                  <?php echo JHTML::_('Email.cloak', $user->email); ?>
                </span>
                <?php endif; ?>
                </div>
              <?php endif; ?>
              
              <!--<?php // kiennb comment if($userItemCount && count($user->items)): ?>
			<h3><?php // echo JText::_('K2_RECENT_ITEMS'); ?></h3>
			<ul class="ubUserItems">
				<?php//  foreach ($user->items as $item): ?>
				<li>
					<a href="<?php // echo $item->link; ?>" title="<?php // echo K2HelperUtilities::cleanHtml($item->title); ?>">
						<?php//  echo $item->title; ?>
					</a>
				</li>
				<?php // endforeach; ?>
			</ul>
			<?php // end kiennb comment endif; ?>-->
              
              <div class="clr"></div>
              </div>
          </div>
        </div>
<?php endforeach; ?>
	<div class="clr"></div>
      </div>
      
    </div>
</div>

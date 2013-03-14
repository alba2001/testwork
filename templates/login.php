<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
?>
      <form class="form-signin">
        <h2 class="form-signin-heading"><?=IText::_('PLEASE_SIGN_IN')?></h2>
        <input type="text" class="input-block-level" placeholder="<?=IText::_('EMAIL')?>">
        <input type="password" class="input-block-level" placeholder="<?=IText::_('PASSWORD')?>">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> <?=IText::_('REMEMBER_ME')?>
        </label>
        <button class="btn btn-large btn-primary" type="submit"><?=IText::_('LOGIN')?></button>
        <a href="<?=FULL_URL?>register"><?=IText::_('OR_SIGN_UP')?></a>
      </form>

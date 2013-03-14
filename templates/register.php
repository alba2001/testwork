<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
$alert_style = ' style="display:none"';
if($this->error_msg)
{
    $alert_style = '';
}
?>
    <div class="alert alert-error" <?=$alert_style?>>
        <?=$this->error_msg?>
    </div>
      <form id="sign_up_form" class="form-signin control-group" method="post" action="<?=FULL_URL?>register/register">
        <h2 class="form-signin-heading">Please sign up</h2>
        <div class="control-group">
            <input class="input-block-level control-group error" type="text" placeholder="<?=IText::_('EMAIL')?>" name="iform[email]" id="iform_email" required>
        </div>
        <div class="control-group">
            <input type="password" class="input-block-level" placeholder="<?=IText::_('PASSWORD1')?>" name="iform[password1]" id="iform_password1" required>
        </div>
        <div class="control-group">
            <input type="password" class="input-block-level" placeholder="<?=IText::_('PASSWORD2')?>" name="iform[password2]" id="iform_password2" >
        </div>
            <button class="btn btn-large btn-primary" type="submit"><?=IText::_('SIGN_UP')?></button>
      </form>

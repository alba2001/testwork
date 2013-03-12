<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
?>

      <form id="sign_up_form" class="form-signin control-group" method="post" action="<?=FULL_URL?>register/register">
        <h2 class="form-signin-heading">Please sign up</h2>
        <div class="control-group">
            <input class="input-block-level control-group error" type="text" placeholder="Email address" name="iform[email]" id="iform_email" required>
        </div>
        <div class="control-group">
            <input type="password" class="input-block-level" placeholder="Password" name="iform[password1]" id="iform_password1" required>
        </div>
        <div class="control-group">
            <input type="password" class="input-block-level" placeholder="Confirm password" name="iform[password2]" id="iform_password2" required>
        </div>
            <button class="btn btn-large btn-primary" type="submit">Sign up</button>
      </form>

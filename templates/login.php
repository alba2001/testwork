<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
?>

      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address">
        <input type="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        <a href="<?=FULL_URL?>register">Or sign up</a>
      </form>

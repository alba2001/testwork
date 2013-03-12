<?php
// No direct access to this file
defined('BASE_URL') or die('Restricted access');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo isset($this->title)?$this->title:''?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo isset($this->description)?$this->description:''?></title>
        <title><?php echo isset($this->author)?$this->author:''?></title>

        <!-- Le styles -->
        <?php if(isset($this->stylesheets) AND is_array($this->stylesheets)):?>
            <?php foreach($this->stylesheets as $stylesheet):?>
        <link href="<?=$stylesheet?>" rel="stylesheet">
            <?php endforeach;?>
        <?php endif;?>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
    </head>

    <body>

        <div class="container-narrow">

            <div class="masthead">
                <?php if(isset($this->top_navs) AND is_array($this->top_navs)):?>
                <ul class="nav nav-pills pull-right">
                    <?php foreach($this->top_navs as $top_nav):?>
                    <li <?=$top_nav['class']?'class="'.$top_nav['class'].'"':''?>>
                        <a href="<?=$top_nav['href']?>"><?=$top_nav['text']?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
                <?php endif;?>
                <h3 class="muted"><?php echo isset($this->project_name)?$this->project_name:''?></h3>
            </div>

            <hr>

            <?php $this->get_body()?>
            <hr>

            <div class="footer">
                <p>&copy; Konstantin Ovcharenko 2013</p>
            </div>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php if(isset($this->scripts) AND is_array($this->scripts)):?>
            <?php foreach($this->scripts as $script):?>
        <script src="<?=$script?>"></script>
            <?php endforeach;?>
        <?php endif;?>
    </body>
</html>

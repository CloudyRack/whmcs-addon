<?php

echo 
'
    <div id="mg-content" class="right">
    
    	<div id="top-bar">
        
        	<div id="module-name">
            	<h2>'.$MGC->name.'</h2>
                <h4>'.$AVAILABLE_PAGES[$PAGE]['title'].'</h4>
            </div>';
if($TOP_MENU)
{
    echo '<ul id="top-nav">';
    foreach($TOP_MENU as $page => $menu)
    {
        if(isset($menu['submenu']))
        {
            echo '<li class="dropdown-toggle">';
            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="menu-'.$page.'"><i class="icon-'.$menu['icon'].'"></i>'.$menu['title'].'<i class="icon-caret-down"></i></a>';
            echo '<ul class="dropdown-menu" role="menu" aria-labelledby="menu-'.$page.'">';
            foreach($menu['submenu'] as $subpage => &$submenu)
            {
                echo '<li><a href="'.$MODULE_URL.'&modpage='.$page.'&modsubpage='.$subpage.'">'.$submenu['title'].'</a></li>';
            }
            echo '</ul>';
            echo '</li>';
        }
        else
        {
            echo '<li><a href="'.$MODULE_URL.'&modpage='.$page.'"><i class="icon-'.$menu['icon'].'"></i>'.$menu['title'].'</a></li>';
        }
    }
    echo '</ul>';
}

echo '
            
            <!--<div class="clear"></div>-->
        <a class="slogan nblue-box" href="http://www.modulesgarden.com" target="_blank" alt="ModulesGarden Custom Development">
            <span class="mg-logo"></span>
            <small>We are here to help you, just click!</small>
        </a>
        </div><!-- end of TOP BAR -->
        
    	<div class="inner">
        <h2 class="section-heading">';

if(!$PAGE_SUBMODULE_HEADING && !isset($TOP_MENU[$PAGE]['submenu'][$_REQUEST['modsubpage']]) && ( !isset($TOP_MENU[$PAGE]['submenu'][$_REQUEST['hide']]) || $TOP_MENU[$PAGE]['submenu'][$_REQUEST['modsubpage']]['hide'] != false))
{
    echo '<i class="icon-'.$TOP_MENU[$PAGE]['icon'].'"></i>'.'<a href="'.$MODULE_URL.'&modpage='.$PAGE.'">'.($PAGE_HEADING ? $PAGE_HEADING : $TOP_MENU[$PAGE]['title']).'</a>';
}
else
{ 
    echo '<i class="icon-'.($TOP_MENU[$PAGE]['submenu'][$_REQUEST['modsubpage']]['icon'] ? $TOP_MENU[$PAGE]['submenu'][$_REQUEST['modsubpage']]['icon'] : $TOP_MENU[$PAGE]['icon']).'"></i>'.( $PAGE_HEADING ? $PAGE_HEADING : '<a href="'.$MODULE_URL.'&modpage='.$PAGE.'">'.$TOP_MENU[$PAGE]['title'].'</a>' ).' -> '.($PAGE_SUBMODULE_HEADING ? $PAGE_SUBMODULE_HEADING : $TOP_MENU[$PAGE]['submenu'][$_REQUEST['modsubpage']]['title']);
}

echo '</h2>';

$infos = getInfos();
if($infos)
{
    foreach($infos as $info)
    {
        echo '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    '.$info.'
                </div>';
    }
}

    
$errors = getErrors();
if($errors)
{
    foreach($errors as $error)
    {
        echo '<div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    '.$error.'
                </div>';
    }
}

echo $CONTENT;

echo '
        </div><!-- end of INNER -->
        <div class="overlay hide">
        </div>
    </div><!-- end of CONTENT -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="'.$ASSETS_DIR.'/js/jquery-ui-1.9.1.custom.min.js"></script>
    <script src="'.$ASSETS_DIR.'/js/bootstrap.js"></script>
    
    <script src="'.$ASSETS_DIR.'/js/application.js"></script>
    <script src="'.$ASSETS_DIR.'/js/modulesgarden.js"></script>
    
        
';
?>

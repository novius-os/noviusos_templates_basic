<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

// Loading configs (see bootstrap.php)
$config = \Nos\Templates\Basic\loadViewConfig();

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 lte9 lte8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 lte9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
    <!-- META -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSS -->
    <link rel="shortcut icon" href="static/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="static/apps/noviusos_templates_basic/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/apps/noviusos_templates_basic/css/left_menu.css" media="all">
    <link rel="stylesheet" type="text/css" href="static/apps/noviusos_templates_basic/css/print.css" media="print">
    <!-- JS -->
    <!--  <script src="static/apps/noviusos_templates_basic/js/jquery.js" type="text/javascript"></script>
    <script src="static/apps/noviusos_templates_basic/js/template.js" type="text/javascript"></script>-->
</head>

<body>

    <div id="globalwrapper">

        <div id="globalcontainer">

            <?= \View::forge('noviusos_templates_basic::subviews/header', $config['global'] + array('current_context' => $page->get_context())) ?>

            <div id="content">
                <div id="colleft" class="noprint">
                    <div class="vertical_menu">
                        <?= \View::forge('noviusos_templates_basic::subviews/menu', $config['menu']) ?>
                    </div>
                </div>
                <div id="colright">
                    <?= \View::forge('noviusos_templates_basic::subviews/page_contexts', array('page' => $page), false) ?>
                    <h1 id="pagename"><?= $title ?></h1>
                    <?= $wysiwyg['content'] ?>
                </div>
                <div class="clearfloat"></div>
            </div>

            <?= \View::forge('noviusos_templates_basic::subviews/footer') ?>

        </div>

    </div>

</body>
</html>

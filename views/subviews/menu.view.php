<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

// $depth and $idParent set in template.config
// $depth: depth of the menu (1 = one level deep only, no sublevels)
// $idParent: start level, null for root (default)

if ($depth > 0) {
    $pages = array();
    $pages = findPages($idParent);

    $current = \Nos\Nos::main_controller()->getPage()->page_id;

    if (count($pages)) {
        ?>
        <ul class="nobullet" id="menu">
        <?php
        foreach ($pages as $p) {
            $anchor = array('text' => e($p->pick('menu_title', 'title')));
            $current == $p['id'] && $anchor['class'] = 'active';
            echo '<li class="lvl0">', $p->htmlAnchor($anchor);
            if ($depth > 1) {
                $subpages = findPages($p['id']);
                if (count($subpages)) {
                    echo '<ul class="nobullet submenu">';
                    foreach ($subpages as $sp) {
                        $anchor = array('text' => e($sp->pick('menu_title', 'title')));
                        $current == $sp['id'] && $anchor['class'] = 'active';
                        echo '<li class="lvl1">', $sp->htmlAnchor($anchor), '</li>';
                    }
                    echo '</ul>';
                }
            }
            echo '</li>';
        }
        echo '</ul>';
    }
}

function findPages($idParent = null)
{
    $where = array(
        'page_parent_id' => $idParent,
        'published'      => 1,
        'page_menu'      => 1,
        'page_context'   => \Nos\Nos::main_controller()->getPage()->page_context,
    );

    $pages = \Nos\Page\Model_Page::find('all', array(
        'where'             => $where,
        'order_by'          => array('page_sort' => 'asc')
    ));

    if (count($pages) > 0) {
        return $pages;
    } else {
        return array();
    }
}

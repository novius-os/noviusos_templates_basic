<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

// $depth : profondeur d'affichage des sous menus
// $idParent : Niveau de d�part

if ($depth > 0) {
    $pages = array();
    $pages = findPages($idParent);

    $current = \Nos\Nos::main_controller()->getPage()->page_id;

    if (count($pages)) {
        ?>
        <ul class="nobullet" id="menu">
        <?php
        foreach ($pages as $p) {
            ?>
            <li class="lvl0"><a <?= $p->get_link() ?><?= $current == $p['id'] ? ' class="active"' : '' ?>><?= $p->pick('menu_title', 'title') ?></a>
            <?php
            if ($depth > 1) {
                $subpages = findPages($p['id']);
                if (count($subpages)) {
                    ?>
                    <ul class="nobullet submenu">
                    <?php
                    foreach ($subpages as $sp) {
                        ?>
                        <li class="lvl1"><a <?= $sp->get_link() ?><?= $current == $sp['id'] ? ' class="active"' : '' ?>><?= $sp->pick('menu_title', 'title') ?></a>
                        <?php
                    }
                    ?>
                    </ul>
                    <?php
                }
            }
            ?>
            </li>
            <?php
        }
        ?>
        </ul>
        <?php
    }
}

function findPages($idParent = null)
{
    $where = array(
        'page_parent_id'    => $idParent,
        'page_published'    => 1,
        'page_menu'		    => 1,
        'page_site'			=> \Nos\Nos::main_controller()->getPage()->page_site,
    );

    $pages = array();
    $pages = \Nos\Model_Page::find('all', array(
        'where'             => $where,
        'order_by'          => array('page_sort' => 'asc')
    ));

    if (count($pages)) {
        return $pages;
    } else {
        return array();
    }
}

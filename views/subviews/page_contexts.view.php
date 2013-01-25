<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

// Display a switch to others contexts twin with the current page
$others_contexts = $page->find_other_context();
$links = array();
foreach ($others_contexts as $page_context) {
    $context = $page_context->get_context();
    $links[] = '<a '.$page_context->link().'>'.\Nos\Tools_Context::contextLabel($context).'</a>';
}
if (!empty($links)) {
    echo '<div id="page_contexts"><span>This page exist in other context:</span> ', implode(' | ', $links), '</div>';
}

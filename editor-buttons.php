<?php
namespace Grav\Plugin;

use Grav\Common\GPM\GPM;
use Grav\Common\Grav;
use Grav\Common\Page\Page;
use Grav\Common\Page\Pages;
use Grav\Common\Plugin;

class EditorButtonsPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     *
     */
    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            if ($this->config->get('plugins.editor-buttons.insert_table')) {
                $this->grav['assets']->addJs($this->grav['base_url_absolute'] . '/user/plugins/editor-buttons/admin/buttons/insert-table/js/button.js');
                $this->grav['assets']->addCss($this->grav['base_url_absolute'] . '/user/plugins/editor-buttons/admin/buttons/insert-table/css/button.css');
            }

            $noticesBC = $this->config->get('plugins.editor-buttons.insert_notice.info')
                || $this->config->get('plugins.editor-buttons.insert_notice.warning')
                || $this->config->get('plugins.editor-buttons.insert_notice.note')
                || $this->config->get('plugins.editor-buttons.insert_notice.tip');

            if ($this->config->get('plugins.editor-buttons.insert_notice') || $noticesBC) {
                $this->grav['assets']->addJs($this->grav['base_url_absolute'] . '/user/plugins/editor-buttons/admin/buttons/insert-notice/js/notices.js');
                $this->grav['assets']->addCss($this->grav['base_url_absolute'] . '/user/plugins/editor-buttons/admin/buttons/insert-notice/css/button.css');
            }
        }
    }
}

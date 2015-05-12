<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');

$app->before('GET|POST', '/sql/', function() {
    if (!hasPermission('access_sql_interface_screen')) {
        redirect(url('/') . 'dashboard/');
    }

    if (isset($_COOKIE['SCREENLOCK'])) {
        redirect(url('/') . 'lock/');
    }
});

$css = [ 'css/admin/module.admin.page.form_elements.min.css', 'css/admin/module.admin.page.tables.min.css'];
$js = [
    'components/modules/admin/forms/elements/bootstrap-select/assets/lib/js/bootstrap-select.js?v=v2.1.0',
    'components/modules/admin/forms/elements/bootstrap-select/assets/custom/js/bootstrap-select.init.js?v=v2.1.0',
    'components/modules/admin/forms/elements/select2/assets/lib/js/select2.js?v=v2.1.0',
    'components/modules/admin/forms/elements/select2/assets/custom/js/select2.init.js?v=v2.1.0',
    'components/modules/admin/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v2.1.0',
    'components/modules/admin/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v2.1.0',
    'components/modules/admin/tables/datatables/assets/lib/js/jquery.dataTables.min.js?v=v2.1.0',
    'components/modules/admin/tables/datatables/assets/lib/extras/TableTools/media/js/TableTools.min.js?v=v2.1.0',
    'components/modules/admin/tables/datatables/assets/custom/js/DT_bootstrap.js?v=v2.1.0',
    'components/modules/admin/tables/datatables/assets/custom/js/datatables.init.js?v=v2.1.0'
];

$app->group('/sql', function() use ($app, $css, $js) {

    $app->match('GET|POST', '/', function() use($app, $css, $js) {
        $app->view->display('sql/index', [
            'title' => 'SQL Interface',
            'cssArray' => $css,
            'jsArray' => $js
            ]
        );
    });
});

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// CORE
$routes->get('/', 'Home::index');

// AUTH
$routes->get('/login', 'Login::index');
$routes->post('/login/submit', 'Login::submit');
$routes->get('/logout', 'Login::logout');

// KARYAWAN
$routes->get('/karyawan', 'Karyawan::index');
$routes->add('/tarik-karyawan', 'Karyawan::tarik');
$routes->get('/tambah-karyawan', 'Karyawan::tambah');

// PRESENSI
$routes->get('/presensi', 'Presensi::index');
$routes->add('/tarik-presensi', 'Presensi::tarik');

// PRESENSI
$routes->get('/laporan', 'Laporan::index');
$routes->get('/laporan-tanggal', 'Laporan::filterTanggal');
$routes->get('/laporan-bulan', 'Laporan::filterBulan');
$routes->get('/laporan-nama', 'Laporan::filterNama');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

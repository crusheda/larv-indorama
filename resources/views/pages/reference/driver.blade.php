@extends('layouts.user')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        <div class="col-12">
          <h2 class="page-title"><i class="fe fe-user"></i> Tambah Driver Baru</h2>
          <p class="text-muted">Lengkapi data Driver anda.</p>
        </div>
        <div class="col-5">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Tambah data baru</strong>
            </div>
            <div class="card-body">
              <div class="form-group mb-3">
                <label for="simpleinput">Nama</label>
                <input type="text" id="simpleinput" class="form-control" placeholder="e.g. Sunaryo">
              </div>
              <button class="btn btn-primary float-right" type="submit"><i class="fe fe-save"></i> Submit</button>
            </div>
          </div> <!-- / .card -->
        </div>
      </div>
      <div class="card shadow">
        <div class="card-header">
          <strong class="card-title float-bottom">Tabel Driver</strong>
          <button type="button" class="btn btn-sm float-right"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
        </div>
        <div class="card-body">
          <table class="table datatables table-hover" id="dataTable-1">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Company</th>
                <th>Address</th>
                <th>City</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>368</td>
                <td>Imani Lara</td>
                <td>(478) 446-9234</td>
                <td>Asset Management</td>
                <td>Borland</td>
                <td>9022 Suspendisse Rd.</td>
                <td>High Wycombe</td>
                <td>Jun 8, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>368</td>
                <td>Imani Lara</td>
                <td>(478) 446-9234</td>
                <td>Asset Management</td>
                <td>Borland</td>
                <td>9022 Suspendisse Rd.</td>
                <td>High Wycombe</td>
                <td>Jun 8, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>323</td>
                <td>Walter Sawyer</td>
                <td>(671) 969-1704</td>
                <td>Tech Support</td>
                <td>Macromedia</td>
                <td>Ap #708-5152 Cursus. Ave</td>
                <td>Bath</td>
                <td>May 8, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>371</td>
                <td>Noelle Ray</td>
                <td>(803) 792-2559</td>
                <td>Human Resources</td>
                <td>Sibelius</td>
                <td>Ap #992-8933 Sagittis Street</td>
                <td>Ivanteyevka</td>
                <td>Apr 2, 2021</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>302</td>
                <td>Portia Nolan</td>
                <td>(216) 946-1119</td>
                <td>Payroll</td>
                <td>Microsoft</td>
                <td>Ap #461-4415 Enim Rd.</td>
                <td>Kanpur Cantonment</td>
                <td>Dec 4, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>443</td>
                <td>Scarlett Anderson</td>
                <td>(486) 309-3564</td>
                <td>Tech Support</td>
                <td>Yahoo</td>
                <td>P.O. Box 988, 7282 Lobortis Avenue</td>
                <td>Lot</td>
                <td>Dec 27, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>345</td>
                <td>Kevyn Mills</td>
                <td>(976) 873-4833</td>
                <td>Tech Support</td>
                <td>Sibelius</td>
                <td>P.O. Box 666, 9803 Sed Avenue</td>
                <td>Fino Mornasco</td>
                <td>Dec 24, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>356</td>
                <td>Sharon Buckley</td>
                <td>(429) 517-6784</td>
                <td>Tech Support</td>
                <td>Sibelius</td>
                <td>Ap #372-3407 Sed St.</td>
                <td>Lompret</td>
                <td>Mar 3, 2021</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>263</td>
                <td>Fletcher Everett</td>
                <td>(735) 632-1255</td>
                <td>Customer Service</td>
                <td>Borland</td>
                <td>Ap #688-5120 Egestas Avenue</td>
                <td>Beerzel</td>
                <td>Mar 27, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>227</td>
                <td>Bertha Ball</td>
                <td>(656) 680-1553</td>
                <td>Sales and Marketing</td>
                <td>Finale</td>
                <td>951-3836 Ac Rd.</td>
                <td>Cherbourg-Octeville</td>
                <td>Feb 11, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>396</td>
                <td>Phoebe Cobb</td>
                <td>(663) 233-0340</td>
                <td>Human Resources</td>
                <td>Adobe</td>
                <td>922 Enim. Avenue</td>
                <td>Fahler</td>
                <td>May 18, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>276</td>
                <td>Lillith Joseph</td>
                <td>(406) 343-5430</td>
                <td>Advertising</td>
                <td>Macromedia</td>
                <td>Ap #363-1293 Neque St.</td>
                <td>Vieuxville</td>
                <td>Sep 22, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>222</td>
                <td>Ruth Shaffer</td>
                <td>(488) 102-5116</td>
                <td>Human Resources</td>
                <td>Lycos</td>
                <td>Ap #117-5518 A, Rd.</td>
                <td>Buxton</td>
                <td>Feb 19, 2021</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>397</td>
                <td>Jerry Orr</td>
                <td>(657) 274-3095</td>
                <td>Accounting</td>
                <td>Lycos</td>
                <td>919-782 Vitae Street</td>
                <td>La Plata</td>
                <td>Jul 24, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>218</td>
                <td>Hayfa Cox</td>
                <td>(602) 569-0400</td>
                <td>Asset Management</td>
                <td>Altavista</td>
                <td>Ap #189-4628 Curabitur Rd.</td>
                <td>Dindigul</td>
                <td>Dec 8, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>361</td>
                <td>Ishmael Mcleod</td>
                <td>(148) 643-9938</td>
                <td>Customer Service</td>
                <td>Yahoo</td>
                <td>P.O. Box 253, 2328 Mauris St.</td>
                <td>San Juan del Río</td>
                <td>Feb 13, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>281</td>
                <td>Kevyn Snyder</td>
                <td>(659) 649-4750</td>
                <td>Customer Relations</td>
                <td>Macromedia</td>
                <td>P.O. Box 731, 7143 Sem Rd.</td>
                <td>Taber</td>
                <td>Mar 1, 2021</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>236</td>
                <td>Patience Sanders</td>
                <td>(287) 279-0868</td>
                <td>Legal Department</td>
                <td>Sibelius</td>
                <td>664-7649 Euismod Rd.</td>
                <td>Strijtem</td>
                <td>Mar 26, 2021</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>394</td>
                <td>Tamara Cooke</td>
                <td>(998) 560-1052</td>
                <td>Asset Management</td>
                <td>Macromedia</td>
                <td>Ap #507-3545 Enim. St.</td>
                <td>Hattiesburg</td>
                <td>Jan 25, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>276</td>
                <td>Abel Raymond</td>
                <td>(930) 726-7338</td>
                <td>Quality Assurance</td>
                <td>Yahoo</td>
                <td>5370 Vestibulum. Avenue</td>
                <td>La Cruz</td>
                <td>Jul 3, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>388</td>
                <td>Honorato Nichols</td>
                <td>(561) 758-1908</td>
                <td>Legal Department</td>
                <td>Microsoft</td>
                <td>P.O. Box 925, 286 Ipsum Street</td>
                <td>St. John's</td>
                <td>Aug 29, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>498</td>
                <td>Ishmael Aguirre</td>
                <td>(594) 850-4912</td>
                <td>Media Relations</td>
                <td>Yahoo</td>
                <td>P.O. Box 398, 8254 Pede, Av.</td>
                <td>Cannes</td>
                <td>Jul 5, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>277</td>
                <td>Christian Nieves</td>
                <td>(933) 345-5314</td>
                <td>Human Resources</td>
                <td>Cakewalk</td>
                <td>889-9118 Ipsum Rd.</td>
                <td>Berhampore</td>
                <td>Jul 8, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>215</td>
                <td>Nevada Weber</td>
                <td>(603) 763-9893</td>
                <td>Human Resources</td>
                <td>Altavista</td>
                <td>Ap #439-124 Eros St.</td>
                <td>Cádiz</td>
                <td>Nov 2, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>449</td>
                <td>Addison Tran</td>
                <td>(200) 967-8241</td>
                <td>Sales and Marketing</td>
                <td>Microsoft</td>
                <td>214-4812 Sed, Rd.</td>
                <td>Offenbach am Main</td>
                <td>Nov 30, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>272</td>
                <td>Brenna Reid</td>
                <td>(925) 647-2628</td>
                <td>Finances</td>
                <td>Microsoft</td>
                <td>P.O. Box 604, 587 Ac Street</td>
                <td>Gallicchio</td>
                <td>Jul 1, 2019</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>380</td>
                <td>Kirby Summers</td>
                <td>(140) 854-4790</td>
                <td>Human Resources</td>
                <td>Lycos</td>
                <td>Ap #611-2789 Donec Ave</td>
                <td>s Herenelderen</td>
                <td>Sep 23, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>316</td>
                <td>Cairo Villarreal</td>
                <td>(410) 944-9399</td>
                <td>Sales and Marketing</td>
                <td>Borland</td>
                <td>P.O. Box 631, 8966 Dapibus Street</td>
                <td>Alingsås</td>
                <td>Jan 10, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                  </div>
                </td>
                <td>369</td>
                <td>Savannah Gallagher</td>
                <td>(519) 628-8362</td>
                <td>Media Relations</td>
                <td>Microsoft</td>
                <td>6794 Lorem St.</td>
                <td>Knoxville</td>
                <td>Jul 27, 2020</td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Remove</a>
                    <a class="dropdown-item" href="#">Assign</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- SCRIPT --}}
@include('inc.script')

<script>
  $('#dataTable-1').DataTable(
    {
      autoWidth: true,
      "lengthMenu": [
        [16, 32, 64, -1],
        [16, 32, 64, "All"]
      ]
    }
  );
</script>

@endsection
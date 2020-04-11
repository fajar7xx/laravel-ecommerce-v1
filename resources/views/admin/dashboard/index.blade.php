@extends('admin.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Bookmarks</h6>
                            <h2>1,410</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-award"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">6% higher than last month</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Likes</h6>
                            <h2>41,410</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-thumbs-up"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">61% higher than last month</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Events</h6>
                            <h2>410</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-calendar"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">Total Events</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Comments</h6>
                            <h2>41,410</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-message-square"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">Total Comments</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        <div class="card-header row">
            <div class="col col-sm-3">
                <div class="dropdown d-inline-block">
                    <a class="btn-icon checkbox-dropdown dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" aria-labelledby="moreDropdown">
                        <a class="dropdown-item" id="checkbox_select_all" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" id="checkbox_deselect_all" href="javascript:void(0);">Deselect All</a>
                    </div>
                </div>
                <div class="card-options d-inline-block">
                    <a href="#"><i class="ik ik-inbox"></i></a>
                    <a href="#"><i class="ik ik-plus"></i></a>
                    <a href="#"><i class="ik ik-rotate-cw"></i></a>
                    <div class="dropdown d-inline-block">
                        <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">More Action</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="card-search with-adv-search dropdown">
                    <form action="">
                        <input type="text" class="form-control" placeholder="Search.." required>
                        <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                        <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <button class="btn btn-theme">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col col-sm-3">
                <div class="card-options text-right">
                    <span class="mr-5">1 - 50 of 2,500</span>
                    <a href="#"><i class="ik ik-chevron-left"></i></a>
                    <a href="#"><i class="ik ik-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="list-item-wrap">
                <div class="list-item">
                    <div class="item-inner">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                            <span class="custom-control-label">&nbsp;</span>
                        </label>
                        <div class="list-title"><a href="javascript:void(0)">Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry.</a></div>
                        <div class="list-actions">
                            <a href="#"><i class="ik ik-eye"></i></a>
                            <a href="#"><i class="ik ik-inbox"></i></a>
                            <a href="#"><i class="ik ik-edit-2"></i></a>
                            <a href="#"><i class="ik ik-trash-2"></i></a>
                        </div>
                    </div>

                    <div class="qickview-wrap">
                        <div class="desc">
                            <p>Fusce suscipit turpis a dolor posuere ornare at a ante. Quisque nec libero facilisis, egestas tortor eget, mattis dui. Curabitur viverra laoreet ligula at hendrerit. Nullam sollicitudin maximus leo, vel pulvinar orci semper id. Donec vehicula tempus enim a facilisis. Proin dignissim porttitor sem, sed pulvinar tortor gravida vitae.</p>
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="item-inner">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option2">
                            <span class="custom-control-label">&nbsp;</span>
                        </label>
                        <div class="list-title"><a href="javascript:void(0)">Aenean eu pharetra arcu, vitae elementum sem. Sed non ligula molestie, finibus lacus at, suscipit mi. Nunc luctus lacus vel felis blandit, eu finibus augue tincidunt.</a></div>
                        <div class="list-actions">
                            <a href="#"><i class="ik ik-eye"></i></a>
                            <a href="#"><i class="ik ik-inbox"></i></a>
                            <a href="#"><i class="ik ik-edit-2"></i></a>
                            <a href="#"><i class="ik ik-trash-2"></i></a>
                        </div>
                    </div>
                    <div class="qickview-wrap">
                        <div class="desc">
                            <p>Fusce suscipit turpis a dolor posuere ornare at a ante. Quisque nec libero facilisis, egestas tortor eget, mattis dui. Curabitur viverra laoreet ligula at hendrerit. Nullam sollicitudin maximus leo, vel pulvinar orci semper id. Donec vehicula tempus enim a facilisis. Proin dignissim porttitor sem, sed pulvinar tortor gravida vitae.</p>
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="item-inner">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option3">
                            <span class="custom-control-label">&nbsp;</span>
                        </label>
                        <div class="list-title"><a href="javascript:void(0)">Donec lectus augue, suscipit in sodales sit amet, semper sit amet enim. Duis pretium, nisi id pretium ornare, tortor nibh sodales tellus.</a></div>
                        <div class="list-actions">
                            <a href="#"><i class="ik ik-eye"></i></a>
                            <a href="#"><i class="ik ik-inbox"></i></a>
                            <a href="#"><i class="ik ik-edit-2"></i></a>
                            <a href="#"><i class="ik ik-trash-2"></i></a>
                        </div>
                    </div>
                    <div class="qickview-wrap">
                        <div class="desc">
                            <p>Fusce suscipit turpis a dolor posuere ornare at a ante. Quisque nec libero facilisis, egestas tortor eget, mattis dui. Curabitur viverra laoreet ligula at hendrerit. Nullam sollicitudin maximus leo, vel pulvinar orci semper id. Donec vehicula tempus enim a facilisis. Proin dignissim porttitor sem, sed pulvinar tortor gravida vitae.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header row">
            <div class="col col-sm-3">
                <div class="card-options d-inline-block">
                    <a href="#"><i class="ik ik-inbox"></i></a>
                    <a href="#"><i class="ik ik-plus"></i></a>
                    <a href="#"><i class="ik ik-rotate-cw"></i></a>
                    <div class="dropdown d-inline-block">
                        <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">More Action</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="card-search with-adv-search dropdown">
                    <form action="">
                        <input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required>
                        <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                        <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col0_filter" placeholder="Name" data-column="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Position" data-column="1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Office" data-column="2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Age" data-column="3">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col4_filter" placeholder="Start date" data-column="4">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col5_filter" placeholder="Salary" data-column="5">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-theme">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col col-sm-3">
                <div class="card-options text-right">
                    <span class="mr-5" id="top">1 - 50 of 2,500</span>
                    <a href="#"><i class="ik ik-chevron-left"></i></a>
                    <a href="#"><i class="ik ik-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="advanced_table" class="table">
                <thead>
                    <tr>
                        <th class="nosort" width="10">
                            <label class="custom-control custom-checkbox m-0">
                                <input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </th>
                        <th class="nosort">Avatar</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/2.jpg" class="table-user-thumb" alt=""></td>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/3.jpg" class="table-user-thumb" alt=""></td>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/4.jpg" class="table-user-thumb" alt=""></td>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>$433,060</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/5.jpg" class="table-user-thumb" alt=""></td>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012/12/02</td>
                        <td>$372,000</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/2.jpg" class="table-user-thumb" alt=""></td>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>2012/08/06</td>
                        <td>$137,500</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/3.jpg" class="table-user-thumb" alt=""></td>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo</td>
                        <td>55</td>
                        <td>2010/10/14</td>
                        <td>$327,900</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td><img src="img/users/4.jpg" class="table-user-thumb" alt=""></td>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>2009/09/15</td>
                        <td>$205,500</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
